
<form method="POST" id="updateForm"  enctype="multipart/form-data" onsubmit="return update_validation()">
  @method('PUT')
  @csrf
  <input type="hidden" name="id" value="{{ $data->id }}">
  <input type="hidden" name="lang" value="{{ $lang }}">
  <div class="alert alert-danger updateFormError" style="display: none;"></div>
    <div class=" row">
     <div class="col-md-12 form-group">
        <label >Question <span class="text-danger">*</span></label>
        <input type="text" class="form-control form-control-sm" value="{{ $data->question }}"  name="question">
      </div>
       <div class="col-md-12 form-group">
        <label >Answer <span class="text-danger">*</span></label>
        <textarea name="answer" id=""  class="form-control form-control-sm">{{ $data->answer }}</textarea>
      </div>
      <div class="col-md-8">
        <label>Select Category <span class="text-danger">*</span></label>
        <select name="category_id" class="form-control form-control-sm">
          {{ App\Helpers\Helper::getOptions([
            'table' => 'faq_categories',
            'key' => 'id',
            'value' => 'title',
            'select'  => $data->category_id
            ]) }}
        </select>
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

    <button type="submit" class="my-2 btn btn-primary waves-effect text-left btn-sm float-right" >Save Data</button>
</form>
