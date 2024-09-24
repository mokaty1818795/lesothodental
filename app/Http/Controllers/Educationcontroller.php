<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEducationRequest;
use App\Http\Requests\UpdateEducationRequest;
use App\Models\Education;
use Illuminate\Http\RedirectResponse;
use Laracasts\Flash\Flash;

class Educationcontroller extends Controller
{
    public function index()
    {
        return view('education.index');
    }
    public function create()
    {
        return view('education.create');
    }
    public function store(CreateEducationRequest $request): RedirectResponse
{
    // Check the count of existing education records for the authenticated user
    $educationCount = Education::where('user_id', auth()->user()->id)->count();

    // If the user already has 3 education records, return an error message
    if ($educationCount >= 3) {
        Flash::error(__('messages.flash.max_education_limit')); // Adjust the message in your language file
        return redirect()->route('education.create')->withInput();
    }

    try {
        $userEducation = Education::create([
            'user_id' => auth()->user()->id,
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

        Flash::success(__('messages.flash.education_created_successfully'));
        return redirect(route('client.education'));
    } catch (Exception $exception) {
        Flash::error($exception->getMessage());
        return redirect()->route('client.education')->withInput();
    }
}

    public function show(Education $education)
    {

        $education = Education::find($education->id);

        // if (empty($education)) {
        //     Flash::error(__('messages.flash.education_not_found'));

        //     return redirect(route('education.index'));
        // }

        return view('education.show')->with('education', $education);

    }
    // public function edit($id)
    // {
    //     $education = $this->educationRepository->find($id);

    //     if (empty($education)) {
    //         Flash::error(__('messages.flash.education_not_found'));

    //         return redirect(route('education.index'));
    //     }

    //     return view('education.edit')->with('education', $education);
    // }
    public function update($id, UpdateEducationRequest $request): RedirectResponse
    {
        // Find the education record using the Education model
        $education = Education::find($id);

        if (empty($education)) {
            Flash::error(__('messages.flash.education_not_found'));

            return redirect(route('education.index'));
        }

        // Update the education record with the request data
        $education->update($request->all());

        if ((!empty($request->certificate))) {
            $fileItem = $education->addMedia($request->certificate)->toMediaCollection(Education::UNIVERSITY_CERTIFICATE, config('app.media_disc'));
            $fileUrl = $fileItem->getUrl();
            $education->certificate = $fileUrl;
            $education->save();
        }

        Flash::success(__('messages.flash.education_updated_successfully'));

        return redirect(route('client.education.edit', $id));
    }
    public function destroy($id):RedirectResponse
    {
        
        $education = Education::find($id);

        if (empty($education)) {
            Flash::error(__('messages.flash.education_not_found'));

            return redirect(route('education.index'));
        }

        $education->delete();

        Flash::success(__('messages.flash.education_deleted_successfully'));

        return redirect(route('education.index'));

    }
}
