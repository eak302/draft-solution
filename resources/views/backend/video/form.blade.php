<div class="form-group {{ $errors->has('video_name') ? 'has-error' : ''}}">
    <label for="video_name" class="control-label">{{ 'Video Name' }}</label>
    <input class="form-control" name="video_name" type="text" id="video_name" value="{{ $video->video_name or ''}}" >
    {!! $errors->first('video_name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('video_url') ? 'has-error' : ''}}">
    <label for="video_url" class="control-label">{{ 'Video Url' }}</label>
    <input class="form-control" name="video_url" type="text" id="video_url" value="{{ $video->video_url or ''}}" >
    {!! $errors->first('video_url', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
