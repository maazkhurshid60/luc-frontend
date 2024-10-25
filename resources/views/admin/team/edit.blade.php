<form method="POST" id="updateForm" enctype="multipart/form-data" onsubmit="return update_validation()">
    @method('PUT')
    @csrf
    <input type="hidden" name="id" value="{{ $data->id }}">
    <div class="alert alert-danger updateFormError" style="display: none;"></div>
    <div class=" row">

        <div class="col-md-4 form-group">
            <label>Name</label>
            <input type="text" class="form-control form-control-sm" value="{{ $data->name }}" name="name">
        </div>
        <div class="col-md-4 form-group">
            <label>Designation</label>
            <input type="text" class="form-control form-control-sm" value="{{ $data->designation }}"
                name="designation">
        </div>

        <div class="col-md-4 form-group">
            <label>Hourly rate</label>
            <input type="text" class="form-control form-control-sm" value="{{ $data->hourly_rate }}"
                name="hourly_rate">
        </div>

        <div class="col-md-12">
            <hr>
        </div>
        <div class="col-md-4">
            <label for="pagetitle">Page Title</label>
            <input type="text" name="page_title" id="page_title" maxlength="80" value="{{ $data->page_title }}"
                class="form-control form-control-sm">
            <p style="color: red; font-size: 12px">Char Count: <span
                    id="charCount">{{ strlen($data->page_title) }}</span>/80</p>
        </div>

        <div class="col-md-4">
            <label for="meta_keywords">Meta Keywords</label>
            <input type="text" name="meta_keywords" id="meta_keywords" maxlength="80"
                value="{{ $data->meta_keywords }}" class="form-control form-control-sm">
            <p style="color: red; font-size: 12px">Char Count: <span
                    id="keywordsCharCount">{{ strlen($data->meta_keywords) }}</span>/80</p>
        </div>

        <div class="col-md-4 form-group">
            <label for="meta_description">Meta Description</label>
            <input type="text" name="meta_description" id="meta_description" maxlength="180"
                value="{{ $data->meta_description }}" class="form-control form-control-sm">
            <p style="color: red; font-size: 12px">Char Count: <span
                    id="descriptionCharCount">{{ strlen($data->meta_description) }}</span>/180</p>
        </div>
        <div class="col-md-4">
            <label for="og_title">OG Title</label>
            <input type="text" name="og_title" id="og_title" value="{{ $data->og_title }}"
                class="form-control form-control-sm">
        </div>
        <div class="col-md-4">
            <label for="og_description">OG Description</label>
            <input type="text" name="og_description" id="og_description" value="{{ $data->og_description }}"
                class="form-control form-control-sm">
        </div>
        <div class="col-md-4 form-group">
            <label for="og_type">OG Type</label>
            <input type="text" name="og_type" id="og_type" value="{{ $data->og_type }}"
                class="form-control form-control-sm">
        </div>
        <div class="col-md-12 my-2">
            <textarea id="editor2" cols="30" rows="10">@php
                echo $data->details;
            @endphp</textarea>
        </div>
        <div class="col-md-12 form-group">
            <label>Description</label>
            <textarea name="description" id="" class="form-control form-control-sm">{{ $data->description }}</textarea>
        </div>
        <div class="col-md-6 form-group">
            <label>Facebook</label>
            <input type="text" value="{{ $data->facebook }}" class="form-control form-control-sm" name="facebook">
        </div>
        <div class="col-md-6 form-group">
            <label>Twitter</label>
            <input type="text" value="{{ $data->twitter }}" class="form-control form-control-sm" name="twitter">
        </div>
        <div class="col-md-6 form-group">
            <label>Instagram</label>
            <input type="text" value="{{ $data->instagram }}" class="form-control form-control-sm" name="instagram">
        </div>
        <div class="col-md-6 form-group">
            <label>Email</label>
            <input type="email" value="{{ $data->mail }}" class="form-control form-control-sm" name="mail">
        </div>
        <div class="col-md-6 form-group">
            <label for="status">Consultation link</label>
            <input name="consultation_link" class="form-control form-control-sm"
                value="{{ $data->consultation_link }}">
        </div>
        <div class="col-md-6 form-group">

        </div>
        <div class="col-md-4">
            <label>{{ __('Image') }}</label>
            <input type="file" name="file" id="filez2"
                data-default-file="{{ asset('storage/images/' . $data->image) }}" class="filez2"
                data-max-file-size="1M" data-allowed-file-extensions="jpeg png jpg gif svg webp">
        </div>
        <div class="col-md-4">
            <label for="">Status</label>
            <select name="status" class="form-control form-control-sm">
                <option value="active" @if ($data->status == 'active') selected @endif>Active</option>
                <option value="in-active" @if ($data->status == 'in-active') selected @endif>In-active</option>
            </select>
            <br>
            <label for="status">Enable Fix</label>
            <select name="enable_fix" class="form-control form-control-sm">
                <option value="0" @if ($data->enable_fix == '0') selected @endif> Disable</option>
                <option value="1" @if ($data->enable_fix == '1') selected @endif>Enable</option>
            </select>

        </div>
        <div class="col-md-4">
            <label>Display Order</label>
            <input type="number" name="display_order" min="1" value="{{ $data->display_order }}"
                class="form-control form-control-sm">
            <br>
            <label>Success Rate</label>
            <input type="number" name="success_rate" class="form-control form-control-sm"
                value="{{ $data->success_rate }}">
        </div>
        <div class="col-md-4">
            <label>{{ __('OG Image') }}</label>
            <input type="file" name="file4" id="filez4"
                data-default-file="{{ asset('storage/images/' . $data->og_image) }}" class="filez4"
                data-max-file-size="1M" data-allowed-file-extensions="jpeg png jpg gif svg webp">
        </div>
        <div class="col-md-8">
            <label>Short Designation</label>
            <input type="text" name="short_designation" class="form-control form-control-sm"
                value="{{ $data->short_designation }}">
        </div>
    </div>

    <button type="submit" class="btn btn-primary waves-effect text-left btn-sm float-right">Save Data</button>
</form>

<script>
    $("#filez2,.filez4").dropify();
    var editor2 = CKEDITOR.replace('editor2', {
        filebrowserUploadUrl: "{{ route('upload', ['_token' => csrf_token()]) }}",
        filebrowserUploadMethod: 'form',
        baseFloatZIndex: 10005,
        font_names: 'Avenir;Avenir Next;Gill Sans MT;Calibri;Arial;Comic Sans Ms;Courier New;Georgia;Lucida Sans Unicode;Tahoma;Times New Roman;Trebochet MS;Verdana;'

    });
</script>
