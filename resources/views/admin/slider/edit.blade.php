
  <form method="POST" id="updateForm"  enctype="multipart/form-data" onsubmit="return update_validation()">
    @method('PUT')
    @csrf
    <input type="hidden" name="id" value="{{ $data->id }}">

        <div class="alert alert-danger updateFormError" style="display: none;"></div>
        <div class=" row">
            <div class="col-md-8 form-group">
              <label >Title</label>
              <input type="text" class="form-control form-control-sm" value="{{ $data->title }}"  name="title">
            </div>
            <div class="col-md-4 form-group">
                <label >Title Color</label>
                <input type="text" class="form-control form-control-sm"   value="{{ $data->title_color }}"   name="title_color">
            </div>
            <div class="col-md-8 form-group">
              <label >Sub Title</label>
              <input type="text" class="form-control form-control-sm"  value="{{ $data->sub_title }}"  name="sub_title">
            </div>
            <div class="col-md-4 form-group">
                <label >Sub Title Color</label>
                <input type="text" class="form-control form-control-sm"  value="{{ $data->sub_title_color }}"  name="sub_title_color">
            </div>
            <div class="col-md-8 form-group">
              <label >Description</label>
              <input type="text" class="form-control form-control-sm"  value="{{ $data->description }}"  name="description">
            </div>
            <div class="col-md-4 form-group">
                <label >Description Color</label>
                <input type="text" class="form-control form-control-sm"  value="{{ $data->sub_title_color }}"  name="sub_title_color">
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
    $('input[name=title_color],input[name=sub_title_color],input[name=description_color]').colorpicker();
</script>