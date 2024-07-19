<?php

namespace App\Http\Controllers\Client;

use App\Exports\ClientInvoicesExport;
use App\Http\Controllers\AppBaseController;
use App\Models\Invoice;
use App\Models\Payment;
use App\Repositories\InvoiceRepository;
use Barryvdh\DomPDF\Facade\Pdf;
// use Barryvdh\Snappy\Facades\SnappyPdf as PDF;
use Carbon\Carbon;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Laracasts\Flash\Flash;
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
        $statusArr = Invoice::STATUS_ARR;
        $status = $request->status;
        unset($statusArr[Invoice::DRAFT]);
        $paymentType = Payment::PAYMENT_TYPE;
        $paymentMode = $this->getPaymentGateways();
        $stripeKey = getSettingValue('stripe_key');
        if (empty($stripeKey)) {
            $stripeKey = config('services.stripe.key');
        }

        return view('client_panel.invoices.index', compact('statusArr', 'paymentType', 'paymentMode', 'status', 'stripeKey'));
    }

    /**
     * @return Application|Factory|View|RedirectResponse|\never
     */
    public function show(Invoice $invoice)
    {
        $invoice->load('client');
        if (getLogInUserId() != $invoice->client->user_id) {
            return abort(404);
        }
        if ($invoice->status == Invoice::DRAFT) {
            Flash::error('Invoice Not Found.');

            return redirect()->route('client.invoices.index');
        }

        $invoiceData = $this->invoiceRepository->getInvoiceData($invoice);

        return view('client_panel.invoices.show')->with($invoiceData);
    }

    // public function convertToPdf(Invoice $invoice): Response
    // {
    //     $invoice->load('client.user', 'invoiceTemplate', 'invoiceItems.product', 'invoiceItems.invoiceItemTax');
    //     if (getLogInUserId() != $invoice->client->user->id) {
    //         abort(404);
    //     }
    //     $invoiceData = $this->invoiceRepository->getPdfData($invoice);
    //     $invoiceTemplate = $this->invoiceRepository->getDefaultTemplate($invoice);
    //     $pdf = Pdf::loadView("invoices.invoice_template_pdf.$invoiceTemplate", $invoiceData);
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

    public function exportInvoicesExcel(): BinaryFileResponse
    {
        return Excel::download(new ClientInvoicesExport(), 'invoice-excel.xlsx');
    }

    public function getPaymentGateways(): array
    {
        $paymentMode = Payment::PAYMENT_MODE;
        $availableMode = [
            Payment::PAYPAL => 'paypal_enabled',
            Payment::RAZORPAY => 'razorpay_enabled',
            Payment::STRIPE => 'stripe_enabled',
        ];
        foreach ($availableMode as $key => $mode) {
            if (!getSettingValue($mode)) {
                unset($paymentMode[$key]);
            }
        }
        unset($paymentMode[Payment::CASH]);
        unset($paymentMode[Payment::ALL]);

        return $paymentMode;
    }

    public function exportInvoicesPdf(): Response
    {
        $data['invoices'] = Invoice::whereClientId(Auth::user()->client->id)
            ->where('status', '!=', Invoice::DRAFT)
            ->with('payments')->orderBy('created_at', 'desc')->get();

        $clientInvoicesPdf = Pdf::loadView('invoices.export_invoices_pdf', $data);

        return $clientInvoicesPdf->download('Client-Invoices.pdf');
    }
}
