<div class="row gx-10 mb-5">
    <div class="col-lg-4 col-sm-12 mb-5">
        <div class="mb-5">
            {{ Form::label('institude', __('Institude').':', ['class' => 'form-label required mb-3']) }}
            {{ Form::text('institude', null, ['class' => 'form-control form-control-solid', 'placeholder' => __('Institude'), 'required']) }}
        </div>
    </div>

    <div class="col-lg-4 col-sm-12 mb-5">
        <div class="mb-5">
            {{ Form::label('course', __('Course').':', ['class' => 'form-label required mb-3']) }}
            {{ Form::text('course',  null, ['class' => 'form-control form-control-solid', 'placeholder' => __('Course'), 'required']) }}
        </div>
    </div>

    <div class="col-lg-4 col-sm-12 mb-5">
        <div class="mb-5">
            {{ Form::label('attended_from', __('Attended from').':', ['class' => 'form-label required mb-3']) }}
            {{ Form::date('attended_from',  null, ['class' => 'form-control form-control-solid', 'placeholder' => __('Attended from'), 'required']) }}
        </div>
    </div>

    <div class="col-lg-4 col-sm-12 mb-5">
        <div class="mb-5">
            {{ Form::label('attended_to', __('Attended to').':', ['class' => 'form-label required mb-3']) }}
            {{ Form::date('attended_to',null, ['class' => 'form-control form-control-solid', 'placeholder' => __('Attended to'), 'required']) }}
        </div>
    </div>

    <div class="col-lg-4 col-sm-12 mb-5">
        <div class="mb-5">
            {{ Form::label('degree_date', __('Degree date').':', ['class' => 'form-label required mb-3']) }}
            {{ Form::date('degree_date',  null, ['class' => 'form-control form-control-solid', 'placeholder' => __('Degree date'), 'required']) }}
        </div>
    </div>

    <div class="col-lg-4 col-sm-12 mb-5">
        <div class="mb-5">
            {{ Form::label('specialization', __('Specialization').':', ['class' => 'form-label required mb-3']) }}
            {{ Form::text('specialization', null, ['class' => 'form-control form-control-solid', 'placeholder' => __('Specialization'), 'required']) }}
        </div>
    </div>

    <div class="col-lg-4 col-sm-12 mb-5">
        <div class="mb-5">
            {{ Form::label('telephone', __('Telephone').':', ['class' => 'form-label required mb-3']) }}
            {{ Form::text('telephone',  null, ['class' => 'form-control form-control-solid', 'placeholder' => __('Telephone'), 'required']) }}
        </div>
    </div>

    <div class="col-lg-4 col-sm-12 mb-5">
        <div class="mb-5">
            {{ Form::label('fax', __('Fax').':', ['class' => 'form-label required mb-3']) }}
            {{ Form::text('fax', null, ['class' => 'form-control form-control-solid', 'placeholder' => __('Fax'), 'required']) }}
        </div>
    </div>

    <div class="col-lg-4 col-sm-12 mb-5">
        <!-- <div class="mb-5">
            {{ Form::label('file', __('Certificate').':', ['class' => 'form-label  mb-3']) }}
            {{ Form::file('file', ['class' => 'form-control form-control-solid', 'placeholder' => __('certificate'), ]) }}
        </div> -->
         <div class="mb-5">
            {{ Form::label('certificate', __('Certificate') . ':', ['class' => 'form-label mb-3']) }}
            <input
            name="certificate"
            value="{{ old('certificate') }}"
            class="form-control"
            type="file"
            id="certificate"
            >
            <!-- {{ Form::file('employer_letter', isset($user) ? $user->employer_letter : null, ['class' => 'form-control form-control-solid', 'placeholder' => __('messages.client.employer_letter')]) }} -->
        </div>
    </div>
</div>

<div class="d-flex justify-content-end mt-5">
    {{ Form::submit(__('messages.common.submit'),['class' => 'btn btn-primary me-3']) }}
    <a href="{{ route('client.education') }}" type="reset" class="btn btn-secondary btn-active-light-primary">
        {{ __('messages.common.discard') }}
    </a>
</div>
