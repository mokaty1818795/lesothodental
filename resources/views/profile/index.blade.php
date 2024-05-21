@extends('layouts.app')
@section('title')
    {{ __('messages.user.profile_details') }}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="d-flex flex-column">
            <div class="col-12">
                @include('layouts.errors')
                @include('flash::message')
                <div class="card">
                    <form id="userProfileEditForm" method="POST"
                          action="{{ route('update.profile.setting') }}"
                          class="form fv-plugins-bootstrap5 fv-plugins-framework" novalidate="novalidate"
                          enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="row mb-6">
                                <label class="col-lg-4 form-label required">{{ __('messages.user.avatar').':' }}</label>
                                <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                    <div class="d-block">
                                        <div class="image-picker">
                                            <div class="image previewImage" id="exampleInputImage"
                                                 style="background-image: url('{{ !empty($user->profile_image) ? $user->profile_image : asset('assets/images/avatar.png') }}')">
                                            </div>
                                            <span class="picker-edit rounded-circle text-gray-500 fs-small" data-bs-toggle="tooltip"
                                                  title="{{ __('messages.change_avatar') }}">
                                            <label>
                                                <i class="fa-solid fa-pen" id="profileImageIcon"></i>
                                                <input type="file" id="profile_image" name="image"
                                                       class="image-upload d-none" accept="image/*"/>
                                                  {{ Form::hidden('avatar_remove') }}
                                            </label>
                                        </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row gx-10 mb-5">
                                <div class="col-lg-6">
                                    <div class="mb-5">
                                        {{ Form::label('first_name', __('messages.client.first_name').':', ['class' => 'form-label required mb-3']) }}
                                        {{ Form::text('first_name', $user->first_name ?? null, ['class' => 'form-control form-control-solid', 'placeholder' => __('messages.client.first_name'), 'required']) }}
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-5">
                                        {{ Form::label('last_name', __('messages.client.last_name').':', ['class' => 'form-label required mb-3']) }}
                                        {{ Form::text('last_name', $user->last_name ?? null, ['class' => 'form-control form-control-solid', 'placeholder' => __('messages.client.last_name'), 'required']) }}
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="mb-5">
                                        {{ Form::label('email', __('messages.client.email').':', ['class' => 'form-label required mb-3']) }}
                                        {{ Form::email('email', $user->email ?? null, ['class' => 'form-control form-control-solid', 'placeholder' => __('messages.client.email'), 'required']) }}
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-5">
                                        {{ Form::label('contact', __('messages.client.contact_no').':', ['class' => 'form-label mb-3']) }}
                                        {{ Form::tel('contact', $client->user->contact ??  getSettingValue('country_code'), ['class' => 'form-control form-control-solid', 'onkeyup' => 'if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,"")','id'=>'phoneNumber']) }}
                                        {{ Form::hidden('region_code', $client->user->region_code ?? null, ['id'=>'prefix_code']) }}
                                        <span id="valid-msg" class="hide text-success fw-400 fs-small mt-2">✓ &nbsp; {{ __('messages.placeholder.valid_number') }}</span>
                                        <span id="error-msg" class="hide text-danger fw-400 fs-small mt-2"></span>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-5">
                                    <div class="fv-row">
                                        <div>
                                            {{ Form::label('password', __('messages.client.password').':' ,['class' => 'form-label mb-3']) }}
                                            <div class="position-relative">
                                                <input class="form-control"
                                                    type="password" placeholder="{{ __('messages.client.password')}}" name="password"
                                                    autocomplete="off"
                                                    aria-label="password" data-toggle="password">
                                                <span class="position-absolute d-flex align-items-center top-0 bottom-0 end-0 me-4 input-icon input-password-hide cursor-pointer text-gray-600">
                                                        <i class="bi bi-eye-slash-fill"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-5">
                                    <div class="fv-row">
                                        <div>
                                            {{ Form::label('confirmPassword',__('messages.client.confirm_password').':' ,['class' => 'form-label mb-3']) }}
                                            <div class="position-relative">
                                                <input class="form-control"
                                                    type="password" placeholder="{{ __('messages.client.confirm_password')}}"
                                                    name="password_confirmation"
                                                    autocomplete="off" aria-label="Password" data-toggle="password">
                                                <span class="position-absolute d-flex align-items-center top-0 bottom-0 end-0 me-4 input-icon input-password-hide cursor-pointer text-gray-600">
                                                        <i class="bi bi-eye-slash-fill"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-5">
                                        {{ Form::label('website', __('messages.client.website').':', ['class' => 'form-label mb-3']) }}
                                        {{ Form::text('website', $client->website ?? null, ['class' => 'form-control form-control-solid', 'placeholder' => __('messages.client.website')]) }}
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-5">
                                        {{ Form::label('postal_code', __('messages.client.postal_code').':', ['class' => 'form-label required mb-3']) }}
                                        {{ Form::text('postal_code',$client->postal_code ?? null, ['class' => 'form-control form-control-solid', 'placeholder' => __('messages.client.postal_code'), 'required', 'maxlength' => 6]) }}
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-5">
                                        {{ Form::label('country',__('messages.client.country').':', ['class' => 'form-label mb-3']) }}
                                        {{ Form::select('country_id', $countries, $client->country_id ?? null, ['id'=>'countryId','class' => 'form-select io-select2 ','placeholder' => __('messages.client.country'), 'data-control' => 'select2']) }}
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-5">
                                        {{ Form::label('state', __('messages.client.state').':', ['class' => 'form-label mb-3']) }}
                                        {{ Form::select('state_id', [], null, ['id'=>'stateId','class' => 'form-select io-select2 ','placeholder' =>  __('messages.client.state'), 'data-control' => 'select2']) }}
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-5">
                                        {{ Form::label('city', __('messages.client.city').':', ['class' => 'form-label mb-3']) }}
                                        {{ Form::select('city_id', [], null, ['id'=>'cityId','class' => 'form-select io-select2 ','placeholder' =>  __('messages.client.city'), 'data-control' => 'select2']) }}
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-5">
                                        {{ Form::label('address', __('messages.client.address').':', ['class' => 'form-label mb-3']) }}
                                        {{ Form::textarea('address', $client->address ?? null, ['class' => 'form-control form-control-solid','rows' => '5', 'placeholder' =>  __('messages.client.address'),'rows'=>'5']) }}
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-5">
                                        {{ Form::label('notes', __('messages.client.notes').':', ['class' => 'form-label mb-3']) }}
                                        {{ Form::textarea('note', $client->note ?? null,['class' => 'form-control form-control-solid', 'rows' => '5','placeholder' => __('messages.client.notes'),'rows'=>'5']) }}
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="row mb-6">
                                <label class="col-lg-4 form-label">{{ __('messages.user.full_name').':' }}</label>
                                <div class="col-lg-8">
                                    <div class="row">
                                        <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                            {!! Form::text('first_name', $user->first_name, ['class'=> 'form-control', 'placeholder' => __('messages.client.first_name'), 'required', 'id' => 'editProfileFirstName']) !!}
                                            <div class="fv-plugins-message-container invalid-feedback"></div>
                                        </div>
                                        <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                            {!! Form::text('last_name', $user->last_name, ['class'=> 'form-control', 'placeholder' => __('messages.client.last_name'), 'required', 'id' => 'editProfileLastName']) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-6">
                                <label class="col-lg-4 form-label required">{{ __('messages.user.email').':' }}</label>
                                <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                    {!! Form::email('email', $user->email, ['class'=> 'form-control', 'placeholder' => __('messages.user.email'), 'required', 'id' => 'isEmailEditProfile']) !!}
                                </div>
                            </div>
                            <div class="row mb-6">
                                <label class="col-lg-4 form-label mb-3">{{ __('messages.user.contact_number').':' }}</label>
                                <div class="col-lg-8 fv-row fv-plugins-icon-container">
                                    {{ Form::tel('contact', isset($user)?$user->contact:null, ['class' => 'form-control','onkeyup' => 'if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,"")','id'=>'phoneNumber', 'placeholder' => __('messages.user.phone_number')]) }}
                                    {{ Form::hidden('region_code',isset($user) ? $user->region_code : null,['id'=>'prefix_code']) }}
                                    <span id="valid-msg" class="hide text-success fw-400 fs-small mt-2">✓ {{ __('messages.placeholder.valid_number') }}</span>
                                    <span id="error-msg" class="hide text-danger fw-400 fs-small mt-2"></span>
                                </div>
                            </div> -->

                            @hasrole('admin')
                            <div class="float-end mb-6">
                                {{ Form::submit(__('messages.common.save'),['class' => 'btn btn-primary me-2']) }}
                                <a href="{{route('admin.dashboard')}}" type="reset"
                                   class="btn btn-secondary btn-active-light-primary">{{__('messages.common.discard')}}</a>
                            </div>
                            @else
                                <div class="float-end mb-6">
                                    {{ Form::submit(__('messages.common.save'),['class' => 'btn btn-primary me-2']) }}
                                    <a href="{{route('client.dashboard')}}" type="reset"
                                       class="btn btn-secondary btn-active-light-primary">{{__('messages.common.discard')}}</a>
                                </div>
                                @endrole
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{ Form::hidden('is_edit', true ,['id' => 'isEdit']) }}
@endsection
@section('phone_js')
    <script>
        var phoneNo = "{{ !empty($user) ? (($user->region_code).($user->contact)) : null }}"
    </script>
@endsection
