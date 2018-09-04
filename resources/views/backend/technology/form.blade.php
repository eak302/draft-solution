<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ 'Name' }}</label>
    <input class="form-control" name="name" type="text" id="name" value="{{ $technology->name or ''}}" >
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('picture') ? 'has-error' : ''}}">
    <label for="picture" class="control-label">{{ 'Picture' }}</label>
    <input class="form-control" name="picture" type="text" id="picture" value="{{ $technology->picture or ''}}" >
    {!! $errors->first('picture', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('video') ? 'has-error' : ''}}">
    <label for="video" class="control-label">{{ 'Video' }}</label>
    <input class="form-control" name="video" type="text" id="video" value="{{ $technology->video or ''}}" >
    {!! $errors->first('video', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('equipment') ? 'has-error' : ''}}">
    <label for="equipment" class="control-label">{{ 'Equipment' }}</label>
    <input class="form-control" name="equipment" type="text" id="equipment" value="{{ $technology->equipment or ''}}" >
    {!! $errors->first('equipment', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('service') ? 'has-error' : ''}}">
    <label for="service" class="control-label">{{ 'Service' }}</label>
    <select name="service" id="service" class="form-control">
        @foreach ($service as $item)
            <option value="{{ $item->id }}">{{ $item->name }}</option>
        @endforeach
    </select>
    {!! $errors->first('service', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
