<div class="form-group {{ $errors->has('video_name') ? 'has-error' : ''}}">
    <label for="video_name" class="control-label">{{ 'Video Name' }}</label>
    <input class="form-control" name="video_name" type="text" id="video_name" value="{{ $video->video_name or ''}}" >
    {!! $errors->first('video_name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('video_type') ? 'has-error' : ''}}">
    <label for="video_type" class="control-label">{{ 'Type' }}</label>
    <select class="form-control" id="video_type">
        <option>file</option>
        <option>url</option>
    </select>
    {!! $errors->first('video', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('video_file') ? 'has-error' : ''}}">
    <label for="video_file" class="control-label">{{ 'Video File' }}</label>
    <input class="form-control" name="video_file" type="file" id="video_file" value="{{ $video->video_file or ''}}" >
    {!! $errors->first('video_file', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('video_url') ? 'has-error' : ''}}">
    <label for="video_url" class="control-label">{{ 'Video Url' }}</label>
    <input class="form-control" name="video_url" type="text" id="video_url" value="{{ $video->video_url or ''}}" >
    {!! $errors->first('video_url', '<p class="help-block">:message</p>') !!}
</div>




<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>