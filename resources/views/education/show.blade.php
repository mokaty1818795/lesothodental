@extends('layouts.app')
@section('title')
    {{ __('messages.client.client_details') }}
@endsection

@section('content')
    <div class="container-fluid">
        @include('flash::message')
        <div class="d-flex flex-column">
            @include('education.show_fields')
        </div>
    </div>
@endsection
