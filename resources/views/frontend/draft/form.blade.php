<div class="form-group {{ $errors->has('water_need_qty') ? 'has-error' : ''}}">
    <label for="water_need_qty" class="control-label">{{ 'Water Need Qty' }}</label>
    <input class="form-control" name="water_need_qty" type="number" id="water_need_qty" value="{{ $draft->water_need_qty or ''}}" >
    {!! $errors->first('water_need_qty', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('purpose') ? 'has-error' : ''}}">
    <label for="purpose" class="control-label">{{ 'Purpose' }}</label>
    <input class="form-control" name="purpose" type="text" id="purpose" value="{{ $draft->purpose or ''}}" >
    {!! $errors->first('purpose', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('budget') ? 'has-error' : ''}}">
    <label for="budget" class="control-label">{{ 'Budget' }}</label>
    <input class="form-control" name="budget" type="number" id="budget" value="{{ $draft->budget or ''}}" >
    {!! $errors->first('budget', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('start_date') ? 'has-error' : ''}}">
    <label for="start_date" class="control-label">{{ 'Start Date' }}</label>
    <input class="form-control" name="start_date" type="datetime-local" id="start_date" value="{{ $draft->start_date or ''}}" >
    {!! $errors->first('start_date', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('service_duration') ? 'has-error' : ''}}">
    <label for="service_duration" class="control-label">{{ 'Service Duration' }}</label>
    <input class="form-control" name="service_duration" type="text" id="service_duration" value="{{ $draft->service_duration or ''}}" >
    {!! $errors->first('service_duration', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('pipe_size') ? 'has-error' : ''}}">
    <label for="pipe_size" class="control-label">{{ 'Pipe Size' }}</label>
    <input class="form-control" name="pipe_size" type="number" id="pipe_size" value="{{ $draft->pipe_size or ''}}" >
    {!! $errors->first('pipe_size', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('pipe_setup_price') ? 'has-error' : ''}}">
    <label for="pipe_setup_price" class="control-label">{{ 'Pipe Setup Price' }}</label>
    <input class="form-control" name="pipe_setup_price" type="number" id="pipe_setup_price" value="{{ $draft->pipe_setup_price or ''}}" >
    {!! $errors->first('pipe_setup_price', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('technology') ? 'has-error' : ''}}">
    <label for="technology" class="control-label">{{ 'Technology' }}</label>
    <input class="form-control" name="technology" type="text" id="technology" value="{{ $draft->technology or ''}}" >
    {!! $errors->first('technology', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('sale_name') ? 'has-error' : ''}}">
    <label for="sale_name" class="control-label">{{ 'Sale Name' }}</label>
    <input class="form-control" name="sale_name" type="text" id="sale_name" value="{{ $draft->sale_name or ''}}" >
    {!! $errors->first('sale_name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('company') ? 'has-error' : ''}}">
    <label for="company" class="control-label">{{ 'Company' }}</label>
    <input class="form-control" name="company" type="text" id="company" value="{{ $draft->company or ''}}" >
    {!! $errors->first('company', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('other') ? 'has-error' : ''}}">
    <label for="other" class="control-label">{{ 'Other' }}</label>
    <input class="form-control" name="other" type="text" id="other" value="{{ $draft->other or ''}}" >
    {!! $errors->first('other', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
