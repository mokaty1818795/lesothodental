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
        * {
            font-family: DejaVu Sans, Arial, "Helvetica", Arial, "Liberation Sans", sans-serif;
        }
       body {
       background-image: url("assets/images/certificate.jpeg");
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        margin: 0;
        padding: 0;
        width: 100%;
        height: 100%;}

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

.name{
    position: absolute;
    top: 39%;
    left: 50%;
    transform: translate(-50%, -50%);
    text-align: center;
    color: black;
    font-size: 20px;
    font-weight: bold;
    font-family: Arial, "Helvetica", Arial, "Liberation Sans", sans-serif;
}

.registration-no{
    position: absolute;
    top: 47%;
    left: 50%;
    transform: translate(-50%, -50%);
    text-align: center;
    color: black;
    font-size: 20px;
    font-weight: bold;
    font-family: Arial, "Helvetica", Arial, "Liberation Sans", sans-serif;
}


.qualifications{
    position: absolute;
    top: 54%;
    left: 50%;
    transform: translate(-50%, -50%);
    text-align: center;
    color: black;
    font-size: 20px;
    font-weight: bold;
    font-family: Arial, "Helvetica", Arial, "Liberation Sans", sans-serif;
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
    right: 9%;
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
    <div class="name">John Doe</div>
    <div class="registration-no">123456</div>
    <div class="qualifications">Bachelor of Medicine</div>
    <div class="category">General Practitioner</div>
    <div class="praction-category">Doctor</div>
    <div class="retention-dates">01/01/2024 - 31/12/2024</div>
     <div class="stamp-date">01/01/2024</div>
</body>

</html>
