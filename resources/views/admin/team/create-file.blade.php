<form method="POST" id="fileForm" enctype="multipart/form-data" onsubmit="return file_validation()">
    @csrf
    <input type="hidden" name="team_id" value="{{ $team_id }}">
    <div class=" row">
        <div class="col-md-6 form-group">
            <label>Title</label>
            <input type="text" class="form-control form-control-sm" name="title">
            <label>Display Order</label>
            <input type="number" name="display_order" min="1" class="form-control form-control-sm"
                value="{{ $display_order }}">
        </div>
        <div class="col-md-4">
            <label>{{ __('Image/File') }}</label>
            <input type="file" name="file" id="filez2" class="filez2" data-max-file-size="1M">
        </div>
    </div>
    <div class="col-md-12">
        <div class="alert alert-danger fileFormError" style="display: none;"></div>
        <button class="btn my-2 btn-sm btn-primary float-right">Save Record</button>
    </div>
    </div>
</form>
<script type="text/javascript">
    $('.filez2').dropify();
</script>
