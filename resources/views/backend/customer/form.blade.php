
<div class="form-group">
    <input type="radio" name="customer_type" id="customer-old">
    <label for="company_name" class="control-label">{{ 'ลูกค้าปัจจุบัน' }}</label>
</div>
<div id="type-old">
    <div class="form-group {{ $errors->has('customer_name') ? 'has-error' : ''}}">
        <input class="form-control" name="customer_name_ole" type="text" id="customer_name_ole" value="" >
        {!! $errors->first('customer_name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <input type="radio" name="customer_type" id="customer-new">
    <label for="company_name" class="control-label">{{ 'ลูกค้าใหม่' }}</label>
</div>
<div id="type-new">
    <div class="form-group {{ $errors->has('company_name') ? 'has-error' : ''}}">
        <label for="company_name" class="control-label">{{ 'Company Name' }}</label>
        <input class="form-control" name="company_name" type="text" id="company_name" value="{{ $customer->company_name or ''}}" >
        {!! $errors->first('company_name', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="form-group {{ $errors->has('customer_name') ? 'has-error' : ''}}">
        <label for="customer_name" class="control-label">{{ 'Customer Name' }}</label>
        <input class="form-control" name="customer_name" type="text" id="customer_name" value="{{ $customer->customer_name or ''}}" >
        {!! $errors->first('customer_name', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="form-group {{ $errors->has('location') ? 'has-error' : ''}}">
        <label for="location" class="control-label">{{ 'Location' }}</label>
        <input class="form-control" name="location" type="text" id="location" value="{{ $customer->location or ''}}" >
        {!! $errors->first('location', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'แก้ไข' : 'ตกลง' }}">
</div>
