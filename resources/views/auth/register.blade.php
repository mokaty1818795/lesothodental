@extends('layouts.auth')
@section('title')
    Register
@endsection
@section('content')
    <div class="container">
        @include('flash::message')
    </div>
    <div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
        <div class="col-12 text-center">
            <a href="{{ url('/') }}" class="image mb-7 mb-sm-10 image-medium">
                <img alt="Logo" src="{{ getLogoUrl() }}" class="img-fluid object-contain">
            </a>
        </div>

        <div class="w-lg-600px">
            @include('layouts.errors')
            <div class="w-lg-600px bg-white rounded shadow-sm p-10 p-lg-15 mx-auto">
                <form class="form w-100" method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-10 text-center">
                        <h1 class="text-dark mb-3">Create an Account</h1>
                        <div class="text-gray-400 fw-bold fs-4">Already have an account?
                            <a href="{{ route('login') }}" class="link-primary fw-bolder">Sign in here</a>
                        </div>
                    </div>

                    <!-- Step 1: Personal Details -->
                    <div class="step" id="step1">
                        <div class="d-flex align-items-center mb-10">
                            <span class=" fw-bolder link-primary fs-7 mx-2">Personal Details</span>

                        </div>

                        <!-- First Name and Last Name fields -->
                        <div class="row fv-row mb-7">
                            <div class="col-xl-6">
                                <label class="form-label fw-bolder text-dark fs-6 required" for="first_name">First Name:</label>
                                <input class="form-control form-control-lg" id="first_name" value="{{ old('first_name') }}" type="text" name="first_name" placeholder="{{__('messages.client.first_name')}}" autocomplete="off" required autofocus/>
                            </div>
                            <div class="col-xl-6">
                                <label class="form-label fw-bolder text-dark fs-6 required" for="last_name">Last Name:</label>
                                <input class="form-control form-control-lg" type="text" value="{{ old('last_name') }}" name="last_name" placeholder="{{__('messages.client.last_name')}}" autocomplete="off" autofocus/>
                            </div>
                        </div>


                        <div class="row fv-row mb-7">


                            <div class="col-xl-6">
                                <label class="form-label fw-bolder text-dark fs-6 required" for="gender">Gender:</label>
                                <select class="form-control form-control-lg" id="gender"
                                    value="{{ old('gender') }}" type="text" name="gender"
                                    placeholder="{{ __('Female') }}" autocomplete="off" required autofocus>
                                        <option value="Female">Female</option>
                                        <option value="Male">Male</option>
                                        <option value="Other">Other</option>
                                </select>
                            </div>

                        <div class="col-xl-6">

                            <label class="form-label fw-bolder text-dark fs-6 required" for="tittle">Tittle:</label>
                            <select class="form-control form-control-lg" id="tittle"
                                value="{{ old('tittle') }}" type="text" name="tittle"
                                placeholder="{{ __('Miss') }}" autocomplete="off" required autofocus>
                                    <option value="Miss">Miss</option>
                                    <option value="Mrs">Mrs</option>
                                    <option value="Mr">Mr</option>
                                    <option value="Hn">Hn</option>
                                    <option value="Dr">Dr</option>
                            </select>
                        </div>
                        </div>





                        <!-- Region and Date of Birth fields -->
                        <div class="row fv-row mb-7 mt-7">
                            <div class="col-xl-6">
                                <label class="form-label fw-bolder text-dark fs-6 required" for="region">Country Of Origin:</label>
                                <input class="form-control form-control-lg" id="region" value="{{ old('region') }}" type="text" name="region" placeholder="{{__('Country')}}" autocomplete="off" required autofocus/>
                            </div>
                            <div class="col-xl-6">
                                <label class="form-label fw-bolder text-dark fs-6 required" for="date_of_birth">Date Of Birth:</label>
                                <input class="form-control form-control-lg" type="date" value="{{ old('date_of_birth') }}" name="date_of_birth" placeholder="{{__('messages.client.date_of_birth')}}" autocomplete="off" autofocus/>
                            </div>
                        </div>

                         <!-- Address and Zip Code fields -->
                        <div class="row fv-row mb-7">
                            <div class="col-xl-6">
                                <label class="form-label fw-bolder text-dark fs-6 required" for="address">Physical Address:</label>
                                <input class="form-control form-control-lg" id="address" value="{{ old('address') }}" type="text" name="address" placeholder="{{__('Address')}}" autocomplete="off" required autofocus/>
                            </div>
                            <div class="col-xl-6">
                                <label class="form-label fw-bolder text-dark fs-6 required" for="zip_code">ZipCode:</label>
                                <input class="form-control form-control-lg" type="text" value="{{ old('zip_code') }}" name="zip_code" placeholder="{{__('Zip Code')}}" autocomplete="off" autofocus/>
                            </div>
                        </div>


                     <!-- State and MOH Authorization Number fields -->
                        <div class="row fv-row mb-7">
                            <div class="col-xl-6">
                                <label class="form-label fw-bolder text-dark fs-6 required" for="state">State:</label>
                                <input class="form-control form-control-lg" id="state" value="{{ old('state') }}" type="text" name="state" placeholder="{{__('State')}}" autocomplete="off" required autofocus/>
                            </div>

                             <div class="col-xl-6">
                                <label class="form-label fw-bolder text-dark fs-6 required" for="town">Town:</label>
                                <input class="form-control form-control-lg" type="text" value="{{ old('town') }}" name="town" placeholder="{{__('Town')}}" required autocomplete="off" autofocus/>
                            </div>
                        </div>

                        <div class="row fv-row mb-7">

                        <div class="col-xl-6">
                            <label class="form-label fw-bolder text-dark fs-6 required" for="practice">Profession:</label>
                            <select class="form-control form-control-lg" id="practice"
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
                             <div class="col-xl-6">
                            <label class="form-label fw-bolder text-dark fs-6 required" for="category">Catergory:</label>
                            <select class="form-control form-control-lg" id="category"
                                value="{{ old('category') }}" type="text" name="category"
                                placeholder="{{ __('Dentist') }}" autocomplete="off" required autofocus>
                                    <option value="Dentist">Dentist</option>
                                    <option value="Pharmacist">Pharmacist</option>
                                    <option value="Specialist">Specialist</option>
                                    <option value="Medical Practitioner">Medical Practioner</option>
                            </select>
                        </div>

                        </div>
                        <button type="button" class="btn btn-primary" onclick="nextStep(1, 2)">Next</button>
                    </div>

                    <!-- Step 2: Facility Details -->
                    <div class="step" id="step2" style="display: none;">
                        <div class="d-flex align-items-center mt-10 mb-10">
                            <span class="fw-bolder link-primary fs-7 mx-2">Facility Details</span>
                        </div>

                        <div class="row fv-row mb-7">
                             <div class="col-xl-6">
                                <label class="form-label fw-bolder text-dark fs-6" for="practice_number">Practice Number:</label>
                                <input class="form-control form-control-lg" type="text" value="{{ old('practice_number') }}" name="practice_number" placeholder="{{__('Practice Number')}}" autocomplete="off" autofocus/>
                            </div>

                             <!-- This One Goes under Facility -->
                            <div class="col-xl-6">
                                <label class="form-label fw-bolder text-dark fs-6" for="authorization_number">Moh Authorization Number:</label>
                                <input class="form-control form-control-lg" type="text" value="{{ old('authorization_number') }}" name="authorization_number" placeholder="{{__('Authorization Number')}}" autocomplete="off" autofocus/>
                            </div>

                            <!-- <div class="col-xl-6">
                                <label class="form-label fw-bolder text-dark fs-6" for="practice_number">Practice Number:</label>
                                <input class="form-control form-control-lg" type="text" value="{{ old('practice_number') }}" name="practice_number" placeholder="{{__('Practice Number')}}" autocomplete="off" autofocus/>
                            </div> -->
                        </div>

                        <!-- Facility Name and Employer's Letter fields -->
                        <div class="row fv-row mt-12 mb-7">
                            <div class="col-xl-6">
                                <label class="form-label fw-bolder text-dark fs-6" for="facility_name">Facility Name:</label>
                                <input class="form-control form-control-lg" id="facility_name" value="{{ old('facility_name') }}" type="text" name="facility_name" placeholder="{{__('Facility Name')}}" autocomplete="off" autofocus/>
                            </div>
                            <div class="col-xl-6">
                                <label class="form-label fw-bolder text-dark fs-6" for="employer_letter">Employer's Letter:</label>
                                <input class="form-control form-control-lg" id="employer_letter" type="file" value="{{ old('employer_letter') }}" name="employer_letter"  autocomplete="off" autofocus/>
                            </div>
                        </div>

                        <!-- Company Registration Number and Pharmacy Trader's Licence Number fields -->
                        <div class="row fv-row mt-12 mb-7">
                            <div class="col-xl-6">
                                <label class="form-label fw-bolder text-dark fs-6 " for="registration_number">Company Registration Number:</label>
                                <input class="form-control form-control-lg" id="registration_number" value="{{ old('registration_number') }}" type="text" name="registration_number" placeholder="{{__('Company Registration Number')}}" autocomplete="off" autofocus/>
                            </div>
                            <div class="col-xl-6">
                                <label class="form-label fw-bolder text-dark fs-6 " for="license_number">Pharmacy Trader's Licence Number:</label>
                                <input class="form-control form-control-lg" type="text" value="{{ old('license_number') }}" name="license_number" placeholder="{{__('Licence Number')}}" autocomplete="off" autofocus/>
                            </div>
                        </div>

                        <!-- Occupation field -->
                        <div class="fv-row mt-7 mb-7">
                            <label class="form-label fw-bolder text-dark fs-6" for="occupation">Working Professional or Student:</label>
                            <input class="form-control form-control-lg" id="occupation" value="{{ old('occupation') }}" type="text" name="occupation" placeholder="{{__('Occupation')}}" autocomplete="off"/>
                        </div>

                        <button type="button" class="btn btn-secondary" onclick="prevStep(2, 1)">Previous</button>
                        <button type="button" class="btn btn-primary" onclick="nextStep(2, 3)">Next</button>
                    </div>

                    <!-- Step 3: Educational Details -->
                    <div class="step" id="step3" style="display: none;">
                        <div class="d-flex align-items-center mt-10 mb-10">
                            <span class="fw-bolder link-primary fs-7 mx-2">Educational Details</span>
                        </div>



                        <!-- Company Registration Number and Pharmacy Trader's Licence Number fields -->
                        <div class="row fv-row mt-12 mb-7">
                            <div class="col-xl-6">
                                <label class="form-label fw-bolder text-dark fs-6  required"  for="institude">Institution Name:</label>
                                <input class="form-control form-control-lg" id="institude" value="{{ old('institude') }}" type="text" name="institude" placeholder="{{__('Institude Name')}}" required autocomplete="off" autofocus/>
                            </div>
                            <div class="col-xl-6">
                                <label class="form-label fw-bolder text-dark fs-6 required " for="attended_from">Attended From:</label>
                                <input class="form-control form-control-lg" type="date" value="{{ old('attended_from') }}" name="attended_from" placeholder="{{__('Attended From')}}" required autocomplete="off" autofocus/>
                            </div>
                        </div>


                        <div class="row fv-row mt-12 mb-7">
                            <div class="col-xl-6">
                                <label class="form-label fw-bolder text-dark fs-6  required"  for="attended_to">Attended To:</label>
                                <input class="form-control form-control-lg" id="attended_to" value="{{ old('attended_to') }}" type="date" name="attended_to" placeholder="{{__('Attended To')}}" required autocomplete="off" autofocus/>
                            </div>
                            <div class="col-xl-6">
                                <label class="form-label fw-bolder text-dark fs-6 required " for="degree_date">Attended From:</label>
                                <input class="form-control form-control-lg" type="date" value="{{ old('degree_date') }}" name="degree_date" placeholder="{{__('Degree Date')}}" required autocomplete="off" autofocus/>
                            </div>
                        </div>

                         <div class="row fv-row mt-12 mb-7">
                            <div class="col-xl-6">
                                <label class="form-label fw-bolder text-dark fs-6"  for="specialization">Specialization:</label>
                                <input class="form-control form-control-lg" id="specialization" value="{{ old('specialization') }}" type="text" name="specialization" placeholder="{{__('Specialization')}}" required autocomplete="off" autofocus/>
                            </div>
                            <div class="col-xl-6">
                                <label class="form-label fw-bolder text-dark fs-6 required " for="profession_studied">Profession Studied:</label>
                                <input class="form-control form-control-lg" type="text" value="{{ old('profession_studied') }}" name="profession_studied" placeholder="{{__('Profession Studied')}}" required autocomplete="off" autofocus/>
                            </div>
                        </div>

                         <div class="row fv-row mt-12 mb-7">
                            <div class="col-xl-6">
                                <label class="form-label fw-bolder text-dark fs-6 required"  for="telephone">Telephone:</label>
                                <input class="form-control form-control-lg" id="telephone" value="{{ old('telephone') }}" type="text" name="telephone" placeholder="{{__('Telephone')}}" required autocomplete="off" autofocus/>
                            </div>
                            <div class="col-xl-6">
                                <label class="form-label fw-bolder text-dark fs-6 required " for="fax">Profession Studied:</label>
                                <input class="form-control form-control-lg" type="text" value="{{ old('fax') }}" name="fax" placeholder="{{__('Fax')}}" required autocomplete="off" autofocus/>
                            </div>
                        </div>

                        <div class="fv-row mt-7 mb-7">
                            <label class="form-label fw-bolder text-dark fs-6 required" for="certificate">Certificate</label>
                            <input class="form-control form-control-lg" id="certificate" value="{{ old('certificate') }}" type="file" name="certificate" placeholder="{{__('Certificate')}}" required autocomplete="off"/>
                        </div>

<!--
                        <div class="fv-row mt-7 mb-7">
                        <label class="form-label fw-bolder text-dark fs-6 required" for="institude">Full Name of Institution:</label>
                        <input class="form-control form-control-lg " id="institude"
                               value="{{ old('institude') }}"
                               type="text" name="institude" placeholder="{{__('Institude')}}" required
                               autocomplete="off"/>
                        <div class="invalid-feedback">
                            {{ $errors->first('institude') }}
                        </div>-->
                    <!-- <div class="fv-row mt-7 mb-7">
                        <label class="form-label fw-bolder text-dark fs-6 required" for="course">Course:</label>
                        <input class="form-control form-control-lg " id="course"
                               value="{{ old('course') }}"
                               type="text" name="course" placeholder="{{__('Course')}}" required
                               autocomplete="off"/>
                        <div class="invalid-feedback">
                            {{ $errors->first('course') }}
                        </div>
                    </div> -->

                    <!-- <div class="fv-row mt-7 mb-7">
                        <label class="form-label fw-bolder text-dark fs-6 " for="institude1">Full Name of Institution:</label>
                        <input class="form-control form-control-lg " id="institude1"
                               value="{{ old('institude1') }}"
                               type="text" name="institude1" placeholder="{{__('Institude')}}"
                               autocomplete="off"/>
                        <div class="invalid-feedback">
                            {{ $errors->first('institude1') }}
                        </div>
                    </div>
                    <div class="fv-row mt-7 mb-7">
                        <label class="form-label fw-bolder text-dark fs-6 " for="course1">Course:</label>
                        <input class="form-control form-control-lg " id="course1"
                               value="{{ old('course1') }}"
                               type="text" name="course1" placeholder="{{__('Course')}}"
                               autocomplete="off"/>
                        <div class="invalid-feedback">
                            {{ $errors->first('course1') }}
                        </div>
                    </div> -->

                    <!-- <div class="fv-row mt-7 mb-7">
                        <label class="form-label fw-bolder text-dark fs-6 " for="institude2">Full Name of Institution:</label>
                        <input class="form-control form-control-lg " id="institude2"
                               value="{{ old('institude2') }}"
                               type="text" name="institude2" placeholder="{{__('Institude')}}"
                               autocomplete="off"/>
                        <div class="invalid-feedback">
                            {{ $errors->first('institude2') }}
                        </div>
                    </div> -->
                    <!-- <div class="fv-row mt-7 mb-7">
                        <label class="form-label fw-bolder text-dark fs-6 " for="course2">Course:</label>
                        <input class="form-control form-control-lg " id="course2"
                               value="{{ old('course2') }}"
                               type="text" name="course2" placeholder="{{__('Course')}}"
                               autocomplete="off"/>
                        <div class="invalid-feedback">
                            {{ $errors->first('course2') }}
                        </div>
                    </div> -->
                        <button type="button" class="btn btn-secondary" onclick="prevStep(3, 2)">Previous</button>
                        <button type="button" class="btn btn-primary" onclick="nextStep(3, 4)">Next</button>
                    </div>

                    <!-- Step 4: Account Details -->
                    <div class="step" id="step4" style="display: none;">
                        <!-- Email Address field -->
                        <div class="fv-row mb-7">
                            <label class="form-label fw-bolder text-dark fs-6 required" for="email">Email:</label>
                            <input class="form-control form-control-lg" id="email" value="{{ old('email') }}" type="email" name="email" placeholder="{{__('messages.client.email')}}" required autocomplete="off"/>
                        </div>

                        <!-- Password field -->
                        <div class="mb-10 fv-row" data-kt-password-meter="true">
                            <div class="mb-1">
                                <label class="form-label fw-bolder text-dark fs-6 required" for="password">Password:</label>
                                <div class="position-relative mb-3">
                                    <input class="form-control form-control-lg" id="password" type="password" name="password" placeholder="{{ __('messages.client.password')}}" autocomplete="new-password"/>
                                    <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
                                        <i class="bi bi-eye-slash fs-2"></i>
                                        <i class="bi bi-eye fs-2 d-none"></i>
                                    </span>
                                </div>
                                <div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
                                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
                                </div>
                            </div>
                            <div class="text-muted">Use 8 or more characters with a mix of letters, numbers &amp; symbols.</div>
                        </div>

                        <!-- Confirm Password field -->
                        <div class="fv-row mb-5">
                            <label class="form-label fw-bolder text-dark fs-6 required" for="password_confirmation">Confirm Password:</label>
                            <input class="form-control form-control-lg" type="password" id="password_confirmation" name="password_confirmation" placeholder="{{ __('messages.client.confirm_password')}}" autocomplete="off"/>
                        </div>

                        <!-- Terms and Conditions checkbox -->
                        <div class="fv-row mb-10">
                            <label class="form-check form-check-custom form-check-inline">
                                <input class="form-check-input" type="checkbox" name="toc" value="1" required/>
                                <span class="form-check-label fw-bold text-gray-700 fs-6">I Agree
                                    <a href="#" class="ms-1 link-primary">Terms and conditions</a>.</span>
                            </label>
                        </div>

                        <button type="button" class="btn btn-secondary" onclick="prevStep(4, 3)">Previous</button>
                        <button type="submit" class="btn btn-lg btn-primary">
                            <span class="indicator-label">{{ __('Register') }}</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

<script>
function nextStep(currentStep, nextStep) {
    document.getElementById('step' + currentStep).style.display = 'none';
    document.getElementById('step' + nextStep).style.display = 'block';
}

function prevStep(currentStep, prevStep) {
    document.getElementById('step' + currentStep).style.display = 'none';
    document.getElementById('step' + prevStep).style.display = 'block';
}
</script>
