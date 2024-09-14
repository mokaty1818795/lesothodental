@extends('layouts.app')
@section('title')
    {{__('messages.education.education_details')}}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="d-flex flex-column  ">
            @include('flash::message')
            <livewire:user-education/>
        </div>
    </div>
@endsection
