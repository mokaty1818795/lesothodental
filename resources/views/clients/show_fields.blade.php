<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-xxl-5 col-12">
                <div class="d-sm-flex align-items-center mb-5 mb-xxl-0 text-center text-sm-start">
                    <div class="image image-circle image-small">
                        <img src="{{ $client->user->profile_image }}" alt="user" class="object-contain">
                    </div>
                    <div class="ms-0 ms-md-10 mt-5 mt-sm-0">
                        <h2>{{ $client->user->full_name }}</h2>
                        <a href="mailto:{{ $client->user->email }}" class="text-gray-600 text-decoration-none fs-4">
                            {{ $client->user->email }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="mt-7 overflow-hidden">
    <ul class="nav nav-tabs mb-5 pb-1 overflow-auto flex-nowrap text-nowrap" id="myTab" role="tablist">
        <li class="nav-item position-relative me-7 mb-3" role="presentation">
            <button class="nav-link tab-link active p-0" id="overview-tab" data-bs-toggle="tab"
                data-bs-target="#overview" type="button" role="tab" aria-controls="overview" aria-selected="true">
                {{ __('messages.invoice.overview') }}
            </button>
        </li>
        <li class="nav-item position-relative me-7 mb-3" role="presentation">
            <button class="nav-link tab-link p-0" id="invoices-tab" data-bs-toggle="tab" data-bs-target="#invoices"
                type="button" role="tab" aria-controls="invoices" aria-selected="false">
                {{ __('messages.invoices') }}
            </button>
        </li>
        <li class="nav-item position-relative me-7 mb-3" role="presentation">
            <button class="nav-link tab-link p-0" id="invoices-tab" data-bs-toggle="tab" data-bs-target="#quotes"
                type="button" role="tab" aria-controls="quotes" aria-selected="false">
                {{ __('messages.quotes') }}
            </button>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6 d-flex flex-column mb-md-10 mb-5">
                            <label for="name" class="pb-2 fs-4 text-gray-600">{{ __('messages.user.full_name') }}
                                :</label>
                            <span
                                class="fs-4 text-gray-800">{{ !empty($client->user->full_name) ? $client->user->full_name : 'N/A' }}</span>
                        </div>
                        <div class="col-sm-6 d-flex flex-column mb-md-10 mb-5">
                            <label for="name" class="pb-2 fs-4 text-gray-600">{{ __('messages.user.email') }}
                                :</label>
                            <span
                                class="fs-4 text-gray-800">{{ !empty($client->user->email) ? $client->user->email : 'N/A' }}</span>
                        </div>
                        <div class="col-sm-6 d-flex flex-column mb-md-10 mb-5">
                            <label for="name" class="pb-2 fs-4 text-gray-600">{{ __('messages.client.dob') }}
                                :</label>
                            <span
                                class="fs-4 text-gray-800">{{ !empty($client->user->date_of_birth) ? $client->user->date_of_birth : 'N/A' }}</span>
                        </div>
                        <div class="col-sm-6 d-flex flex-column mb-md-10 mb-5">
                            <label for="name" class="pb-2 fs-4 text-gray-600">{{ __('messages.client.country') }}
                                :</label>
                            <span
                                class="fs-4 text-gray-800">{{ !empty($client->user->region ) ? $client->user->region : 'N/A' }}</span>
                        </div>
                        <div class="col-sm-6 d-flex flex-column mb-md-10 mb-5">
                            <label for="name" class="pb-2 fs-4 text-gray-600">{{ __('messages.client.state') }}
                                :</label>
                            <span
                                class="fs-4 text-gray-800">{{ !empty($client->user->state) ? $client->user->state : 'N/A' }}</span>
                        </div>
                        <div class="col-sm-6 d-flex flex-column mb-md-10 mb-5">
                            <label for="name" class="pb-2 fs-4 text-gray-600">{{ __('messages.client.address') }}
                                :</label>
                            <span
                                class="fs-4 text-gray-800">{{ !empty($client->user->address) ? $client->user->address : 'N/A' }}</span>
                        </div>
                        <div class="col-sm-6 d-flex flex-column mb-md-10 mb-5">
                            <label for="name" class="pb-2 fs-4 text-gray-600">{{ __('messages.client.note') }}
                                :</label>
                            <span class="fs-4 text-gray-800">{{ !empty($client->user->zip_code) ? $client->user->zip_code : 'N/A' }}</span>
                        </div>
                        <div class="col-sm-6 d-flex flex-column mb-md-10 mb-5">
                            <label for="name" class="pb-2 fs-4 text-gray-600">{{ __('messages.client.practice') }}
                                :</label>
                            <span class="fs-4 text-gray-800">{{ !empty($client->user->practice) ? $client->user->practice : 'N/A' }}</span>
                        </div>
                        <div class="col-sm-6 d-flex flex-column mb-md-10 mb-5">
                            <label for="name"
                                class="pb-2 fs-4 text-gray-600">{{ __('messages.client.practice_number') }}
                                :</label>
                            <span
                                class="fs-4 text-gray-800">{{ !empty($client->user->practice_number) ? $client->user->practice_number : 'N/A' }}</span>
                        </div>
                        <div class="col-sm-6 d-flex flex-column mb-md-10 mb-5">
                            <label for="name" class="pb-2 fs-4 text-gray-600">{{ __('messages.client.authorization_number') }}
                                :</label>
                            <span
                                class="fs-4 text-gray-800">{{ !empty($client->user->authorization_number ) ? $client->user->authorization_number : 'N/A' }}</span>
                        </div>

                        <div class="col-sm-6 d-flex flex-column mb-md-10 mb-5">
                            <label for="name"
                                class="pb-2 fs-4 text-gray-600">{{ __('messages.client.registration_number') }}
                                :</label>
                            <span
                                class="fs-4 text-gray-800">{{ !empty($client->user->registration_number) ? $client->user->registration_number : 'N/A' }}</span>
                        </div>
                        <div class="col-sm-6 d-flex flex-column mb-md-10 mb-5">
                            <label for="name" class="pb-2 fs-4 text-gray-600">{{ __('messages.client.license_number') }}
                                :</label>
                            <span
                                class="fs-4 text-gray-800">{{ !empty($client->user->license_number ) ? $client->user->license_number : 'N/A' }}</span>
                        </div>

                         <div class="col-sm-6 d-flex flex-column mb-md-10 mb-5">
                            <label for="name"
                                class="pb-2 fs-4 text-gray-600">{{ __('messages.client.occupation') }}
                                :</label>
                            <span
                                class="fs-4 text-gray-800">{{ !empty($client->user->occupation) ? $client->user->occupation : 'N/A' }}</span>
                        </div>
                        <div class="col-sm-6 d-flex flex-column mb-md-10 mb-5">
                            <label for="name" class="pb-2 fs-4 text-gray-600">{{ __('messages.client.employer_letter') }}
                                :</label>
                                @if ($client->user->employer_letter)
                                     <a class="fs-4 text-green-400" href="{{ $client->user->employer_letter }}" target="_blank" download>View Letter</a>
                                @else
                                    <span class="fs-4 text-gray-800">{{ !empty($client->user->employer_letter ) ? $client->user->employer_letter : 'N/A' }}</span>
                                @endif

                        </div>

                        <div class="col-sm-6 d-flex flex-column mb-sm-0 mb-5">
                            <label for="name"
                                class="pb-2 fs-4 text-gray-600">{{ __('messages.common.created_at') }}
                                :</label>
                            <span
                                class="fs-4 text-gray-800">{{ !empty($client->user->created_at) ? $client->user->created_at->diffForHumans() : __('messages.common.n/a') }}</span>
                        </div>
                        @php
                            $clientUpdateTime = $client->updated_at;
                            $userUpdateTime = $client->user->updated_at;
                            $updateTime = max($clientUpdateTime, $userUpdateTime);
                        @endphp
                        <div class="col-sm-6 d-flex flex-column">
                            <label for="name"
                                class="pb-2 fs-4 text-gray-600">{{ __('messages.common.updated_at') }}
                                :</label>
                            <span
                                class="fs-4 text-gray-800">{{ !empty($client->user->updated_at) ? $updateTime->diffForHumans() : __('messages.common.n/a') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <input type="hidden" name="active-tab" id="clientActiveTab" value="{{ $activeTab }}">
        <div class="tab-pane fade" id="invoices" role="tabpanel" aria-labelledby="invoices-tab">
            @include('clients.invoice.index')
        </div>
        <div class="tab-pane fade" id="quotes" role="tabpanel" aria-labelledby="quotes-tab">
            @include('clients.quote.index')
        </div>
    </div>
</div>
