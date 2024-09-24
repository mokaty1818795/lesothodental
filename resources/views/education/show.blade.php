@extends('layouts.app')
@section('title')
    {{ __('messages.education.education_details') }}
@endsection

@section('content')
   <div class="col-12">
     @include('layouts.errors')
    </div>
    <div class="container-fluid">
        <div class="d-flex flex-column">
            @include('education.show_fields', ['education' => $education])
        </div>
    </div>
@endsection

