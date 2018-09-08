<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ 'Name' }}</label>
    <input class="form-control" name="name" type="text" id="name" value="{{ $technology->name or ''}}" >
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<div class="addel">
    <div class="form-group {{ $errors->has('picture') ? 'has-error' : ''}}">
        <label for="picture" class="control-label">{{ 'Picture' }}</label>
        {{-- <input class="form-control" name="picture" type="file" id="picture" value="{{ $technology->picture or ''}}" > --}}
        <div class="input-group target" style="margin-bottom: 10px;">
            <input type="file" name="picture[]" class="form-control" accept="image/*">
                <span class="input-group-btn">
                <button type="button" class="btn btn-danger addel-delete"><i class="fa fa-remove"></i></button>
            </span>
        </div>
        <button type="button" class="btn btn-success btn-block addel-add"><i class="fa fa-plus"></i></button>
        {!! $errors->first('picture', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('video') ? 'has-error' : ''}}">
    <label for="video" class="control-label">{{ 'Video' }}</label>
    <select name="video" id="service" class="form-control">
        @foreach ($video as $item)
            <option value="{{ $item->id }}">{{ $item->video_name }}</option>
        @endforeach
    </select>
    {!! $errors->first('service', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('equipment') ? 'has-error' : ''}}">
    <label for="equipment" class="control-label">{{ 'Equipment' }}</label>
    <select name="equipment" id="equipment" class="form-control">
        @foreach ($equipment as $item)
            <option value="{{ $item->id }}">{{ $item->name }}</option>
        @endforeach
    </select>
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
<script src="https://www.jqueryscript.net/demo/Dynamic-Form-Element-Creation-And-Deletion-Plugin-Addel/addel.jquery.js"></script>
<script>
    $(document).ready(function () {
        $('.addel').addel({
            classes: {
                target: 'target'
            },
            animation: {
                duration: 100
            }
        }).on('addel:delete', function (event) {
            event.target.find(':input').val()
            // if (!window.confirm('Are you absolutely positive you would like to delete: ' + '"' + event.target.find(':input').val() + '"?')) {
            //     console.log('preventDefault()!');
            //     event.preventDefault();
            // }
        });
    });
</script>