<div class="row gx-10 mb-5">

     <div class="mb-3" io-image-input="true">
        <label for="exampleInputImage" class="form-label">{{ __('messages.client.profile') }}:</label>
        <div class="d-block">
            <div class="image-picker">
                <div class="image previewImage" id="exampleInputImage"
                     style="background-image: url('{{ !empty($user->profile_image) ? $user->profile_image : asset('assets/images/avatar.png') }}')">
                </div>
                <span class="picker-edit rounded-circle text-gray-500 fs-small" data-bs-toggle="tooltip"
                      title="Change Profile">
                    <label>
                        <i class="fa-solid fa-pen" id="profileImageIcon"></i>
                            <input type="file" id="profile_image" name="profile" class="image-upload d-none"
                                   accept=".png, .jpg, .jpeg"/>
                    </label>
                </span>
            </div>
        </div>
        <div class="form-text">{{ __('messages.flash.allowed_file_types_png_jpg_jpeg') }}</div>
    </div>

    <div class="col-lg-4 col-sm-12 mb-5">
        <div class="mb-5">
            {{ Form::label('first_name', __('messages.client.first_name').':', ['class' => 'form-label required mb-3']) }}
            {{ Form::text('first_name', isset($user) ? $user->first_name : null, ['class' => 'form-control form-control-solid', 'placeholder' => __('messages.client.first_name'), 'required']) }}
        </div>
    </div>
    <div class="col-lg-4 col-sm-12 mb-5">
        <div class="mb-5">
            {{ Form::label('last_name', __('messages.client.last_name').':', ['class' => 'form-label required mb-3']) }}
            {{ Form::text('last_name', isset($user) ? $user->last_name : null, ['class' => 'form-control form-control-solid', 'placeholder' => __('messages.client.last_name'), 'required']) }}
        </div>
    </div>
    <div class="col-lg-4 col-sm-12 mb-5">
        <div class="mb-5">
            {{ Form::label('email', __('messages.client.email').':', ['class' => 'form-label required mb-3']) }}
            {{ Form::email('email', isset($user) ? $user->email : null, ['class' => 'form-control form-control-solid', 'placeholder' => __('messages.client.email'), 'required']) }}
        </div>
    </div>

    <div class="col-lg-4 col-sm-12 mb-5">
        <div class="mb-5">
    {{ Form::label('gender', __('messages.client.gender') . ':', ['class' => 'form-label required mb-3']) }}
    <select class="form-select form-control-lg" id="gender" name="gender" autocomplete="off" required autofocus>
        <option value="Female" {{ old('gender', $user->gender) == 'Female' ? 'selected' : '' }}>Female</option>
        <option value="Male" {{ old('gender', $user->gender) == 'Male' ? 'selected' : '' }}>Male</option>
        <option value="Other" {{ old('gender', $user->gender) == 'Other' ? 'selected' : '' }}>Other</option>
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
            {{ Form::text('date_of_birth',isset($user) ? $user->rdate_of_birthegion : null,['class' => 'form-select', 'id' => 'date_of_birth', 'autocomplete' => 'off', 'required']) }}
        </div>
    </div>
    <div class="col-lg-4 col-sm-12 mb-5">
        <div class="mb-5">
            {{ Form::label('address', __('messages.client.address') . ':', ['class' => 'form-label required mb-3']) }}
            {{ Form::text('address', isset($user) ? $user->address : null, ['class' => 'form-control form-control-solid', 'placeholder' => __('messages.client.address'), 'required']) }}
        </div>
    </div>
    <div class="col-lg-4 col-sm-12 mb-5">
        <div class="mb-5">
            {{ Form::label('zip_code', __('messages.client.zipcode') . ':', ['class' => 'form-label mb-3 required']) }}
            {{ Form::text('zip_code',isset($user) ? $user->zip_code : null, ['class' => 'form-control form-control-solid', 'placeholder' => __('messages.client.zipcode'), 'required']) }}
        </div>
    </div>

     <div class="col-lg-4 col-sm-12 mb-5">
        <div class="mb-5">
            {{ Form::label('state', __('messages.client.state') . ':', ['class' => 'form-label required mb-3']) }}
            {{ Form::text('state', isset($user) ? $user->state : null, ['class' => 'form-control form-control-solid', 'placeholder' => __('messages.client.state'), 'required']) }}
        </div>
    </div>
    <div class="col-lg-4 col-sm-12 mb-5">
        <div class="mb-5">
            {{ Form::label('town', __('messages.client.town') . ':', ['class' => 'form-label required mb-3']) }}
            {{ Form::text('town',isset($user) ? $user->town : null, ['class' => 'form-control form-control-solid', 'placeholder' => __('messages.client.town'), 'required']) }}
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
            <option value="Pharmacist" {{ old('practice', $user->practice) == 'Pharmacist' ? 'selected' : '' }}>Pharmacist</option>
            <option value="Environmental Health Specialist" {{ old('practice', $user->practice) == 'Environmental Health Specialist' ? 'selected' : '' }}>Environmental Health Specialist</option>
            <option value="Health Assistant" {{ old('practice', $user->practice) == 'Health Assistant' ? 'selected' : '' }}>Health Assistant</option>
            <option value="Physiotherapist" {{ old('practice', $user->practice) == 'Physiotherapist' ? 'selected' : '' }}>Physiotherapist</option>
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
            <option value="Dietician" {{ old('practice', $user->practice) == 'Dietician' ? 'selected' : '' }}>Dietician</option>
            <option value="Laboratory Technician" {{ old('practice', $user->practice) == 'Laboratory Technician' ? 'selected' : '' }}>Laboratory Technician</option>
            <option value="Plaster Room Technician" {{ old('practice', $user->practice) == 'Plaster Room Technician' ? 'selected' : '' }}>Plaster Room Technician</option>
            <option value="Paramedic" {{ old('practice', $user->practice) == 'Paramedic' ? 'selected' : '' }}>Paramedic</option>
            <option value="Biomedical Forensic Genetic" {{ old('practice', $user->practice) == 'Biomedical Forensic Genetic' ? 'selected' : '' }}>Biomedical Forensic Genetic</option>
            <option value="Anesthetic" {{ old('practice', $user->practice) == 'Anesthetic' ? 'selected' : '' }}>Anesthetic</option>
            <option value="Clinical Technologist" {{ old('practice', $user->practice) == 'Clinical Technologist' ? 'selected' : '' }}>Clinical Technologist</option>
            <option value="Biokinetic" {{ old('practice', $user->practice) == 'Biokinetic' ? 'selected' : '' }}>Biokinetic</option>
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
        {{ Form::label('category', __('messages.client.category') . ':', ['class' => 'form-label required mb-3']) }}
        <select class="form-control form-control-solid" id="catergory" name="catergory" autocomplete="off" required autofocus>
            <option value="Dentist" {{ old('catergory', $user->catergory) == 'Dentist' ? 'selected' : '' }}>Dentist</option>
            <option value="Pharmacist" {{ old('catergory', $user->catergory) == 'Pharmacist' ? 'selected' : '' }}>Pharmacist</option>
            <option value="Specialist" {{ old('catergory', $user->catergory) == 'Specialist' ? 'selected' : '' }}>Specialist</option>
            <option value="Medical Practitioner" {{ old('catergory', $user->catergory) == 'Medical Practitioner' ? 'selected' : '' }}>Medical Practitioner</option>
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
            {{ Form::label('contact', __('messages.client.contact_no').':', ['class' => 'form-label mb-3']) }}
            {{ Form::tel('contact', $user->contact ?? getSettingValue('country_code'), ['class' => 'form-control form-control-solid', 'onkeyup' => 'if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,"")','id'=>'phoneNumber']) }}
            {{ Form::hidden('region_code',isset($user) ? $user->region_code : null,['id'=>'prefix_code']) }}
            <span id="valid-msg" class="hide text-success fw-400 fs-small mt-2">✓ &nbsp;{{ __('messages.placeholder.valid_number') }}</span>
            <span id="error-msg" class="hide text-danger fw-400 fs-small mt-2"></span>
        </div>
    </div>
    <!-- <div class="col-lg-4 col-sm-12 mb-5">
        <div class="fv-row">
            <div class="">
                {{ Form::label('password',__('messages.client.password').':' ,['class' => 'form-label mb-3']) }}
                <div class="position-relative">
                    <input class="form-control form-control-solid"
                           type="password" placeholder={{__('messages.client.password')}} name="password"
                           autocomplete="off"
                           aria-label="Password" data-toggle="password"
                           value={{isset($user) ? $user->password : null}}
                           >
                    <span class="position-absolute d-flex align-items-center top-0 bottom-0 end-0 me-4 input-icon input-password-hide cursor-pointer text-gray-600">
                                <i class="bi bi-eye-slash-fill"></i>
                        </span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-sm-12 mb-5">
        <div class="fv-row">
            <div class="">
                {{ Form::label('confirmPassword',__('messages.client.confirm_password').':' ,['class' => 'form-label mb-3']) }}
                <div class="position-relative">
                    <input class="form-control form-control-solid"
                           type="password"
                           placeholder="{{__('messages.client.confirm_password')}}" name="password_confirmation"
                           autocomplete="off" aria-label="Password" data-toggle="password"
                           value={{isset($user) ? $user->password : null}}
                           >
                    <span class="position-absolute d-flex align-items-center top-0 bottom-0 end-0 me-4 input-icon input-password-hide cursor-pointer text-gray-600">
                               <i class="bi bi-eye-slash-fill"></i>
                        </span>
                </div>
            </div>
        </div>
    </div> -->
</div>
<div class="float-end d-flex">
    {{ Form::submit(__('messages.common.save'),['class' => 'btn btn-primary me-3']) }}
    <a href="{{ route('users.index') }}" type="reset"
       class="btn btn-secondary btn-active-light-primary">{{__('messages.common.discard')}}</a>
</div>
