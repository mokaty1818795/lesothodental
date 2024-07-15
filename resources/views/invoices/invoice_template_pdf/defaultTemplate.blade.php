<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <link rel="icon" href="{{ asset('web/media/logos/favicon.ico') }}" type="image/png">
    <title>{{ __('messages.invoice.invoice_pdf') }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/invoice-pdf.css') }}" rel="stylesheet" type="text/css" />
    <style>

        @font-face {
            font-family:"GeorgiaCustom" ;
            src: url("/fonts/GeorgiaPro-Black.ttf")format('truetype');
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

.content{
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    text-align: center;
    color: black;
    font-size: 20px;
    font-weight: bold;
    font-family: Arial, "Helvetica", Arial, "Liberation Sans", sans-serif;
}

.certificate-type{
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

.name{
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

.registration-no{
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


.qualifications{
    position: absolute;
    top: 57%;
    left: 50%;
    transform: translate(-50%, -50%);
    text-align: left;
    font-style: italic;
    color: black;
    font-size: 11;
    font-weight:300;
    font-family:'CustomGotham',Arial, "Liberation Sans", sans-serif;
}

.category{
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

.praction-category{
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

.qr-code{
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


.retention-dates{
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


.stamp-date{
    position: absolute;
    top: 90%;
    right: 7%;
    transform: translate(-50%, -50%);
    text-align: center;
    color: black;
    font-size: 15;
    font-family: Arial, "Helvetica", Arial, "Liberation Sans", sans-serif;
}

        @if (getInvoiceCurrencyIcon($invoice->currency_id) == '€')
            .euroCurrency {
                font-family: Arial, "Helvetica", Arial, "Liberation Sans", sans-serif;
            }
        @endif
    </style>
</head>

<body style="padding: 0rem 0rem ;">
    @php $styleCss = 'style'; @endphp

     @php
        $message="This is certificate  is a true copy of the original document of ";
        $fullMessage = $message . ' ' .$client->user->full_name .'' . " Acredited by the  Lesotho Medical Dental and Pharmacy Council";
    @endphp
    <div class="qr-code">
         <img src="data:image/png;base64, {!! base64_encode(QrCode::size(120)->color(31, 122, 140)->generate($fullMessage)) !!} ">
    </div>

    @if (isset($invoice) && !empty($invoice))
                @foreach ($invoice->invoiceItems as $key => $invoiceItems)
                   <div class="certificate-type">
                            {{ isset($invoiceItems->product->name) ? $invoiceItems->product->name : $invoiceItems->product_name ?? __('messages.common.n/a') }}
                    </div>
                 @endforeach
    @endif
    <div class="name">{{ $client->user->full_name }}</div>
    <div class="registration-no">{{$client->user->authorization_number}}</div>
   <!-- <div class="qualifications"></div> -->
    <div class="category">{{$client->user->occupation}}</div>
    <div class="praction-category">{{$client->user->practice}}</div>
    <div class="retention-dates">{{ \Carbon\Carbon::parse($invoice->invoice_date)->translatedFormat(currentDateFormat()) }} - {{ \Carbon\Carbon::parse($invoice->due_date)->translatedFormat(currentDateFormat()) }}</div>
    <div class="stamp-date">{{ \Carbon\Carbon::now()->toDateString() }}</div>
</body>
</html>
