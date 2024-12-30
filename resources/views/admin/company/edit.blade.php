@extends('admin.layout.main-layout')

@section('content')
    @php
        $data_route = route('company.datatable');
        $index_url = route('company.index');
        $update_url = route('company.update', 11);
        $heading = 'Update Company';
    @endphp
    <div class="content-wrapper">
        <section class="content-header">

            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i>
                        {{ __('Dashboard') }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('company.index') }}"><i class="fa fa-list"></i>
                        {{ __('Company List') }}</a></li>

                <li class="breadcrumb-item active">{{ __($heading) }}</li>
            </ol>
        </section>


        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">{{ __($heading) }}</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <form method="POST" id="updateForm" enctype="multipart/form-data"
                                onsubmit="return update_validation()">
                                @method('PUT')
                                @csrf
                                <input type="hidden" name="id" value="{{ $data->id }}">
                                <input type="hidden" name="lang" value="{{ $lang }}">
                                <div class=" row">
                                    <div class="col-md-6 form-group">
                                        <label>{{ __('Name') }} :</label>
                                        <input type="text" value="{{ $data->name }}"
                                            class="form-control form-control-sm" name="name">
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label>Contact <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control form-control-sm" name="contact"
                                            value="{{ $data->contact }}">
                                    </div>
                                    @can('meta-data.edit')
                                        <div class="col-md-4">
                                            <label for="pagetitle">Page Title</label>
                                            <input type="text" name="page_title" id="page_title" maxlength="80"
                                                value="{{ $data->page_title }}" class="form-control form-control-sm">
                                            <p style="color: red; font-size: 12px">Char Count: <span
                                                    id="charCount">{{ strlen($data->page_title) }}</span>/80</p>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="meta_keywords">Meta Keywords</label>
                                            <input type="text" name="meta_keywords" id="meta_keywords"
                                                value="{{ $data->meta_keywords }}" class="form-control form-control-sm">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="meta_description">Meta Description</label>
                                            <input type="text" name="meta_description" id="meta_description" maxlength="180"
                                                value="{{ $data->meta_description }}" class="form-control form-control-sm">
                                            <p style="color: red; font-size: 12px">Char Count: <span
                                                    id="descriptionCharCount">{{ strlen($data->meta_description) }}</span>/180
                                            </p>
                                        </div>
                                    @endcan
                                    @can('og-data.edit')
                                        <div class="col-md-4">
                                            <label for="og_title">OG Title</label>
                                            <input type="text" name="og_title" id="og_title" value="{{ $data->og_title }}"
                                                class="form-control form-control-sm">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="og_description">OG Description</label>
                                            <input type="text" name="og_description" id="og_description"
                                                value="{{ $data->og_description }}" class="form-control form-control-sm">
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label for="og_type">OG Type</label>
                                            <input type="text" name="og_type" id="og_type" value="{{ $data->og_type }}"
                                                class="form-control form-control-sm">
                                        </div>
                                    @endcan
                                    <div class="col-md-12 form-group">
                                        <label>Short Description</label>
                                        <textarea class="form-control " rows="5" name="short_description">{!! $data->short_description !!}</textarea>
                                    </div>
                                    <div class="col-md-12 my-2">
                                        <label for="details">Details</label>
                                        <textarea id="editor" cols="30" rows="10">
                                         {!! $data->contents !!}</textarea>
                                    </div>
                                    <div class="col-md-3">
                                        <label>{{ __('Image') }}</label>
                                        <input type="file" name="company_image"
                                            data-default-file="{{ asset('storage/images/' . $data->image) }}"
                                            class="dropify" data-max-file-size="1M"
                                            data-allowed-file-extensions="jpeg png jpg gif svg webp">
                                    </div>
                                    @can('og-data.edit')
                                        <div class="col-md-3 form-group">
                                            <label>{{ __(' OG Image') }}</label>
                                            <input type="file" name="ogimage"
                                                data-default-file="{{ asset('storage/images/' . $data->og_image) }}"
                                                class="dropify" data-max-file-size="1M"
                                                data-allowed-file-extensions="jpeg png jpg gif svg webp">
                                        </div>
                                    @endcan
                                    <div class="col-md-3 form-group">
                                        <label>{{ __(' Icon') }} <span class="text-danger">*</span></label>
                                        <input type="file" name="company_icon" class="dropify"
                                            data-default-file="{{ asset('storage/images/' . $data->companyIcon) }}"
                                            data-max-file-size="1M"
                                            data-allowed-file-extensions="jpeg png jpg gif svg webp">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="company_email">Company Email</label>
                                        <input type="text" class="form-control form-control-sm" name="company_email"
                                            id="company_email" value="{{ $data->company_email }}">
                                        <br>
                                        <label for="address">Address</label>
                                        <input type="text" class="form-control form-control-sm" name="address"
                                            id="address" value="{{ $data->address }}">
                                        <br>
                                        <label for="address_2">Secondary Address</label>
                                        <input type="text" class="form-control form-control-sm" name="address_2"
                                            id="address_2" value="{{ $data->address_2 }}">
                                        <br>
                                        <label for="status">Status</label>
                                        <select name="status" class="form-control form-control-sm">
                                            <option @if ($data->status == 'active') selected @endif>Active</option>
                                            <option @if ($data->status == 'in-active') selected @endif>In-active</option>
                                        </select>
                                        <br>
                                        <label>Display Order</label>
                                        <input type="number" value="{{ $data->display_order }}" name="display_order"
                                            class="form-control form-control-sm">
                                        <br>
                                        <input type="checkbox" id="search_engine" name="search_engine"
                                            class="filled-in chk-col-purple"
                                            {{ $data->search_engine == '1' ? 'checked' : '' }} />
                                        <label for="search_engine">Discourage search engines from indexing</label>
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <label for="facebook">Facebook</label>
                                        <input type="text" class="form-control form-control-sm" name="facebook"
                                            value="{{ $data->facebook }}" id="facebook"
                                            placeholder="https://www.facebook.com/">
                                        <br>
                                        <label for="twitter">Twitter</label>
                                        <input type="text" class="form-control form-control-sm" name="twitter"
                                            value="{{ $data->twitter }}" id="twitter"
                                            placeholder="https://www.x.com/">
                                        <br>
                                        <label for="linkedin">Linkedin</label>
                                        <input type="text" class="form-control form-control-sm" name="linkedin"
                                            value="{{ $data->linkedin }}" id="linkedin"
                                            placeholder="https://www.linkedin.com/company/">
                                        <br>
                                        <label for="instagram">Instagram</label>
                                        <input type="text" class="form-control form-control-sm" name="instagram"
                                            value="{{ $data->instagram }}" id="instagram"
                                            placeholder="https://www.instagram.com/">
                                        <br>
                                    </div>
                                    <div class="col-md-12">
                                        <br>
                                        <div class="alert alert-danger updateFormError" style="display: none;"></div>
                                        <button type="submit"
                                            class="btn btn-primary waves-effect text-left btn-sm float-right">Update
                                            Data</button>
                                    </div>
                            </form>

                        </div>
                        <!-- /.box-body -->
                    </div>
                </div>
            </div>

        </section>


    </div>
@endsection
@section('custom-css')
    <style type="text/css">
        .form-control {
            margin-right: 1px;
            border-radius: 0px;
        }

        [type=checkbox]+label {
            padding-left: 26px;
            font-size: 9pt
        }
    </style>
@endsection

@section('custom-scripts')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <!-- Include Select2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


    <script type="text/javascript">
        var editor = CKEDITOR.replace('editor', {
            filebrowserUploadUrl: "{{ route('upload', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form',
            baseFloatZIndex: 10005,
            allowedContent: true,
            font_names: 'Teko;Avenir;Avenir Next;Gill Sans MT;Calibri;Arial;Comic Sans Ms;Courier New;Georgia;Lucida Sans Unicode;Tahoma;Times New Roman;Trebochet MS;Verdana;'

        });
        $(".dropify").dropify();

        function update_validation() {

            $(".updateFormError").show();
            $(".updateFormError").html("<strong><i class='fa fa-spin fa-spinner fa-2x fa-fw'></i> Loading....</strong>");
            var form = new FormData($('#updateForm')[0]);
            form.append('contents', editor.getData());
            $.ajax({
                type: "POST",
                url: "{{ $update_url }}",
                data: form,
                cache: false,
                contentType: false,
                processData: false,
                success: function(res) {

                    $(".updateFormError").html('');
                    $.each(res.errors, function(key, value) {
                        $(".updateFormError").append('<small>*' + value + '</small><br>');
                    })
                    if (res.success) {
                        $(".updateFormError").append(res.success);
                        $(".updateFormError").removeClass('alert-danger').addClass('alert-success').delay(1000)
                            .hide();
                        // $("#updateForm")[0].reset();
                        toastInfo('Record Updated');
                        location.href = "{{ $index_url }}";
                    }

                },
                error: function(xhr, ajaxOptions, thrownError) {
                    toastError(thrownError);
                    toastError(xhr.responseJSON.message)
                }

            });
            return false;
        }
    </script>
@endsection
