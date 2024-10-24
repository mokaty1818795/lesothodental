@component('mail::layout')
    {{-- Header --}}
    @slot('header')
        @component('mail::header', ['url' => config('app.url')])
            <img src="{{ asset(getLogoUrl()) }}" class="logo" alt="{{ getAppName() }}">
        @endcomponent
    @endslot

    {{-- Body --}}
    <div>
        <h2>Dear {{ $clientFullName }}, <b></b></h2><br>
        <p>I hope you are well.</p>
        <p>I just wanted to drop you a quick note to remind you that <b>{{ numberFormat($totalDueAmount) }}</b> in respect of our
         Certificate <b>{{ $invoiceNumber }}</b> is due for payment on <b>{{ $dueDate }}</b>.</p>
        <br>
        <div style="display: flex;justify-content: center">
            <a href="{{route('invoice-show-url',$invoiceNumber)}}"
               style="padding: 7px 15px;text-decoration: none;font-size: 14px;background-color: green ;font-weight: 500;border: none;border-radius: 8px;color: white">
                View Certificate
            </a>
        </div>
    </div>

    {{-- Footer --}}
    @slot('footer')
        @component('mail::footer')
            <h6>© {{ date('Y') }} {{ getAppName() }}.</h6>
        @endcomponent
    @endslot
@endcomponent
