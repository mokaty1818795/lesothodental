<?php

namespace App\Http\Controllers;

use App\Exports\AdminInvoicesExport;
use App\Http\Requests\CreateInvoiceRequest;
use App\Http\Requests\UpdateInvoiceRequest;
use App\Mail\InvoicePaymentReminderMail;
use App\Models\Currency;
use App\Models\Invoice;
use App\Models\Payment;
use App\Models\Product;
use App\Repositories\InvoiceRepository;
use App\Repositories\PaymentRepository;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

// use Barryvdh\DomPDF\Facade\Pdf;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class InvoiceController extends AppBaseController
{
    /** @var InvoiceRepository */
    public $invoiceRepository;

    public function __construct(InvoiceRepository $invoiceRepo)
    {
        $this->invoiceRepository = $invoiceRepo;
    }

    /**
     * @throws Exception
     */
    public function index(Request $request): View | Factory | Application
    {
        $this->updateInvoiceOverDueStatus();
        $statusArr = Invoice::STATUS_ARR;
        $status = $request->status;

        return view('invoices.index', compact('statusArr', 'status'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View | Factory | Application
    {
        $data = $this->invoiceRepository->getSyncList();
        $data['currencies'] = getCurrencies();
        unset($data['statusArr'][0]);

        return view('invoices.create')->with($data);
    }

    public function store(CreateInvoiceRequest $request): JsonResponse
    {
        try {
            DB::beginTransaction();
            $invoice = $this->invoiceRepository->saveInvoice($request->all());
            if ($request->status != Invoice::DRAFT) {
                $this->invoiceRepository->saveNotification($request->all(), $invoice);
                DB::commit();

                return $this->sendResponse($invoice, __('messages.flash.invoice_saved_and_sent_successfully'));
            }
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();

            return $this->sendError($e->getMessage());
        }

        return $this->sendResponse($invoice, __('messages.flash.invoice_saved_successfully'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Invoice $invoice): View | Factory | Application
    {
        $invoiceData = $this->invoiceRepository->getInvoiceData($invoice);

        return view('invoices.show')->with($invoiceData);
    }

    /**
     * @return Application|Factory|View|RedirectResponse
     */
    public function edit(Invoice $invoice)
    {
        $data = $this->invoiceRepository->prepareEditFormData($invoice);
        $data['selectedInvoiceTaxes'] = $invoice->invoiceTaxes()->pluck('tax_id')->toArray();
        $data['currencies'] = getCurrencies();

        return view('invoices.edit')->with($data);
    }

    public function update(UpdateInvoiceRequest $request, Invoice $invoice): JsonResponse
    {
        $input = $request->all();
        try {
            DB::beginTransaction();
            $invoice = $this->invoiceRepository->updateInvoice($invoice->id, $input);
            $changes = $invoice->getChanges();
            if ($input['invoiceStatus'] == '1') {
                if (count($changes) > 0 && $input['invoiceStatus'] == '1') {
                    $this->invoiceRepository->updateNotification($invoice, $input, $changes);
                }
                if ($input['invoiceStatus'] == '1' && $input['status'] == Invoice::DRAFT) {
                    $this->invoiceRepository->draftStatusUpdate($invoice);
                }
                DB::commit();

                return $this->sendResponse($invoice, __('messages.flash.invoice_updated_and_send_successfully'));
            }
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();

            return $this->sendError($e->getMessage());
        }

        return $this->sendResponse($invoice, __('messages.flash.invoice_updated_successfully'));
    }

    public function destroy(Invoice $invoice): JsonResponse
    {
        $invoice->delete();

        return $this->sendSuccess(__('messages.flash.invoice_deleted_successfully'));
    }

    public function getProduct($productId): JsonResponse
    {
        $product = Product::pluck('unit_price', 'id')->toArray();

        return $this->sendResponse($product, __('messages.flash.product_price_retrieved_successfully.'));
    }

    public function getInvoiceCurrency($currencyId): mixed
    {
        $currency = Currency::whereId($currencyId)->first()->icon;

        return $this->sendResponse($currency, __('messages.flash.invoice_currency_retrieved_successfully'));
    }

    // public function convertToPdf(Invoice $invoice): Response
    // {
    //     ini_set('max_execution_time', 300);
    //     $invoice->load(['client.user', 'invoiceTemplate', 'invoiceItems.product', 'invoiceItems.invoiceItemTax', 'invoiceTaxes', 'paymentQrCode']);
    //     $invoiceData = $this->invoiceRepository->getPdfData($invoice);
    //     $invoiceTemplate = $this->invoiceRepository->getDefaultTemplate($invoice);

    //     $pdf = PDF::loadView("invoices.invoice_template_pdf.$invoiceTemplate", $invoiceData);

    //     return $pdf->stream('invoice.pdf');
    // }

    public function convertToPdf(Invoice $invoice)
    {
        $client = $invoice->client;
        $html = $this->generateHtml($invoice, $client);

        $pdf = PDF::loadHTML($html);
        $pdf->setPaper('A4', 'portrait');

        return $pdf->download('certificate.pdf');
    }

    private function generateHtml(Invoice $invoice, $client)
    {
        $message = "This is certificate is a true copy of the original document of ";
        $fullMessage = $message . ' ' . $client->user->full_name . '' . " Acredited by the Lesotho Medical Dental and Pharmacy Council";
        $qrCode = base64_encode(QrCode::size(120)->color(31, 122, 140)->generate($fullMessage));

        $html = <<<HTML
    <!DOCTYPE HTML>
    <html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <link rel="stylesheet" href="assets/css/certificate_styles.css">
        <title>Certificate</title>
    </head>
    <body>
        <div class="qr-code">
            <img src="data:image/png;base64, {$qrCode}">
        </div>
        <div class="signature">
            REGISTRAR
        </div>
        <div class="signature-line"></div>
    HTML;

        if (isset($invoice) && !empty($invoice)) {
            foreach ($invoice->invoiceItems as $invoiceItems) {
                $html .= '<div class="certificate-type">' .
                    (isset($invoiceItems->product->name) ? $invoiceItems->product->name : ($invoiceItems->product_name ?? 'N/A')) .
                    '</div>';
            }
        }

        $html .= <<<HTML
        <div class="names">LESOTHO MEDICAL DENTAL & PHARMACY COUNCIL</div>
        <div class="dost-style"><img src="assets/images/dots.png"/></div>
        <div class="diamond"><img src="assets/images/diamond.png"/></div>
        <div class="waves"><img src="assets/images/wave.png" height="700px"/></div>
        <div class="waves2"><img src="assets/images/wave.png" height="700px"/></div>
        <div class="image-logo"><img src="assets/images/logo2.png" height="200px" width="200px"/></div>
        <div class="image-logo1"><img src="assets/images/logo2.png" height="500px" width="500px"/></div>
        <div class="certificate-name">This is to certify that </div>
        <div class="name">{$client->user->full_name}</div>
        <div class="qualifications-cert">{$client->user->education->course}</br> {$client->user->education->course}</div>
        <div class="registration-label">Registration No</div>
        <div class="registration-no">{$client->user->authorization_number}</div>
        <div class="qualifications">QUALIFICATONS</div>
        <div class="category">is registered as a {$client->user->occupation} in a catergory</div>
        <div class="praction-category">{$client->user->practice}</div>
        <div class="retention-dates">{$this->formatDate($invoice->invoice_date)} - {$this->formatDate($invoice->due_date)}</div>
        <div class="stamp-date">{$this->formatDate(Carbon::now())}</div>
        <div class="badge"><img src="assets/images/asset12.png"/></div>
        <div class="nation"><img src="assets/images/nation.png"/></div>
        <div class="school-logo"><img src="assets/images/school.png"/></div>
        <div class="stamp"><img src="assets/images/stamp.png"/></div>
        <div class="expirydate">This Retention is from the date to the</div>
        <div class="hat"><img src="assets/images/hat.png"/></div>
        <div class="wave1"><img src="assets/images/waves.png"/></div>
    </body>
    </html>
    HTML;

        return $html;
    }

    private function formatDate($date)
    {
        return Carbon::parse($date)->translatedFormat(currentDateFormat());
    }

    public function updateInvoiceStatus(Invoice $invoice, $status): mixed
    {
        $this->invoiceRepository->draftStatusUpdate($invoice);

        return $this->sendSuccess(__('messages.flash.Invoice_send_successfully'));
    }

    public function updateInvoiceOverDueStatus()
    {
        $invoice = Invoice::whereStatus(Invoice::UNPAID)->get();
        $currentDate = Carbon::today()->format('Y-m-d');
        foreach ($invoice as $invoices) {
            if ($invoices->due_date < $currentDate) {
                $invoices->update([
                    'status' => Invoice::OVERDUE,
                ]);
            }
        }
    }

    public function invoicePaymentReminder($invoiceId): mixed
    {
        $invoice = Invoice::with(['client.user', 'payments'])->whereId($invoiceId)->firstOrFail();
        $paymentReminder = Mail::to($invoice->client->user->email)->send(new InvoicePaymentReminderMail($invoice));

        return $this->sendResponse($paymentReminder, __('messages.flash.payment_reminder_mail_send_successfully'));
    }

    public function exportInvoicesExcel(): BinaryFileResponse
    {
        return Excel::download(new AdminInvoicesExport(), 'invoice-excel.xlsx');
    }

    public function showPublicInvoice($invoiceId): View | Factory | Application
    {
        $invoice = Invoice::with('client.user')->whereInvoiceId($invoiceId)->firstOrFail();
        $invoiceData = $this->invoiceRepository->getInvoiceData($invoice);
        $invoiceData['statusArr'] = Invoice::STATUS_ARR;
        $invoiceData['status'] = $invoice->status;
        unset($invoiceData['statusArr'][Invoice::DRAFT]);
        $invoiceData['paymentType'] = Payment::PAYMENT_TYPE;
        $invoiceData['paymentMode'] = $this->invoiceRepository->getPaymentGateways();
        $invoiceData['stripeKey'] = getSettingValue('stripe_key');
        $invoiceData['userLang'] = $invoice->client->user->language;

        return view('invoices.public-invoice.public_view')->with($invoiceData);
    }

    public function getPublicInvoicePdf($invoiceId)
    {
        $invoice = Invoice::whereInvoiceId($invoiceId)->firstOrFail();
        $invoice->load('client.user', 'invoiceTemplate', 'invoiceItems.product', 'invoiceItems.invoiceItemTax');
        $invoiceData = $this->invoiceRepository->getPdfData($invoice);
        $invoiceTemplate = $this->invoiceRepository->getDefaultTemplate($invoice);
        $pdf = PDF::loadView("invoices.invoice_template_pdf.$invoiceTemplate", $invoiceData);

        return $pdf->stream('invoice.pdf');
    }

    public function showPublicPayment($invoiceId): Factory | View | Application
    {
        /** @var PaymentRepository $paymentRepo */
        $paymentRepo = App::make(PaymentRepository::class);

        /** @var Invoice $invoice */
        $invoice = Invoice::with('client.user')->whereInvoiceId($invoiceId)->firstOrFail();
        $totalPayable = $paymentRepo->getTotalPayable($invoice);
        $paymentType = Payment::PAYMENT_TYPE;
        $paymentMode = $this->invoiceRepository->getPaymentGateways();
        $userLang = $invoice->client->user->language;

        $stripeKey = getSettingValue('stripe_key');
        if (empty($stripeKey)) {
            $stripeKey = config('services.stripe.key');
        }

        return view('invoices.public-invoice.payment',
            compact('paymentType', 'paymentMode', 'totalPayable', 'stripeKey', 'invoice', 'userLang')
        );
    }

    public function updateRecurring(Invoice $invoice)
    {
        $recurringCycle = empty($invoice->recurring_cycle) ? 1 : $invoice->recurring_cycle;
        $invoice->update([
            'recurring_status' => !$invoice->recurring_status,
            'recurring_cycle' => $recurringCycle,
        ]);

        return $this->sendSuccess(__('messages.flash.recurring_status_updated_successfully'));
    }

    public function exportInvoicesPdf(): Response
    {
        // ini_set('max_execution_time', 3600000000);
        $data['invoices'] = Invoice::with('client.user', 'payments')->orderBy('created_at', 'desc')->get();
        $pdf = PDF::loadView('invoices.export_invoices_pdf', $data);

        return $pdf->download('Invoices.pdf');
    }
}
