<div class="row">
    <div class="mb-5" io-image-input="true">
        <label for="exampleInputImage" class="form-label">{{ __('messages.client.profile') }}:</label>
        <div class="d-block">
            <div class="image-picker">
                <div class="image previewImage" id="exampleInputImage"
                    {{ $styleCss }}="
                background-image:url({{ !empty($user->profile_image) ? $user->profile_image : asset('assets/images/avatar.png') }}
                )">
                </div>
                <span class="picker-edit rounded-circle text-gray-500 fs-small" data-bs-toggle="tooltip"
                    title="Change Profile">
                    <label>
                        <i class="fa-solid fa-pen" id="profileImageIcon"></i>
                        <input type="file" id="profile_image" name="profile" class="image-upload d-none"
                            accept="image/*" />
                    </label>
                </span>
            </div>
        </div>
        <div class="form-text">{{ __('messages.flash.allowed_file_types_png_jpg_jpeg') }}</div>
    </div>
    <div class="col-lg-4 col-sm-12 mb-5">
        <div class="mb-5">
            {{ Form::label('first_name', __('messages.client.first_name') . ':', ['class' => 'form-label required mb-3']) }}
            {{ Form::text('first_name', isset($user) ? $user->first_name : null, ['class' => 'form-control form-control-solid', 'placeholder' => __('messages.client.first_name'), 'required']) }}
        </div>
    </div>
    <div class="col-lg-4 col-sm-12 mb-5">
        <div class="mb-5">
            {{ Form::label('last_name', __('messages.client.last_name') . ':', ['class' => 'form-label required mb-3']) }}
            {{ Form::text('last_name', isset($user) ? $user->last_name : null, ['class' => 'form-control form-control-solid', 'placeholder' => __('messages.client.last_name'), 'required']) }}
        </div>
    </div>
    <div class="col-lg-4 col-sm-12 mb-5">
        <div class="mb-5">
            {{ Form::label('email', __('messages.client.email') . ':', ['class' => 'form-label mb-3 required']) }}
            {{ Form::email('email', isset($user) ? $user->email : null, ['class' => 'form-control form-control-solid', 'placeholder' => __('messages.client.email'), 'required']) }}
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
            {{ Form::label('country', __('messages.client.country') . ':', ['class' => 'form-label mb-3 required']) }}
            {{ Form::text('region', isset($user) ? $user->region : null, ['class' => 'form-control form-control-solid', 'placeholder' => __('messages.client.country'), 'required']) }}
        </div>
    </div>

    <div class="col-lg-4 col-sm-12 mb-5">
        <div class="mb-5">
            {{ Form::label('dob', __('messages.client.dob') . ':', ['class' => 'form-label required mb-3']) }}
            {{ Form::text('date_of_birth', null, ['class' => 'form-select', 'id' => 'date_of_birth', 'autocomplete' => 'off', 'required']) }}
        </div>
    </div>
    <div class="col-lg-4 col-sm-12 mb-5">
        <div class="mb-5">
            {{ Form::label('address', __('messages.client.address') . ':', ['class' => 'form-label required mb-3']) }}
            {{ Form::text('address', null, ['class' => 'form-control form-control-solid', 'placeholder' => __('messages.client.address'), 'required']) }}
        </div>
    </div>
    <div class="col-lg-4 col-sm-12 mb-5">
        <div class="mb-5">
            {{ Form::label('zip_code', __('messages.client.zipcode') . ':', ['class' => 'form-label mb-3 required']) }}
            {{ Form::text('zip_code', null, ['class' => 'form-control form-control-solid', 'placeholder' => __('messages.client.zipcode'), 'required']) }}
        </div>
    </div>

    <div class="col-lg-4 col-sm-12 mb-5">
        <div class="mb-5">
            {{ Form::label('state', __('messages.client.state') . ':', ['class' => 'form-label required mb-3']) }}
            {{ Form::text('state',  null, ['class' => 'form-control form-control-solid', 'placeholder' => __('messages.client.state'), 'required']) }}
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
             <select class="form-control form-control-solid" id="practice"
                                value="{{ old('practice') }}" type="text" name="practice"
                                placeholder="{{ __('Dentist') }}" autocomplete="off" required autofocus>
                                    <option value="Clinical Officer">Clinical Officer</option>
                                    <option value="Medical Practitioner">Medical Practitioner</option>
                                    <option value="Specialist">Specialist</option>
                                    <option value="Dentist">Dentist</option>
                                    <option value="Pharmacist">Pharmacist</option>
                                    <option value="Environmental Health Specialist">Environmental Health Specialist</option>
                                    <option value="Health Assistant">Health Assistant</option>
                                    <option value="Physiotherapist">Physiotherapist</option>
                                    <option value="Psychologist">Psychologist</option>
                                    <option value="Counsellor">Counsellor</option>
                                    <option value="Dental Technician">Dental Technician</option>
                                    <option value="Dental Technologist">Dental Technologist</option>
                                    <option value="Dental Therapist">Dental Therapist</option>
                                    <option value="Pharm Technician">Pharm Technician</option>
                                    <option value="Dispenser">Dispenser</option>
                                    <option value="Medical Technologist">Medical Technologist</option>
                                    <option value="Radiographer">Radiographer</option>
                                    <option value="Speech Therapist">Speech Therapist</option>
                                    <option value="Optometrist">Optometrist</option>
                                    <option value="Orthopedic Technician">Orthopedic Technician</option>
                                    <option value="Dietician">Dietician</option>
                                    <option value="Laboratory Technician">Laboratory Technician</option>
                                    <option value="Plaster Room Technician">Plaster Room Technician</option>
                                    <option value="Paramedic">Paramedic</option>
                                    <option value="Biomedical Forensic Genetic">Biomedical Forensic Genetic</option>
                                    <option value="Anesthetic">Anesthetic</option>
                                    <option value="Clinical Technologist">Clinical Technologist</option>
                                    <option value="Biokinetic">Biokinetic</option>
                                    <option value="Pastoral Care & Counselling">Pastoral Care & Counselling</option>
                                    <option value="Psychometrist">Psychometrist</option>
                                    <option value="Audiologist">Audiologist</option>
                                    <option value="Nutritionist">Nutritionist</option>
                                    <option value="Masseur">Masseur</option>
                                    <option value="Oral Hygienist">Oral Hygienist</option>
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
            {{ Form::label('authorization_number', __('messages.client.authorization_number') . ':', ['class' => 'form-label mb-3']) }}
            {{ Form::text('authorization_number', isset($user) ? $user->authorization_number : null, ['class' => 'form-control form-control-solid', 'placeholder' => __('messages.client.authorization_number')]) }}
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
            {{ Form::label('facility_name', __('messages.client.facility_name') . ':', ['class' => 'form-label  mb-3']) }}
            {{ Form::text('facility_name', isset($user) ? $user->facility_name : null, ['class' => 'form-control form-control-solid', 'placeholder' => __('messages.client.facility_name')]) }}
        </div>
    </div>
    <div class="col-lg-4 col-sm-12 mb-5">
        <div class="mb-5">
            {{ Form::label('employer_letter', __('messages.client.employer_letter') . ':', ['class' => 'form-label mb-3']) }}
            <input
            name="employer_letter"
            value="{{ old('employer_letter') }}"
            class="form-control"
            type="file"
            id="employer_letter"
            >
            <!-- {{ Form::file('employer_letter', isset($user) ? $user->employer_letter : null, ['class' => 'form-control form-control-solid', 'placeholder' => __('messages.client.employer_letter')]) }} -->
        </div>
    </div>
    <div class="col-lg-4 col-sm-12 mb-5">
        <div class="mb-5">
            {{ Form::label('license_number', __('messages.client.license_number') . ':', ['class' => 'form-label mb-3']) }}
            {{ Form::text('license_number', isset($user) ? $user->license_number : null, ['class' => 'form-control form-control-solid', 'placeholder' => __('messages.client.license_number')]) }}
        </div>
    </div>
    <div class="col-lg-4 col-sm-12 mb-5">
        <div class="mb-5">
            {{ Form::label('occupation', __('messages.client.occupation') . ':', ['class' => 'form-label required mb-3']) }}
            {{ Form::text('occupation', isset($user) ? $user->occupation : null, ['class' => 'form-control form-control-solid', 'placeholder' => __('messages.client.occupation'),'required']) }}
        </div>
    </div>

    <div class="col-lg-4 col-sm-12 mb-5">
        <div class="mb-5">
            {{ Form::label('contact', __('messages.client.contact_no') . ':', ['class' => 'form-label mb-3']) }}
            {{ Form::tel('contact', getSettingValue('country_code'), ['class' => 'form-control form-control-solid', 'onkeyup' => 'if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,"")', 'id' => 'phoneNumber']) }}
            {{ Form::hidden('region_code', isset($user) ? $user->region_code : null, ['id' => 'prefix_code']) }}
            <span id="valid-msg" class="hide text-success fw-400 fs-small mt-2">✓
                &nbsp;{{ __('messages.placeholder.valid_number') }}</span>
            <span id="error-msg" class="hide text-danger fw-400 fs-small mt-2"></span>
        </div>
    </div>
    @if (!isset($user))
        <div class="col-lg-4 col-sm-12 mb-5">
            <div class="fv-row">
                <div class="">
                    {{ Form::label('password', __('messages.client.password') . ':', ['class' => 'form-label mb-3 required']) }}
                    <div class="position-relative">
                        <input class="form-control form-control-solid" type="password"
                            placeholder="{{ __('messages.client.password') }}" name="password" autocomplete="off"
                            aria-label="Password" data-toggle="password" required>
                        <span
                            class="position-absolute d-flex align-items-center top-0 bottom-0 end-0 me-4 input-icon input-password-hide cursor-pointer text-gray-600">
                            <i class="bi bi-eye-slash-fill"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-sm-12 mb-5">
            <div class="fv-row">
                <div class="">
                    {{ Form::label('confirmPassword', __('messages.client.confirm_password') . ':', ['class' => 'form-label mb-3 required']) }}
                    <div class="position-relative">
                        <input class="form-control form-control-solid" type="password"
                            placeholder="{{ __('messages.client.confirm_password') }}" name="password_confirmation"
                            autocomplete="off" aria-label="Password" data-toggle="password" required>
                        <span
                            class="position-absolute d-flex align-items-center top-0 bottom-0 end-0 me-4 input-icon input-password-hide cursor-pointer text-gray-600">
                            <i class="bi bi-eye-slash-fill"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    @endif

</div>
<div class="float-end d-flex mb-5">
    {{ Form::submit(__('messages.common.save'), ['class' => 'btn btn-primary me-3']) }}
    <a href="{{ route('users.index') }}" type="reset"
        class="btn btn-secondary btn-active-light-primary">{{ __('messages.common.discard') }}</a>
</div>
