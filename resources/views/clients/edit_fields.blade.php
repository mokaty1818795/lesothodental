<div class="row gx-10 mb-5">
    <div class="col-lg-4 col-sm-12 mb-5">
        <div class="mb-5">
            {{ Form::label('first_name', __('messages.client.first_name').':', ['class' => 'form-label required mb-3']) }}
            {{ Form::text('first_name', $client->user->first_name ?? null, ['class' => 'form-control form-control-solid', 'placeholder' => __('messages.client.first_name'), 'required']) }}
        </div>
    </div>
    <div class="col-lg-4 col-sm-12 mb-5">
        <div class="mb-5">
            {{ Form::label('last_name', __('messages.client.last_name').':', ['class' => 'form-label required mb-3']) }}
            {{ Form::text('last_name', $client->user->last_name ?? null, ['class' => 'form-control form-control-solid', 'placeholder' => __('messages.client.last_name'), 'required']) }}
        </div>
    </div>
    <div class="col-lg-4 col-sm-12 mb-5">
        <div class="mb-5">
            {{ Form::label('email', __('messages.client.email').':', ['class' => 'form-label required mb-3']) }}
            {{ Form::email('email', $client->user->email ?? null, ['class' => 'form-control form-control-solid', 'placeholder' => __('messages.client.email'), 'required']) }}
        </div>
    </div>
    <div class="col-lg-4 col-sm-12 mb-5">
        <div class="mb-5">
            {{ Form::label('contact', __('messages.client.contact_no').':', ['class' => 'form-label mb-3']) }}
            {{ Form::tel('contact', $client->user->contact ??  getSettingValue('country_code'), ['class' => 'form-control form-control-solid', 'onkeyup' => 'if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,"")','id'=>'phoneNumber']) }}
            {{ Form::hidden('region_code', $client->user->region_code ?? null, ['id'=>'prefix_code']) }}
            <span id="valid-msg" class="hide text-success fw-400 fs-small mt-2">✓ &nbsp; {{ __('messages.placeholder.valid_number') }}</span>
            <span id="error-msg" class="hide text-danger fw-400 fs-small mt-2"></span>
        </div>
    </div>

<div class="col-lg-4 col-sm-12 mb-5">
    <div class="mb-5">
        {{ Form::label('gender', __('messages.client.gender') . ':', ['class' => 'form-label required mb-3']) }}
        <select class="form-select form-control-lg" id="gender" name="gender" autocomplete="off" required autofocus>
            <option value="Female" {{ old('gender', $client->user->gender) == 'Female' ? 'selected' : '' }}>Female</option>
            <option value="Male" {{ old('gender', $client->user->gender) == 'Male' ? 'selected' : '' }}>Male</option>
            <option value="Other" {{ old('gender', $client->user->gender) == 'Other' ? 'selected' : '' }}>Other</option>
        </select>
    </div>
</div>
    <div class="col-lg-4 col-sm-12 mb-5">
        <div class="mb-5">
            {{ Form::label('tittle', __('messages.client.title') . ':', ['class' => 'form-label required mb-3']) }}
            {{ Form::text('tittle', isset($client) ? $client->user->tittle : null, ['class' => 'form-control form-control-solid', 'placeholder' => __('messages.client.title'), 'required']) }}
        </div>
    </div>
    <div class="col-lg-4 col-sm-12 mb-5">
        <div class="mb-5">
            {{ Form::label('country', __('messages.client.country') . ':', ['class' => 'form-label mb-3 required']) }}
            {{ Form::text('region', isset($client) ? $client->user->region : null, ['class' => 'form-control form-control-solid', 'placeholder' => __('messages.client.country'), 'required']) }}
        </div>
    </div>

    <div class="col-lg-4 col-sm-12 mb-5">
        <div class="mb-5">
            {{ Form::label('dob', __('messages.client.dob') . ':', ['class' => 'form-label required mb-3']) }}
            {{ Form::text('date_of_birth',isset($client) ? $client->user->rdate_of_birthegion : null,['class' => 'form-select', 'id' => 'date_of_birth', 'autocomplete' => 'off', 'required']) }}
        </div>
    </div>
    <div class="col-lg-4 col-sm-12 mb-5">
        <div class="mb-5">
            {{ Form::label('address', __('messages.client.address') . ':', ['class' => 'form-label required mb-3']) }}
            {{ Form::text('address', isset($client) ? $client->user->address : null, ['class' => 'form-control form-control-solid', 'placeholder' => __('messages.client.address'), 'required']) }}
        </div>
    </div>
    <div class="col-lg-4 col-sm-12 mb-5">
        <div class="mb-5">
            {{ Form::label('zip_code', __('messages.client.zipcode') . ':', ['class' => 'form-label mb-3 required']) }}
            {{ Form::text('zip_code',isset($client) ? $client->user->zip_code : null, ['class' => 'form-control form-control-solid', 'placeholder' => __('messages.client.zipcode'), 'required']) }}
        </div>
    </div>

     <div class="col-lg-4 col-sm-12 mb-5">
        <div class="mb-5">
            {{ Form::label('state', __('messages.client.state') . ':', ['class' => 'form-label required mb-3']) }}
            {{ Form::text('state', isset($client) ? $client->user->state : null, ['class' => 'form-control form-control-solid', 'placeholder' => __('messages.client.state'), 'required']) }}
        </div>
    </div>
    <div class="col-lg-4 col-sm-12 mb-5">
        <div class="mb-5">
            {{ Form::label('town', __('messages.client.town') . ':', ['class' => 'form-label required mb-3']) }}
            {{ Form::text('town',isset($client) ?  $client->user->town : null, ['class' => 'form-control form-control-solid', 'placeholder' => __('messages.client.town'), 'required']) }}
        </div>
    </div>


<div class="col-lg-4 col-sm-12 mb-5">
    <div class="mb-5">
        {{ Form::label('profession', __('messages.client.profession') . ':', ['class' => 'form-label mb-3 required']) }}
        <select class="form-control form-control-solid" id="practice" name="practice" autocomplete="off" required autofocus>
            <option value="Clinical Officer" {{ old('practice', $client->user->practice) == 'Clinical Officer' ? 'selected' : '' }}>Clinical Officer</option>
            <option value="Medical Practitioner" {{ old('practice', $client->user->practice) == 'Medical Practitioner' ? 'selected' : '' }}>Medical Practitioner</option>
            <option value="Specialist" {{ old('practice', $client->user->practice) == 'Specialist' ? 'selected' : '' }}>Specialist</option>
            <option value="Dentist" {{ old('practice', $client->user->practice) == 'Dentist' ? 'selected' : '' }}>Dentist</option>
            <option value="Pharmacist" {{ old('practice',  $client->user->practice) == 'Pharmacist' ? 'selected' : '' }}>Pharmacist</option>
            <option value="Environmental Health Specialist" {{ old('practice', $client->user->practice) == 'Environmental Health Specialist' ? 'selected' : '' }}>Environmental Health Specialist</option>
            <option value="Health Assistant" {{ old('practice', $client->user->practice) == 'Health Assistant' ? 'selected' : '' }}>Health Assistant</option>
            <option value="Physiotherapist" {{ old('practice',  $client->user->practice) == 'Physiotherapist' ? 'selected' : '' }}>Physiotherapist</option>
            <option value="Psychologist" {{ old('practice', $client->user->practice) == 'Psychologist' ? 'selected' : '' }}>Psychologist</option>
            <option value="Counsellor" {{ old('practice', $client->user->practice) == 'Counsellor' ? 'selected' : '' }}>Counsellor</option>
            <option value="Dental Technician" {{ old('practice', $client->user->practice) == 'Dental Technician' ? 'selected' : '' }}>Dental Technician</option>
            <option value="Dental Technologist" {{ old('practice', $client->user->practice) == 'Dental Technologist' ? 'selected' : '' }}>Dental Technologist</option>
            <option value="Dental Therapist" {{ old('practice', $client->user->practice) == 'Dental Therapist' ? 'selected' : '' }}>Dental Therapist</option>
            <option value="Pharm Technician" {{ old('practice', $client->user->practice) == 'Pharm Technician' ? 'selected' : '' }}>Pharm Technician</option>
            <option value="Dispenser" {{ old('practice', $client->user->practice) == 'Dispenser' ? 'selected' : '' }}>Dispenser</option>
            <option value="Medical Technologist" {{ old('practice', $client->user->practice) == 'Medical Technologist' ? 'selected' : '' }}>Medical Technologist</option>
            <option value="Radiographer" {{ old('practice', $client->user->practice) == 'Radiographer' ? 'selected' : '' }}>Radiographer</option>
            <option value="Speech Therapist" {{ old('practice', $client->user->practice) == 'Speech Therapist' ? 'selected' : '' }}>Speech Therapist</option>
            <option value="Optometrist" {{ old('practice', $client->user->practice) == 'Optometrist' ? 'selected' : '' }}>Optometrist</option>
            <option value="Orthopedic Technician" {{ old('practice', $client->user->practice) == 'Orthopedic Technician' ? 'selected' : '' }}>Orthopedic Technician</option>
            <option value="Dietician" {{ old('practice',  $client->user->practice) == 'Dietician' ? 'selected' : '' }}>Dietician</option>
            <option value="Laboratory Technician" {{ old('practice', $client->user->practice) == 'Laboratory Technician' ? 'selected' : '' }}>Laboratory Technician</option>
            <option value="Plaster Room Technician" {{ old('practice', $client->user->practice) == 'Plaster Room Technician' ? 'selected' : '' }}>Plaster Room Technician</option>
            <option value="Paramedic" {{ old('practice',  $client->user->practice) == 'Paramedic' ? 'selected' : '' }}>Paramedic</option>
            <option value="Biomedical Forensic Genetic" {{ old('practice', $client->user->practice) == 'Biomedical Forensic Genetic' ? 'selected' : '' }}>Biomedical Forensic Genetic</option>
            <option value="Anesthetic" {{ old('practice',  $client->user->practice) == 'Anesthetic' ? 'selected' : '' }}>Anesthetic</option>
            <option value="Clinical Technologist" {{ old('practice', $client->user->practice) == 'Clinical Technologist' ? 'selected' : '' }}>Clinical Technologist</option>
            <option value="Biokinetic" {{ old('practice',  $client->user->practice) == 'Biokinetic' ? 'selected' : '' }}>Biokinetic</option>
            <option value="Pastoral Care & Counselling" {{ old('practice', $client->user->practice) == 'Pastoral Care & Counselling' ? 'selected' : '' }}>Pastoral Care & Counselling</option>
            <option value="Psychometrist" {{ old('practice', $client->user->practice) == 'Psychometrist' ? 'selected' : '' }}>Psychometrist</option>
            <option value="Audiologist" {{ old('practice', $client->user->practice) == 'Audiologist' ? 'selected' : '' }}>Audiologist</option>
            <option value="Nutritionist" {{ old('practice', $client->user->practice) == 'Nutritionist' ? 'selected' : '' }}>Nutritionist</option>
            <option value="Masseur" {{ old('practice', $client->user->practice) == 'Masseur' ? 'selected' : '' }}>Masseur</option>
            <option value="Oral Hygienist" {{ old('practice', $client->user->practice) == 'Oral Hygienist' ? 'selected' : '' }}>Oral Hygienist</option>
        </select>
    </div>
</div>

<div class="col-lg-4 col-sm-12 mb-5">
    <div class="mb-5">
        {{ Form::label('category', __('messages.client.category') . ':', ['class' => 'form-label required mb-3']) }}
        <select class="form-control form-control-solid" id="catergory" name="catergory" autocomplete="off" required autofocus>
            <option value="Dentist" {{ old('catergory', $client->user->catergory) == 'Dentist' ? 'selected' : '' }}>Dentist</option>
            <option value="Pharmacist" {{ old('catergory', $client->user->catergory) == 'Pharmacist' ? 'selected' : '' }}>Pharmacist</option>
            <option value="Specialist" {{ old('catergory', $client->user->catergory) == 'Specialist' ? 'selected' : '' }}>Specialist</option>
            <option value="Medical Practitioner" {{ old('catergory', $client->user->catergory) == 'Medical Practitioner' ? 'selected' : '' }}>Medical Practitioner</option>
        </select>
    </div>
</div>
    <div class="col-lg-4 col-sm-12 mb-5">
        <div class="mb-5">
            {{ Form::label('practice_number', __('messages.client.practice_number') . ':', ['class' => 'form-label mb-3']) }}
            {{ Form::text('practice_number', isset($client) ? $client->user->practice_number : null, ['class' => 'form-control form-control-solid', 'placeholder' => __('messages.client.practice_number')]) }}
        </div>
    </div>
    <div class="col-lg-4 col-sm-12 mb-5">
        <div class="mb-5">
            {{ Form::label('authorization_number', __('messages.client.authorization_number') . ':', ['class' => 'form-label mb-3']) }}
            {{ Form::text('authorization_number', isset($client) ?  $client->user->authorization_number : null, ['class' => 'form-control form-control-solid', 'placeholder' => __('messages.client.authorization_number')]) }}
        </div>
    </div>

     <div class="col-lg-4 col-sm-12 mb-5">
        <div class="mb-5">
            {{ Form::label('retention_number', __('messages.client.registrationNumber') . ':', ['class' => 'form-label  mb-3']) }}
            {{ Form::text('retention_number', isset($client) ?  $client->user->retention_number : null, ['class' => 'form-control form-control-solid', 'placeholder' => __('messages.client.registrationNumber')]) }}
        </div>
    </div>


     <div class="col-lg-4 col-sm-12 mb-5">
        <div class="mb-5">
            {{ Form::label('registration_number', __('messages.client.registration_number') . ':', ['class' => 'form-label  mb-3']) }}
            {{ Form::text('registration_number', isset($client) ?  $client->user->registration_number : null, ['class' => 'form-control form-control-solid', 'placeholder' => __('messages.client.registration_number')]) }}
        </div>
    </div>

    <div class="col-lg-4 col-sm-12 mb-5">
        <div class="mb-5">
            {{ Form::label('facility_name', __('messages.client.facility_name') . ':', ['class' => 'form-label  mb-3']) }}
            {{ Form::text('facility_name', isset($client) ?  $client->user->facility_name : null, ['class' => 'form-control form-control-solid', 'placeholder' => __('messages.client.facility_name')]) }}
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

            @if(isset($client->user->employer_letter) && $client->user->employer_letter)
                <div class="mt-2 text-sm">
                    <a href="{{ $client->user->employer_letter }}" target="_blank">
                        Employment Letter
                    </a>
                </div>
            @endif
        </div>
    </div>
     <div class="col-lg-4 col-sm-12 mb-5">
        <div class="mb-5">
            {{ Form::label('license_number', __('messages.client.license_number') . ':', ['class' => 'form-label mb-3']) }}
            {{ Form::text('license_number', isset($client) ? $client->user->license_number : null, ['class' => 'form-control form-control-solid', 'placeholder' => __('messages.client.license_number')]) }}
        </div>
    </div>
    <div class="col-lg-4 col-sm-12 mb-5">
        <div class="mb-5">
            {{ Form::label('occupation', __('messages.client.occupation') . ':', ['class' => 'form-label required mb-3']) }}
            {{ Form::text('occupation', isset($client) ? $client->user->occupation : null, ['class' => 'form-control form-control-solid', 'placeholder' => __('messages.client.occupation'),'required']) }}
        </div>
    </div>
    <!-- <div class="col-lg-6 mb-5">
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
    </div> -->
    <!-- <div class="col-lg-6">
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
    </div> -->
    <div class="col-lg-3 mb-7">
        <div class="mb-3" io-image-input="true">
            <label for="exampleInputImage" class="form-label">{{ __('messages.client.profile').':' }}</label>
            <div class="d-block">
                <div class="image-picker">
                    <div class="image previewImage" id="previewImage"
                    {{ $styleCss  }}="background-image: url({{ !empty($client->user->profile_image) ? $client->user->profile_image : asset('web/media/avatars/150-26.jpg') }}
                    )">
                </div>
                <span class="picker-edit rounded-circle text-gray-500 fs-small" data-bs-toggle="tooltip"
                      title="Change Profile">
                    <label>
                        <i class="fa-solid fa-pen" id="previewImage"></i>
                            <input type="file" id="profile_image" name="profile" class="image-upload d-none"
                                   accept="image/*"/>
                             <input type="hidden" name="avatar_remove">
                    </label>
                </span>
            </div>
        </div>
        <div class="form-text">{{ __('messages.flash.allowed_file_types_png_jpg_jpeg') }}</div>
    </div>
</div>
<div class="d-flex justify-content-end mt-5">
    {{ Form::submit(__('messages.common.save'),['class' => 'btn btn-primary me-3']) }}
    <a href="{{ route('clients.index') }}" type="reset"
       class="btn btn-secondary btn-active-light-primary">{{__('messages.common.discard')}}</a>
</div>
