<form method="POST" id="updateForm" enctype="multipart/form-data" onsubmit="return update_validation()">
    @method('PUT')
    @csrf
    <input type="hidden" name="id" value="{{ $data->id }}">
    <div class="alert alert-danger updateFormError" style="display: none;"></div>
    <div class=" row">
        <div class="col-md-12 form-group">
            <label>Title</label>
            <input type="text" class="form-control form-control-sm" value="{{ $data->title }}" name="title">
        </div>

        <div class="col-md-4">
            <label>{{ __('Image') }}</label>
            <input type="file" name="file" id="filez1" class="filez1" data-max-file-size="1M"
                data-allowed-file-extensions="jpeg png jpg gif svg webp"
                data-default-file="{{ asset('storage/images/' . $data->image) }}">
            <small class="text-muted">Use an Image with an aspect ratio of 1:1 or dimentions of 290px x 290px</small>
        </div>

        <div class="col-md-4">
            <label>{{ __('Icon') }}</label>
            <input type="file" name="icon_file" class="filez1" data-max-file-size="1M"
                data-allowed-file-extensions="jpeg png jpg gif svg webp"
                data-default-file="{{ asset('storage/images/' . $data->icon) }}">
        </div>

    </div>
    <button type="submit" class="btn btn-primary waves-effect text-left btn-sm float-right">Save Data</button>
</form>

<Script>
    $(".filez1").dropify();
</Script>
