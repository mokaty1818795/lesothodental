@extends('layouts.auth')
@section('title')
    Register
@endsection
@section('content')
    <div class="container">
        @include('flash::message')
    </div>
    <div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">

        <a href="{{ url('/') }}" class="mb-12">
            <img alt="Logo" src="{{ getLogoUrl() }}" class="h-45px logo"/>
        </a>

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

                    <div class="d-flex align-items-center mb-10">
                        <div class="border-bottom border-gray-300 mw-50 w-100"></div>
                            <span class="fw-bold text-red-500 fs-7 mx-2">Personal Details</span>
                        <div class="border-bottom border-gray-300 mw-50 w-100"></div>
                    </div>

                    <div class="row fv-row mb-7">

                        <!-- Name -->
                        <div class="col-xl-6">
                            <label class="form-label fw-bolder text-dark fs-6 required" for="name">First Name:</label>
                            <input class="form-control form-control-lg" id="first_name"
                                   value="{{ old('first_name') }}" type="text" name="first_name"
                                   placeholder="{{__('messages.client.first_name')}}" autocomplete="off" required
                                   autofocus/>
                            <div class="invalid-feedback">
                                {{ $errors->first('first_name') }}
                            </div>
                        </div>

                        <!-- Last Name -->
                        <div class="col-xl-6">
                            <label class="form-label fw-bolder text-dark fs-6 required" for="last_name">Last
                                Name:</label>
                            <input class="form-control form-control-lg " type="text"
                                   value="{{ old('last_name') }}" name="last_name"
                                   placeholder="{{__('messages.client.last_name')}}"
                                   autocomplete="off" autofocus/>
                            <div class="invalid-feedback">
                                {{ $errors->first('last_name') }}
                            </div>
                        </div>

                    </div>

                    <!-- //new fields here -->

                <div class="row fv-row mb-7 mt-7">

                        <!-- Name -->
                        <div class="col-xl-6">
                            <label class="form-label fw-bolder text-dark fs-6 required" for="region">Region:</label>
                            <input class="form-control form-control-lg " id="region"
                                   value="{{ old('region') }}" type="text" name="region"
                                   placeholder="{{__('Region')}}" autocomplete="off" required
                                   autofocus/>
                            <div class="invalid-feedback">
                                {{ $errors->first('region') }}
                            </div>
                        </div>

                        <!-- Last Name -->
                        <div class="col-xl-6">
                            <label class="form-label fw-bolder text-dark fs-6 required" for="date_of_birth">Date Of Birth:</label>
                            <input class="form-control form-control-lg " type="date"
                                   value="{{ old('date_of_birth') }}" name="date_of_birth"
                                   placeholder="{{__('messages.client.date_of_birth')}}"
                                   autocomplete="off" autofocus/>
                            <div class="invalid-feedback">
                                {{ $errors->first('date_of_birth') }}
                            </div>
                        </div>

                    </div>

                    <div class="row fv-row mb-7">

                        <!-- Name -->
                        <div class="col-xl-6">
                            <label class="form-label fw-bolder text-dark fs-6 required" for="practice">Practition:</label>
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
                            <!-- <input class="form-control form-control-lg " id="practice"
                                   value="{{ old('practice') }}" type="text" name="practice"
                                   placeholder="{{__('Dentist')}}" autocomplete="off" required
                                   autofocus/>
                            <div class="invalid-feedback">
                                {{ $errors->first('practice') }}
                            </div> -->
                        </div>

                        <!-- Last Name -->
                        <div class="col-xl-6">
                            <label class="form-label fw-bolder text-dark fs-6 required" for="practice_number">Practice Number:</label>
                            <input class="form-control form-control-lg " type="text"
                                   value="{{ old('practice_number') }}" name="practice_number"
                                   placeholder="{{__('Practice Number')}}"
                                   autocomplete="off" autofocus/>
                            <div class="invalid-feedback">
                                {{ $errors->first('practice_number') }}
                            </div>
                        </div>

                    </div>


                      <div class="row fv-row mb-7">

                        <!-- Name -->
                        <div class="col-xl-6">
                            <label class="form-label fw-bolder text-dark fs-6 required" for="address">Address:</label>
                            <input class="form-control form-control-lg " id="address"
                                   value="{{ old('address') }}" type="text" name="address"
                                   placeholder="{{__('Address')}}" autocomplete="off" required
                                   autofocus/>
                            <div class="invalid-feedback">
                                {{ $errors->first('address') }}
                            </div>
                        </div>

                        <!-- Last Name -->
                        <div class="col-xl-6">
                            <label class="form-label fw-bolder text-dark fs-6 required" for="zip_code">ZipCode:</label>
                            <input class="form-control form-control-lg " type="text"
                                   value="{{ old('zip_code') }}" name="zip_code"
                                   placeholder="{{__('Zip Code')}}"
                                   autocomplete="off" autofocus/>
                            <div class="invalid-feedback">
                                {{ $errors->first('zip_code') }}
                            </div>
                        </div>

                    </div>

                    <div class="row fv-row mb-7">

                        <!-- Name -->
                        <div class="col-xl-6">
                            <label class="form-label fw-bolder text-dark fs-6 required" for="state">State:</label>
                            <input class="form-control form-control-lg " id="state"
                                   value="{{ old('state') }}" type="text" name="state"
                                   placeholder="{{__('State')}}" autocomplete="off" required
                                   autofocus/>
                            <div class="invalid-feedback">
                                {{ $errors->first('state') }}
                            </div>
                        </div>

                        <!-- Last Name -->
                        <div class="col-xl-6">
                            <label class="form-label fw-bolder text-dark fs-6 required" for="authorization_number">Moh Authorization Number:</label>
                            <input class="form-control form-control-lg " type="text"
                                   value="{{ old('authorization_number') }}" name="authorization_number"
                                   placeholder="{{__('Authorization Number')}}"
                                   required
                                   autocomplete="off" autofocus/>
                            <div class="invalid-feedback">
                                {{ $errors->first('authorization_number') }}
                            </div>
                        </div>

                    </div>

                    <div class="d-flex align-items-center mt-10 mb-10">
                        <div class="border-bottom border-gray-300 mw-50 w-100"></div>
                        <span class="fw-bold text-red-500 fs-7 mx-2">Facility</span>
                        <div class="border-bottom border-gray-300 mw-50 w-100"></div>
                    </div>

                    <div class="row fv-row mt-12 mb-7">

                        <!-- Name -->
                        <div class="col-xl-6">
                            <label class="form-label fw-bolder text-dark fs-6 required" for="facility_name">Facility Name:</label>
                            <input class="form-control form-control-lg " id="facility_name"
                                   value="{{ old('facility_name') }}" type="text" name="facility_name"
                                   placeholder="{{__('Facility Name')}}" autocomplete="off" required
                                   autofocus/>
                            <div class="invalid-feedback">
                                {{ $errors->first('facility_name') }}
                            </div>
                        </div>

                        <!-- Last Name -->
                        <div class="col-xl-6">
                            <label class="form-label fw-bolder text-dark fs-6 required" for="employer_letter">Employer's Letter:</label>
                            <input class="form-control form-control-lg" id="employer_letter" type="file"
                                   value="{{ old('employer_letter') }}" name="employer_letter"
                                   placeholder="{{__('Authorization Number')}}"
                                   required
                                   autocomplete="off" autofocus/>
                            <div class="invalid-feedback">
                                {{ $errors->first('employer_letter') }}
                            </div>
                        </div>

                    </div>

                    <div class="row fv-row mt-12 mb-7">

                        <!-- Name -->
                        <div class="col-xl-6">
                            <label class="form-label fw-bolder text-dark fs-6 required" for="registration_number">Company Registration Number:</label>
                            <input class="form-control form-control-lg " id="registration_number"
                                   value="{{ old('registration_number') }}" type="text" name="registration_number"
                                   placeholder="{{__('Company Registration Number')}}" autocomplete="off" required
                                   autofocus/>
                            <div class="invalid-feedback">
                                {{ $errors->first('registration_number') }}
                            </div>
                        </div>

                        <!-- Last Name -->
                        <div class="col-xl-6">
                            <label class="form-label fw-bolder text-dark fs-6 required" for="license_number">Pharmacy Trader's Licence Number:*:</label>
                            <input class="form-control form-control-lg " type="text"
                                   value="{{ old('license_number') }}" name="license_number"
                                   placeholder="{{__('Licence Number')}}"
                                   required
                                   autocomplete="off" autofocus/>
                            <div class="invalid-feedback">
                                {{ $errors->first('license_number') }}
                            </div>
                        </div>

                    </div>

                    <div class="fv-row mt-7 mb-7">
                        <label class="form-label fw-bolder text-dark fs-6 required" for="occupation">Occupation:</label>
                        <input class="form-control form-control-lg " id="occupation"
                               value="{{ old('occupation') }}"
                               type="text" name="occupation" placeholder="{{__('Occupation')}}" required
                               autocomplete="off"/>
                        <div class="invalid-feedback">
                            {{ $errors->first('occupation') }}
                        </div>
                    </div>

                    <div class="d-flex align-items-center mt-10 mb-10">
                        <div class="border-bottom border-gray-300 mw-50 w-100"></div>
                        <span class="fw-bold text-red-500 fs-7 mx-2">Educational Details</span>
                        <div class="border-bottom border-gray-300 mw-50 w-100"></div>
                    </div>
                    <div class="fv-row mt-7 mb-7">
                        <label class="form-label fw-bolder text-dark fs-6 required" for="institude">Full Name of Institution:</label>
                        <input class="form-control form-control-lg " id="institude"
                               value="{{ old('institude') }}"
                               type="text" name="institude" placeholder="{{__('Institude')}}" required
                               autocomplete="off"/>
                        <div class="invalid-feedback">
                            {{ $errors->first('institude') }}
                        </div>
                    </div>
                    <div class="fv-row mt-7 mb-7">
                        <label class="form-label fw-bolder text-dark fs-6 required" for="course">Course:</label>
                        <input class="form-control form-control-lg " id="course"
                               value="{{ old('course') }}"
                               type="text" name="course" placeholder="{{__('Course')}}" required
                               autocomplete="off"/>
                        <div class="invalid-feedback">
                            {{ $errors->first('course') }}
                        </div>
                    </div>

                    <div class="fv-row mt-7 mb-7">
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
                    </div>

                    <div class="fv-row mt-7 mb-7">
                        <label class="form-label fw-bolder text-dark fs-6 " for="institude2">Full Name of Institution:</label>
                        <input class="form-control form-control-lg " id="institude2"
                               value="{{ old('institude2') }}"
                               type="text" name="institude2" placeholder="{{__('Institude')}}"
                               autocomplete="off"/>
                        <div class="invalid-feedback">
                            {{ $errors->first('institude2') }}
                        </div>
                    </div>
                    <div class="fv-row mt-7 mb-7">
                        <label class="form-label fw-bolder text-dark fs-6 " for="course2">Course:</label>
                        <input class="form-control form-control-lg " id="course2"
                               value="{{ old('course2') }}"
                               type="text" name="course2" placeholder="{{__('Course')}}"
                               autocomplete="off"/>
                        <div class="invalid-feedback">
                            {{ $errors->first('course2') }}
                        </div>
                    </div>

                    <!-- Email Address -->
                    <div class="fv-row mb-7">
                        <label class="form-label fw-bolder text-dark fs-6 required" for="email">Email:</label>
                        <input class="form-control form-control-lg " id="email"
                               value="{{ old('email') }}"
                               type="email" name="email" placeholder="{{__('messages.client.email')}}" required
                               autocomplete="off"/>
                        <div class="invalid-feedback">
                            {{ $errors->first('email') }}
                        </div>
                    </div>

                    <!-- Password -->
                    <div class="mb-10 fv-row" data-kt-password-meter="true">

                        <div class="mb-1">

                            <label class="form-label fw-bolder text-dark fs-6 required" for="password">Password:</label>

                            <div class="position-relative mb-3">
                                <input class="form-control form-control-lg " id="password"
                                       type="password"
                                       name="password" placeholder="{{ __('messages.client.password')}}"
                                       autocomplete="new-password"/>
                                <div class="invalid-feedback">
                                    {{ $errors->first('password') }}
                                </div>
                                <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2"
                                      data-kt-password-meter-control="visibility">
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

                        <div class="text-muted">Use 8 or more characters with a mix of letters, numbers &amp; symbols.
                        </div>

                    </div>

                    <!-- Confirm Password -->
                    <div class="fv-row mb-5">
                        <label class="form-label fw-bolder text-dark fs-6 required" for="password_confirmation">Confirm
                            Password:</label>
                        <input class="form-control form-control-lg " type="password"
                               id="password_confirmation" name="password_confirmation"
                               placeholder="{{ __('messages.client.confirm_password')}}"
                               autocomplete="off"/>
                        <div class="invalid-feedback">
                            {{ $errors->first('password_confirmation') }}
                        </div>
                    </div>

                    <div class="fv-row mb-10">
                        <label class="form-check form-check-custom  form-check-inline">
                            <input class="form-check-input" type="checkbox" name="toc" value="1" required/>
                            <span class="form-check-label fw-bold text-gray-700 fs-6">I Agree
									<a href="#" class="ms-1 link-primary">Terms and conditions</a>.</span>
                        </label>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-lg btn-primary">
                            <span class="indicator-label"> {{ __('Register') }}</span>
                            <span class="indicator-progress">Please wait...
									<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                    </div>

                </form>

            </div>
        </div>

    </div>

    <!--end::Main-->
@endsection
