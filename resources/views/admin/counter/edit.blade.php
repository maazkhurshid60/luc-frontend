
  <form method="POST" id="updateForm"  enctype="multipart/form-data" onsubmit="return update_validation()">
    @method('PUT')
    @csrf
    <input type="hidden" name="id" value="{{ $data->id }}">

        <div class="alert alert-danger updateFormError" style="display: none;"></div>
        <div class=" row">
            <div class="col-md-6 form-group">
              <label >Title</label>
              <input type="text" class="form-control form-control-sm"  value="{{ $data->title }}" name="title">
            </div>
            <div class="col-md-6 form-group">
              <label >Count</label>
              <input type="number" class="form-control form-control-sm" value="{{ $data->count }}"  name="count">
            </div>
            <div class="col-md-6 form-group">
              <label >Icon</label>
              <input type="text" class="form-control form-control-sm" value="{{ $data->icon }}"  name="icon">
            </div>
          </div>
        <button type="submit" class="btn btn-primary waves-effect text-left btn-sm float-right" >Save Data</button>
      </form>
<script>
    $("#filez2").dropify();
    $('input[name=title_color],input[name=sub_title_color],input[name=description_color]').colorpicker();
</script>