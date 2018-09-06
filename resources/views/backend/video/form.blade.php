<div class="form-group {{ $errors->has('video_name') ? 'has-error' : ''}}">
    <label for="video_name" class="control-label">{{ 'Video Name' }}</label>
    <input class="form-control" name="video_name" type="text" id="video_name" value="{{ $video->video_name or ''}}" >
    {!! $errors->first('video_name', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group disabled">
    <input type="radio" name="video_type" id="radio-video-file" value="video_file">
    <label for="radio-video-file" class="control-label">{{ 'ไฟล์วีดีโอ' }}</label>
</div>

<div id="type_file">
    <div class="form-group {{ $errors->has('video_file') ? 'has-error' : ''}}">
        <label for="video_file" class="control-label">{{ 'Video File' }}</label>
        <input class="form-control" name="video_file" type="file" id="video_file" value="{{ $video->video_file or ''}}" disabled >
        {!! $errors->first('video_file', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <input type="radio" name="video_type" id="radio-video-url" value="video-url">
    <label for="radio-video-url" class="control-label">{{ 'ลิงค์วีดีโอ' }}</label>
</div>

<div id="type_url">
    <div class="form-group {{ $errors->has('video_url') ? 'has-error' : ''}}">
        <label for="video_url" class="control-label">{{ 'Video Url' }}</label>
        <input class="form-control" name="video_url" type="text" id="video_url" value="{{ $video->video_url or ''}}" disabled>
        {!! $errors->first('video_url', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>

<script type="text/javascript">
    $(function () {
        $("input[name='video_type']").click(function () {
            if ($(this).val() == 'video_file') {
                $("#type-file select").prop('disabled', false);
                $("#type-url input[type='text']").prop('disabled', true);
            } else {
                $("#type-file select").prop('disabled', true);
                $("#type-url input[type='text']").prop('disabled', false);
            }
        })
    })
</script>