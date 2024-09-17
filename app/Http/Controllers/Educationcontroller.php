<?php

namespace App\Http\Controllers;

use App\Models\Education;

class Educationcontroller extends Controller

{
    public function index()
    {
        return view('education.index');
    }
    // public function create()
    // {
    //     $countries = $this->educationRepository->getData();

    //     return view('education.create', compact('countries'));
    // }
    // public function store(CreateEducationRequest $request): RedirectResponse
    // {
    //     $input = $request->all();
    //     try {
    //         $this->educationRepository->store($input);
    //         Flash::success(__('messages.flash.education_created_successfully'));
    //     } catch (Exception $exception) {
    //         Flash::error($exception->getMessage());

    //         return redirect()->route('education.create')->withInput();
    //     }
    // }
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
    // public function update($id, UpdateEducationRequest $request): RedirectResponse
    // {
    //     $education = $this->educationRepository->find($id);

    //     if (empty($education)) {
    //         Flash::error(__('messages.flash.education_not_found'));

    //         return redirect(route('education.index'));
    //     }

    //     $education = $this->educationRepository->update($request->all(), $id);

    //     Flash::success(__('messages.flash.education_updated_successfully'));

    //     return redirect(route('education.index'));
    // }
    // public function destroy($id): JsonResponse
    // {
    //     $education = $this->educationRepository->find($id);

    //     if (empty($education)) {
    //         return $this->sendError(__('messages.flash.education_not_found'));
    //     }

    //     $this->educationRepository->delete($id);

    //     return $this->sendSuccess(__('messages.flash.education_deleted_successfully'));
    // }
}
