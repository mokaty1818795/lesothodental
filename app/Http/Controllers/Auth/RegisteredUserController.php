<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Education;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @return Application|RedirectResponse|Redirector
     */

    public static function generateRententionNumber(): string
    {

    }
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'region' => 'required|string|max:255',
            'date_of_birth' => 'required|string|max:255',
            'practice' => 'required|string|max:255',
            'practice_number' => 'nullable|string|max:255',
            'address' => 'required|string|max:255',
            'zip_code' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'authorization_number' => 'nullable|string|max:255',
            'facility_name' => 'nullable|string|max:255',
            'employer_letter' => 'nullable',
            'registration_number' => 'nullable|string|max:255',
            'license_number' => 'nullable|string|max:255',
            'occupation' => 'nullable|string|max:255',
            'gender' => 'nullable|string|max:255',
            'tittle' => 'nullable|string|max:255',
            'town' => 'nullable|string|max:255',
            'catergory' => 'nullable|string|max:255',
            'institude' => 'required|string|max:255',
            'course' => 'required|string|max:255',
            'attended_from' => 'nullable|string|max:255',
            'attended_to' => 'nullable|string|max:255',
            'degree_date' => 'nullable|string|max:255',
            'specialization' => 'nullable|string|max:255',
            'telephone' => 'nullable|string|max:255',
            'fax' => 'nullable|string|max:255',
            'certificate' => 'nullable',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'retention_number' => 'nullable|string|max:255',

        ]);

        $retenTionNumber = $request->retention_number;
        if (empty($retenTionNumber)) {
            $randomPrefix = strtoupper(substr(bin2hex(random_bytes(1)), 0, 1));
            $now = now();
            $year = $now->format('Y');
            $randomSequence = random_int(0, 9999);
            $formattedSequence = str_pad($randomSequence, 4, '0', STR_PAD_LEFT);
            $retenTionNumber = "{$randomPrefix} {$formattedSequence}/{$year}";

        }

        /** @var User $user */
        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'region' => $request->region,
            'date_of_birth' => $request->date_of_birth,
            'practice' => $request->practice,
            'practice_number' => $request->practice_number,
            'address' => $request->address,
            'zip_code' => $request->zip_code,
            'state' => $request->state,
            'authorization_number' => $request->authorization_number,
            'facility_name' => $request->facility_name,
            'employer_letter' => $request->employer_letter,
            'registration_number' => $request->registration_number,
            'license_number' => $request->license_number,
            'occupation' => $request->occupation,
            'gender' => $request->gender,
            'tittle' => $request->tittle,
            'town' => $request->town,
            'catergory' => $request->catergory,
            'retention_number' => $retenTionNumber,
        ]);

        if ((!empty($request->employer_letter))) {
            $fileItem = $user->addMedia($request->employer_letter)->toMediaCollection(User::LETTER_OF_EMPLOYMENT, config('app.media_disc'));
            $fileUrl = $fileItem->getUrl();
            $user->employer_letter = $fileUrl;
            $user->save();
        }

        $user->assignRole('client');

        $client = Client::create([
            'user_id' => $user->id,
        ]);
        event(new Registered($user));

        $userEducation = Education::create([
            'user_id' => $user->id,
            'institude' => $request->institude,
            'course' => $request->course,
            'attended_from' => $request->attended_from,
            'attended_to' => $request->attended_to,
            'degree_date' => $request->degree_date,
            'specialization' => $request->specialization,
            'telephone' => $request->telephone,
            'fax' => $request->fax,
            'certificate' => $request->certificate,
        ]);

        if ((!empty($request->certificate))) {
            $fileItem = $userEducation->addMedia($request->certificate)->toMediaCollection(Education::UNIVERSITY_CERTIFICATE, config('app.media_disc'));
            $fileUrl = $fileItem->getUrl();
            $userEducation->certificate = $fileUrl;
            $userEducation->save();
        }

        Auth::login($user);
        return redirect(RouteServiceProvider::CLIENT_HOME);
    }
}
