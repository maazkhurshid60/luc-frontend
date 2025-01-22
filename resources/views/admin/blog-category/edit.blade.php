<form method="POST" id="updateForm" enctype="multipart/form-data" onsubmit="return update_validation()">
    @method('PUT')
    @csrf
    <input type="hidden" name="id" value="{{ $data->id }}">
    <input type="hidden" name="lang" value="{{ $lang }}">
    <div class="alert alert-danger updateFormError" style="display: none;"></div>
    <div class=" row">
        <div class="col-md-12 form-group">
            <label>Title</label>
            <input type="text" class="form-control form-control-sm" value="{{ $data->title }}" name="title">
        </div>

    </div>
    <button type="submit" class="btn btn-primary waves-effect text-left btn-sm float-right">Save Data</button>
</form>


