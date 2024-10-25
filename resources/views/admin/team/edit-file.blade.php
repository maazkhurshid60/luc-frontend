<form method="POST" id="editFileForm" enctype="multipart/form-data" onsubmit="return file_update_validation()">
    @method('PUT')
    @csrf
    <input type="hidden" name="id" value="{{ $data->id }}">
    <div class="alert alert-danger editFileFormError" style="display: none;"></div>
    <div class=" row">
        <div class="col-md-6 form-group">
            <label>Title</label>
            <input type="text" class="form-control form-control-sm" value="{{ $data->title }}" name="title">
            <label>Display Order</label>
            <input type="number" name="display_order" min="1" class="form-control form-control-sm"
                value="{{ $data->display_order }}">
        </div>

        <div class="col-md-4">
            <label>{{ __('Image/File') }}</label>
            <input type="file" name="file" id="filez3" class="filez3" data-max-file-size="2M"
                data-default-file="{{ asset('storage/images/' . $data->file) }}">
        </div>
    </div>
    <div class="col-md-12">
        <button class="btn my-2 btn-sm btn-primary float-right">Save Record</button>
    </div>
    </div>
</form>
<script type="text/javascript">
    $('.filez3').dropify();
</script>
