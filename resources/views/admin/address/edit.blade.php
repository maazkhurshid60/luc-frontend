
<form method="POST" id="updateForm"  enctype="multipart/form-data" onsubmit="return update_validation()">
  @method('PUT')
  @csrf
  <input type="hidden" name="id" value="{{ $data->id }}">
  <div class="alert alert-danger updateFormError" style="display: none;"></div>
    <div class=" row">

      <div class="col-md-12 form-group">
        <label >City</label>
        <input type="text" class="form-control form-control-sm" value="{{ $data->city }}" name="city">
      </div>

      <div class="col-md-12 form-group">
        <label >Email</label>
        <input type="text" class="form-control form-control-sm"  name="email" value="{{ $data->email }}">
      </div>
      <div class="col-md-12 form-group">
        <label >Phone</label>
        <input type="text" class="form-control form-control-sm"  name="phone" value="{{ $data->phone }}">
      </div>
            
      <div class="col-md-12 form-group">
        <label >Address</label>
        <textarea name="address"  class="form-control form-control-sm">{{ $data->address }}</textarea>
      </div>
      <div class="col-md-12 form-group">
        <label >Map Link</label>
        <textarea name="map" class="form-control form-control-sm">{{ $data->map }}</textarea>
      </div>
    </div>
    <button type="submit" class="btn btn-primary waves-effect text-left btn-sm float-right" >Save Data</button>
</form>
