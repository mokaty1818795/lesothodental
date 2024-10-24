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
                                <div class="col-lg-4 col-sm-12 mb-5">
                                    <div class="mb-5">
                                        {{ Form::label('first_name', __('messages.client.first_name').':', ['class' => 'form-label required mb-3']) }}
                                        {{ Form::text('first_name', $user->first_name ?? null, ['class' => 'form-control form-control-solid', 'placeholder' => __('messages.client.first_name'), 'required']) }}
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-12 mb-5">
                                    <div class="mb-5">
                                        {{ Form::label('last_name', __('messages.client.last_name').':', ['class' => 'form-label required mb-3']) }}
                                        {{ Form::text('last_name', $user->last_name ?? null, ['class' => 'form-control form-control-solid', 'placeholder' => __('messages.client.last_name'), 'required']) }}
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-12 mb-5">
                                <div class="mb-5">
                                    {{ Form::label('email', __('messages.client.email').':', ['class' => 'form-label required mb-3']) }}
                                    {{ Form::email('email', $user->email ?? null, ['class' => 'form-control form-control-solid', 'placeholder' => __('messages.client.email'), 'required']) }}
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-12 mb-5">
                                <div class="mb-5">
                                    {{ Form::label('contact', __('messages.client.contact_no').':', ['class' => 'form-label mb-3']) }}
                                    {{ Form::tel('contact', $user->contact ??  getSettingValue('country_code'), ['class' => 'form-control form-control-solid', 'onkeyup' => 'if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,"")','id'=>'phoneNumber']) }}
                                    {{ Form::hidden('region_code', $user->region_code ?? null, ['id'=>'prefix_code']) }}
                                    <span id="valid-msg" class="hide text-success fw-400 fs-small mt-2">✓ &nbsp; {{ __('messages.placeholder.valid_number') }}</span>
                                    <span id="error-msg" class="hide text-danger fw-400 fs-small mt-2"></span>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-12 mb-5">
                                <div class="mb-5">
                                    {{ Form::label('first_name', __('messages.client.gender') . ':', ['class' => 'form-label required mb-3']) }}
                                    <select class="form-select form-control-lg" id="gender"
                                        value="{{ old('gender') }}" type="text" name="gender"
                                        placeholder="{{ __('Female') }}" autocomplete="off" required autofocus>
                                        <option value="Female">Female</option>
                                        <option value="Male">Male</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-12 mb-5">
                                <div class="mb-5">
                                    {{ Form::label('tittle', __('messages.client.title') . ':', ['class' => 'form-label required mb-3']) }}
                                    {{ Form::text('tittle', isset($user) ? $user->tittle : null, ['class' => 'form-control form-control-solid', 'placeholder' => __('messages.client.title'), 'required']) }}
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-12 mb-5">
                                    <div class="mb-5">
                                        {{ Form::label('Country', __('messages.client.country').':', ['class' => 'form-label required mb-3']) }}
                                        {{ Form::text('Country', $user->region ?? null, ['class' => 'form-control form-control-solid', 'placeholder' => __('messages.client.country'), 'required']) }}
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-12 mb-5">
                                    <div class="mb-5">
                                        {{ Form::label('date_of_birth', __('Date Of Birth').':', ['class' => 'form-label required mb-3']) }}
                                        {{ Form::date('date_of_birth', $user->date_of_birth ?? null, ['class' => 'form-control form-control-solid', 'placeholder' => __('messages.client.date_of_birth'), 'required']) }}
                                    </div>
                                </div>

                                <div class="col-lg-4 col-sm-12 mb-5">
                                    <div class="mb-5">
                                        {{ Form::label('Practice', __('Practice').':', ['class' => 'form-label required mb-3']) }}
                                        {{ Form::text('Practice', $user->practice ?? null, ['class' => 'form-control form-control-solid', 'placeholder' => __('Practice'), 'required']) }}
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-12 mb-5">
                                    <div class="mb-5">
                                        {{ Form::label('Practice Number', __('Practice Number').':', ['class' => 'form-label required mb-3']) }}
                                        {{ Form::text('practice_number', $user->practice_number ?? null, ['class' => 'form-control form-control-solid', 'placeholder' => __('Practice Number'), 'required']) }}
                                    </div>
                                </div>

                                <div class="col-lg-4 col-sm-12 mb-5">
                                    <div class="mb-5">
                                        {{ Form::label('Address', __('messages.client.address').':', ['class' => 'form-label required mb-3']) }}
                                        {{ Form::text('Address', $user->address ?? null, ['class' => 'form-control form-control-solid', 'placeholder' => __('messages.client.address'), 'required']) }}
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-12 mb-5">
                                    <div class="mb-5">
                                        {{ Form::label('zip_code', __('Zip Code').':', ['class' => 'form-label required mb-3']) }}
                                        {{ Form::text('zip_code', $user->zip_code ?? null, ['class' => 'form-control form-control-solid', 'placeholder' => __('Zip Code'), 'required']) }}
                                    </div>
                                </div>

                                <div class="col-lg-4 col-sm-12 mb-5">
                                    <div class="mb-5">
                                        {{ Form::label('State', __('messages.client.state').':', ['class' => 'form-label required mb-3']) }}
                                        {{ Form::text('State', $user->state ?? null, ['class' => 'form-control form-control-solid', 'placeholder' => __('messages.client.state'), 'required']) }}
                                    </div>
                                </div>

                                <div class="col-lg-4 col-sm-12 mb-5">
                                    <div class="mb-5">
                                        {{ Form::label('town', __('messages.client.town') . ':', ['class' => 'form-label required mb-3']) }}
                                        {{ Form::text('town', null, ['class' => 'form-control form-control-solid', 'placeholder' => __('messages.client.town'), 'required']) }}
                                     </div>
                                 </div>

                                <div class="col-lg-4 col-sm-12 mb-5">
                                <div class="mb-5">
                                    {{ Form::label('profession', __('messages.client.profession') . ':', ['class' => 'form-label mb-3 required']) }}
                                    <select class="form-control form-control-solid" id="practice" name="practice" autocomplete="off" required autofocus>
                                        <option value="Clinical Officer" {{ old('practice', $user->practice) == 'Clinical Officer' ? 'selected' : '' }}>Clinical Officer</option>
                                        <option value="Medical Practitioner" {{ old('practice', $user->practice) == 'Medical Practitioner' ? 'selected' : '' }}>Medical Practitioner</option>
                                        <option value="Specialist" {{ old('practice', $user->practice) == 'Specialist' ? 'selected' : '' }}>Specialist</option>
                                        <option value="Dentist" {{ old('practice', $user->practice) == 'Dentist' ? 'selected' : '' }}>Dentist</option>
                                        <option value="Pharmacist" {{ old('practice',  $user->practice) == 'Pharmacist' ? 'selected' : '' }}>Pharmacist</option>
                                        <option value="Environmental Health Specialist" {{ old('practice', $user->practice) == 'Environmental Health Specialist' ? 'selected' : '' }}>Environmental Health Specialist</option>
                                        <option value="Health Assistant" {{ old('practice', $user->practice) == 'Health Assistant' ? 'selected' : '' }}>Health Assistant</option>
                                        <option value="Physiotherapist" {{ old('practice',  $user->practice) == 'Physiotherapist' ? 'selected' : '' }}>Physiotherapist</option>
                                        <option value="Psychologist" {{ old('practice', $user->practice) == 'Psychologist' ? 'selected' : '' }}>Psychologist</option>
                                        <option value="Counsellor" {{ old('practice', $user->practice) == 'Counsellor' ? 'selected' : '' }}>Counsellor</option>
                                        <option value="Dental Technician" {{ old('practice', $user->practice) == 'Dental Technician' ? 'selected' : '' }}>Dental Technician</option>
                                        <option value="Dental Technologist" {{ old('practice', $user->practice) == 'Dental Technologist' ? 'selected' : '' }}>Dental Technologist</option>
                                        <option value="Dental Therapist" {{ old('practice', $user->practice) == 'Dental Therapist' ? 'selected' : '' }}>Dental Therapist</option>
                                        <option value="Pharm Technician" {{ old('practice', $user->practice) == 'Pharm Technician' ? 'selected' : '' }}>Pharm Technician</option>
                                        <option value="Dispenser" {{ old('practice', $user->practice) == 'Dispenser' ? 'selected' : '' }}>Dispenser</option>
                                        <option value="Medical Technologist" {{ old('practice', $user->practice) == 'Medical Technologist' ? 'selected' : '' }}>Medical Technologist</option>
                                        <option value="Radiographer" {{ old('practice', $user->practice) == 'Radiographer' ? 'selected' : '' }}>Radiographer</option>
                                        <option value="Speech Therapist" {{ old('practice', $user->practice) == 'Speech Therapist' ? 'selected' : '' }}>Speech Therapist</option>
                                        <option value="Optometrist" {{ old('practice', $user->practice) == 'Optometrist' ? 'selected' : '' }}>Optometrist</option>
                                        <option value="Orthopedic Technician" {{ old('practice', $user->practice) == 'Orthopedic Technician' ? 'selected' : '' }}>Orthopedic Technician</option>
                                        <option value="Dietician" {{ old('practice',  $user->practice) == 'Dietician' ? 'selected' : '' }}>Dietician</option>
                                        <option value="Laboratory Technician" {{ old('practice', $user->practice) == 'Laboratory Technician' ? 'selected' : '' }}>Laboratory Technician</option>
                                        <option value="Plaster Room Technician" {{ old('practice', $user->practice) == 'Plaster Room Technician' ? 'selected' : '' }}>Plaster Room Technician</option>
                                        <option value="Paramedic" {{ old('practice',  $user->practice) == 'Paramedic' ? 'selected' : '' }}>Paramedic</option>
                                        <option value="Biomedical Forensic Genetic" {{ old('practice', $user->practice) == 'Biomedical Forensic Genetic' ? 'selected' : '' }}>Biomedical Forensic Genetic</option>
                                        <option value="Anesthetic" {{ old('practice',  $user->practice) == 'Anesthetic' ? 'selected' : '' }}>Anesthetic</option>
                                        <option value="Clinical Technologist" {{ old('practice', $user->practice) == 'Clinical Technologist' ? 'selected' : '' }}>Clinical Technologist</option>
                                        <option value="Biokinetic" {{ old('practice',  $user->practice) == 'Biokinetic' ? 'selected' : '' }}>Biokinetic</option>
                                        <option value="Pastoral Care & Counselling" {{ old('practice', $user->practice) == 'Pastoral Care & Counselling' ? 'selected' : '' }}>Pastoral Care & Counselling</option>
                                        <option value="Psychometrist" {{ old('practice', $user->practice) == 'Psychometrist' ? 'selected' : '' }}>Psychometrist</option>
                                        <option value="Audiologist" {{ old('practice', $user->practice) == 'Audiologist' ? 'selected' : '' }}>Audiologist</option>
                                        <option value="Nutritionist" {{ old('practice', $user->practice) == 'Nutritionist' ? 'selected' : '' }}>Nutritionist</option>
                                        <option value="Masseur" {{ old('practice', $user->practice) == 'Masseur' ? 'selected' : '' }}>Masseur</option>
                                        <option value="Oral Hygienist" {{ old('practice', $user->practice) == 'Oral Hygienist' ? 'selected' : '' }}>Oral Hygienist</option>
                                    </select>
                                </div>
                            </div>
                                <div class="col-lg-4 col-sm-12 mb-5">
                                    <div class="mb-5">
                                        {{ Form::label('first_name', __('messages.client.category') . ':', ['class' => 'form-label required mb-3']) }}
                                    <select class="form-control form-control-solid" id="catergory"
                                        value="{{ old('catergory') }}" type="text" name="catergory"
                                        placeholder="{{ __('Dentist') }}" autocomplete="off" required autofocus>
                                            <option value="Dentist">Dentist</option>
                                            <option value="Pharmacist">Pharmacist</option>
                                            <option value="Specialist">Specialist</option>
                                            <option value="Medical Practitioner">Medical Practioner</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-12 mb-5">
                                    <div class="mb-5">
                                        {{ Form::label('practice_number', __('messages.client.practice_number') . ':', ['class' => 'form-label mb-3']) }}
                                        {{ Form::text('practice_number', isset($user) ? $user->practice_number : null, ['class' => 'form-control form-control-solid', 'placeholder' => __('messages.client.practice_number')]) }}
                                    </div>
                                </div>

                                <div class="col-lg-4 col-sm-12 mb-5">
                                    <div class="mb-5">
                                        {{ Form::label('authorization_number', __('AuthoRization NUmber').':', ['class' => 'form-label required mb-3']) }}
                                        {{ Form::text('authorization_number', $user->authorization_number ?? null, ['class' => 'form-control form-control-solid', 'placeholder' => __('AuthoRization NUmber'), 'required']) }}
                                    </div>
                                </div>
                                 <div class="col-lg-4 col-sm-12 mb-5">
                                    <div class="mb-5">
                                        {{ Form::label('registration_number', __('messages.client.registration_number') . ':', ['class' => 'form-label  mb-3']) }}
                                        {{ Form::text('registration_number', isset($user) ? $user->registration_number : null, ['class' => 'form-control form-control-solid', 'placeholder' => __('messages.client.registration_number')]) }}
                                    </div>
                                </div>

                                 <div class="col-lg-4 col-sm-12 mb-5">
                                    <div class="mb-5">
                                        {{ Form::label('retention_number', __('Registration Number').':', ['class' => 'form-label required mb-3']) }}
                                        {{ Form::text('retention_number', $user->retention_number ?? null, ['class' => 'form-control form-control-solid', 'placeholder' => __('Registration Number')]) }}
                                    </div>
                                </div>
                                 <div class="col-lg-4 col-sm-12 mb-5">
                                    <div class="mb-5">
                                        {{ Form::label('license_number', __('License Number').':', ['class' => 'form-label required mb-3']) }}
                                        {{ Form::text('license_number', $user->license_number ?? null, ['class' => 'form-control form-control-solid', 'placeholder' => __('License Number'), 'required']) }}
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-12 mb-5">
                                    <div class="mb-5">
                                        {{ Form::label('facility_name', __('messages.client.facility_name') . ':', ['class' => 'form-label  mb-3']) }}
                                        {{ Form::text('facility_name', isset($user) ? $user->facility_name : null, ['class' => 'form-control form-control-solid', 'placeholder' => __('messages.client.facility_name')]) }}
                                    </div>
                                </div>
                                 <div class="col-lg-4 col-sm-12 mb-5">
                                    <div class="mb-5">
                                        {{ Form::label('occupation', __('Occupation').':', ['class' => 'form-label required mb-3']) }}
                                        {{ Form::text('occupation', $user->occupation ?? null, ['class' => 'form-control form-control-solid', 'placeholder' => __('Occupation'), 'required']) }}
                                    </div>
                                </div>


                            <div class="col-lg-4 col-sm-12 mb-5">
                                <div class="mb-5">
                                    {{ Form::label('facility_name', __('messages.client.facility_name') . ':', ['class' => 'form-label  mb-3']) }}
                                    {{ Form::text('facility_name', isset($user) ?  $user->facility_name : null, ['class' => 'form-control form-control-solid', 'placeholder' => __('messages.client.facility_name')]) }}
                                </div>
                            </div>

                            <div class="col-lg-4 col-sm-12 mb-5">
                                <div class="mb-5">
                                    {{ Form::label('employer_letter', __('messages.client.employer_letter') . ':', ['class' => 'form-label mb-3']) }}
                                    <input
                                        name="employer_letter"
                                        class="form-control"
                                        type="file"
                                        id="employer_letter"
                                    >

                                    @if(isset($user->employer_letter) && $user->employer_letter)
                                        <div class="mt-2 text-sm">
                                            <a href="{{ $user->employer_letter }}" target="_blank">
                                                Employment Letter
                                            </a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                             <a href="{{route('client.education')}}" type="reset"
                                   class="btn btn-primary">{{__('messages.education.education_details')}}</a>
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
                            </div> -->
                            <!-- <div class="row mb-6">
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
