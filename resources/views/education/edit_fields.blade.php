<div class="row gx-10 mb-5">
    <div class="col-lg-4 col-sm-12 mb-5">
        <div class="mb-5">
            {{ Form::label('institude', __('Institude').':', ['class' => 'form-label required mb-3']) }}
            {{ Form::text('institude', isset($education) ? $education->institude : null, ['class' => 'form-control form-control-solid', 'placeholder' => __('Institude'), 'required']) }}
        </div>
    </div>
    <div class="col-lg-4 col-sm-12 mb-5">
        <div class="mb-5">
            {{ Form::label('course', __('Course').':', ['class' => 'form-label required mb-3']) }}
            {{ Form::text('course',"Sello", ['class' => 'form-control form-control-solid', 'placeholder' => __('Course'), 'required']) }}
        </div>
    </div>
    <div class="col-lg-4 col-sm-12 mb-5">
        <div class="mb-5">
            {{ Form::label('attended_from', __('Attended from').':', ['class' => 'form-label required mb-3']) }}
            {{ Form::date('attended_from',"Thabo", ['class' => 'form-control form-control-solid', 'placeholder' => __('Attended from'), 'required']) }}
        </div>
    </div>
     <div class="col-lg-4 col-sm-12 mb-5">
        <div class="mb-5">
            {{ Form::label('attended_to', __('Attended to').':', ['class' => 'form-label required mb-3']) }}
            {{ Form::date('attended_to',"Thabo", ['class' => 'form-control form-control-solid', 'placeholder' => __('Attended to'), 'required']) }}
        </div>
    </div>
    <div class="col-lg-4 col-sm-12 mb-5">
        <div class="mb-5">
            {{ Form::label('degree_date', __('Degree date"').':', ['class' => 'form-label required mb-3']) }}
            {{ Form::date('degree_date',"Sello", ['class' => 'form-control form-control-solid', 'placeholder' => __('Degree date"'), 'required']) }}
        </div>
    </div>
    <div class="col-lg-4 col-sm-12 mb-5">
        <div class="mb-5">
            {{ Form::label('specialization', __('Specialization').':', ['class' => 'form-label required mb-3']) }}
            {{ Form::email('specialization',"Medicine", ['class' => 'form-control form-control-solid', 'placeholder' => __('Specialization'), 'required']) }}
        </div>
    </div>
     <div class="col-lg-4 col-sm-12 mb-5">
        <div class="mb-5">
            {{ Form::label('telephone', __('Telephone').':', ['class' => 'form-label required mb-3']) }}
            {{ Form::text('telephone',"22351290", ['class' => 'form-control form-control-solid', 'placeholder' => __('Telephone'), 'required']) }}
        </div>
    </div>
    <div class="col-lg-4 col-sm-12 mb-5">
        <div class="mb-5">
            {{ Form::label('fax', __('Fax').':', ['class' => 'form-label required mb-3']) }}
            {{ Form::text('fax',"+266 63809823", ['class' => 'form-control form-control-solid', 'placeholder' => __('Fax'), 'required']) }}
        </div>
    </div>
    <div class="col-lg-4 col-sm-12 mb-5">
        <div class="mb-5">
            {{ Form::label('file', __('Certificate').':', ['class' => 'form-label required mb-3']) }}
            {{ Form::file('file', ['class' => 'form-control form-control-solid', 'placeholder' => __('Certificate'), 'required']) }}
        </div>
    </div>
</div>

<div class="d-flex justify-content-end mt-5">
    {{ Form::submit(__('messages.common.save'),['class' => 'btn btn-primary me-3']) }}
    <a href="{{ route('client.education') }}" type="reset"
       class="btn btn-secondary btn-active-light-primary">{{__('messages.common.discard')}}</a>
</div>
