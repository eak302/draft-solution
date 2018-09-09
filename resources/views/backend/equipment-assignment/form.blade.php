<div class="form-group {{ $errors->has('technology_name') ? 'has-error' : ''}}">
    <label for="technology_name" class="control-label">{{ 'Technology Name' }}</label>
    <input class="form-control" name="technology_name" type="text" id="technology_name" value="{{ $equipment-assignment->technology_name or ''}}" >
    {!! $errors->first('technology_name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('equipment_name') ? 'has-error' : ''}}">
    <label for="equipment_name" class="control-label">{{ 'Equipment Name' }}</label>
    <input class="form-control" name="equipment_name" type="text" id="equipment_name" value="{{ $equipment-assignment->equipment_name or ''}}" >
    {!! $errors->first('equipment_name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('equipment_picture') ? 'has-error' : ''}}">
    <label for="equipment_picture" class="control-label">{{ 'Equipment Picture' }}</label>
    <input class="form-control" name="equipment_picture" type="text" id="equipment_picture" value="{{ $equipment-assignment->equipment_picture or ''}}" >
    {!! $errors->first('equipment_picture', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('layer') ? 'has-error' : ''}}">
    <label for="layer" class="control-label">{{ 'Layer' }}</label>
    <input class="form-control" name="layer" type="text" id="layer" value="{{ $equipment-assignment->layer or ''}}" >
    {!! $errors->first('layer', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
