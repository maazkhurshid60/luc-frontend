<form method="POST" id="updateForm" enctype="multipart/form-data" onsubmit="return update_validation()">
    @method('PUT')
    @csrf
    <input type="hidden" name="id" value="{{ $data->id }}">

    <div class="alert alert-danger updateFormError" style="display: none;"></div>
    <div class=" row">
        <div class="col-md-4 form-group">
            <label>Company Name</label>
            <input type="text" class="form-control form-control-sm" name="company" value="{{ $data->company }}">
        </div>
        <div class="col-md-8 form-group">
            <label>Link</label>
            <input type="text" class="form-control form-control-sm" name="link" value="{{ $data->link }}">
        </div>
        <div class="col-md-4">
            <label>{{ __('Logo') }}</label>
            <input type="file" name="file" id="filez2"
                data-default-file="{{ asset('storage/images/' . $data->logo) }}" class="filez2" data-max-file-size="1M"
                data-allowed-file-extensions="jpeg png jpg gif svg webp">
        </div>

        <div class="col-md-4">
            <label for="">Status</label>
            <select name="status" class="form-control form-control-sm">
                <option value="Active" @if ($data->status == 'Active') selected @endif>Active</option>
                <option value="Inactive" @if ($data->status == 'Inactive') selected @endif>Inactive</option>
            </select>
        </div>
        <div class="col-md-4">
            <label>Display Order <span class="text-danger">*</span></label>
            <input type="number" name="display_order" min="1" class="form-control form-control-sm"
                value="{{ $data->display_order }}">
        </div>
    </div>
    <button type="submit" class="btn btn-primary waves-effect text-left btn-sm float-right">Save Data</button>
</form>
<script>
    $("#filez2").dropify();
    $('input[name=title_color],input[name=sub_title_color],input[name=description_color]').colorpicker();
</script>
