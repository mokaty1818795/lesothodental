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
        <title>Certificate</title>
        <style>
            @font-face {
                font-family:"GeorgiaCustom";
                src: url("/fonts/GeorgiaPro-Black.ttf") format('truetype');
            }
            @font-face {
                font-family: 'CustomGotham';
                src: url('/fonts/GothamBold/GothamBold.otf') format('opentype');
            }
            @font-face {
                font-family: 'Welter';
                src: url('/fonts/Welterweight.otf') format('opentype');
            }
            body {
                background-image: url("assets/images/certificate.jpeg");
                background-repeat: no-repeat;
                background-size: cover;
                margin: 0;
                padding: 0;
                width: 100%;
                height: 100%;
            }
            .certificate-type {
                position: absolute;
                top: 27%;
                left: 40%;
                color: #346073;
                transform: translate(-50%, -50%);
                text-align: center;
                font-size: 23px;
                font-weight: bold;
                text-transform: uppercase;
                font-family:'GeorgiaCustom';
            }
            .name {
                position: absolute;
                top: 39%;
                left: 50%;
                transform: translate(-50%, -50%);
                text-align: center;
                color: black;
                font-size: 20px;
                font-weight: bold;
                font-style: italic;
                text-transform: uppercase;
                font-family:'CustomGotham',Arial, "Liberation Sans", sans-serif;
            }
            .registration-no {
                position: absolute;
                top: 47%;
                left: 50%;
                transform: translate(-50%, -50%);
                text-align: center;
                color: black;
                font-weight: bold;
                font-size: 20px;
                font-family: 'Welter',sans-serif;
            }
            .category {
                position: absolute;
                top: 63%;
                left: 56%;
                transform: translate(-50%, -50%);
                text-align: center;
                color: black;
                font-size: 20px;
                font-weight: bold;
                font-family: Arial, "Helvetica", Arial, "Liberation Sans", sans-serif;
            }
            .praction-category {
                position: absolute;
                top: 69%;
                left: 50%;
                transform: translate(-50%, -50%);
                text-align: center;
                color: black;
                font-size: 20px;
                font-weight: bold;
                font-family: Arial, "Helvetica", Arial, "Liberation Sans", sans-serif;
            }
            .qr-code {
                position: absolute;
                background-color: gray;
                top: 79%;
                left: 34%;
                transform: translate(-50%, -50%);
                text-align: center;
                color: black;
                font-size: 20px;
                font-weight: bold;
                font-family: Arial, "Helvetica", Arial, "Liberation Sans", sans-serif;
            }
            .retention-dates {
                position: absolute;
                top: 97%;
                left: 25%;
                transform: translate(-50%, -50%);
                text-align: center;
                color: black;
                font-size: 20px;
                font-weight: bold;
                font-family: Arial, "Helvetica", Arial, "Liberation Sans", sans-serif;
            }
            .stamp-date {
                position: absolute;
                top: 90%;
                right: 7%;
                transform: translate(-50%, -50%);
                text-align: center;
                color: black;
                font-size: 15px;
                font-family: Arial, "Helvetica", Arial, "Liberation Sans", sans-serif;
            }
        </style>
    </head>
    <body>
        <div class="qr-code">
            <img src="data:image/png;base64, {$qrCode}">
        </div>
    HTML;

        if (isset($invoice) && !empty($invoice)) {
            foreach ($invoice->invoiceItems as $invoiceItems) {
                $html .= '<div class="certificate-type">' .
                    (isset($invoiceItems->product->name) ? $invoiceItems->product->name : ($invoiceItems->product_name ?? 'N/A')) .
                    '</div>';
            }
        }

        $html .= <<<HTML
        <div class="name">{$client->user->full_name}</div>
        <div class="registration-no">{$client->user->authorization_number}</div>
        <div class="category">{$client->user->occupation}</div>
        <div class="praction-category">{$client->user->practice}</div>
        <div class="retention-dates">{$this->formatDate($invoice->invoice_date)} - {$this->formatDate($invoice->due_date)}</div>
        <div class="stamp-date">{$this->formatDate(Carbon::now())}</div>
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
