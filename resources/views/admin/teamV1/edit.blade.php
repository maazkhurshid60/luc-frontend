
  <form method="POST" id="updateForm"  enctype="multipart/form-data" onsubmit="return update_validation()">
    @method('PUT')
    @csrf
    <input type="hidden" name="id" value="{{ $data->id }}">
    <div class="alert alert-danger updateFormError" style="display: none;"></div>
      <div class=" row">
     
          <div class="col-md-4 form-group">
            <label >Name</label>
            <input type="text" class="form-control form-control-sm" value="{{ $data->name }}"  name="name">
          </div>
          <div class="col-md-4 form-group">
              <label >Designation</label>
              <input type="text" class="form-control form-control-sm" value="{{ $data->designation }}"  name="designation">
          </div>
          <div class="col-md-12 form-group">
            <label >Description</label>
            <textarea name="reviews" id=""  class="form-control form-control-sm">{{ $data->reviews }}</textarea>
          </div>
          <div class="col-md-4">
              <label>{{ __('Image') }}</label>
              <input type="file" name="file"  id="filez2" data-default-file="{{ asset('storage/images/'.$data->image) }}"  class="filez2" data-max-file-size="1M" data-allowed-file-extensions="jpeg png jpg gif svg webp">
          </div>
          <div class="col-md-4">
            <label for="">Status</label>
            <select name="status" class="form-control form-control-sm">
                <option value="active" @if ($data->status == 'active')
                     selected 
                @endif>Active</option>
                <option value="in-active" @if ($data->status == 'in-active')
                    selected
                @endif>In-active</option>
            </select>
        </div>
      </div>
        <button type="submit" class="btn btn-primary waves-effect text-left btn-sm float-right" >Save Data</button>
      </form>
<script>
    $("#filez2").dropify();
</script>