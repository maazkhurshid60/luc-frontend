@extends('admin.layout.main-layout')

@section('content')
    @php
        $data_route = route('company.datatable');
        $store_url = route('company.store');
        $index_url = route('company.index');
        $heading = 'Add Company';
    @endphp
    <div class="content-wrapper">
        <section class="content-header">

            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i>
                        {{ __('Dashboard') }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('company.index') }}"><i class="fa fa-list"></i>
                        {{ __('Job List') }}</a></li>

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
                            <form method="POST" id="addForm" enctype="multipart/form-data"
                                onsubmit="return form_validation()">
                                @csrf

                                <div class=" row">
                                    <div class="col-md-4 form-group">
                                        <label>{{ __('Name') }} <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control form-control-sm" name="name">
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label>Slug <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control form-control-sm" name="slug">
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label>Contact <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control form-control-sm" name="contact">
                                    </div>
                                    @can('meta-data.create')
                                        <div class="col-md-4">
                                            <label for="pagetitle">Page Title </label>
                                            <input type="text" name="page_title" id="page_title"
                                                class="form-control form-control-sm" maxlength="80">
                                            <p style="color: red; font-size: 12px">Char Count:<span id="charCount">0</span>/80
                                            </p>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="meta_keywords">Meta Keywords </label>
                                            <input type="text" name="meta_keywords" id="meta_keywords"
                                                class="form-control form-control-sm">
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label for="meta_description">Meta Description </label>
                                            <input type="text" name="meta_description" id="meta_description"
                                                class="form-control form-control-sm" maxlength="180">
                                            <p style="color: red; font-size: 12px">Char Count:<span
                                                    id="descriptionCharCount">0</span>/180</p>
                                        </div>
                                    @endcan
                                    @can('og-data.create')
                                        <div class="col-md-4">
                                            <label for="og_title">OG Title</label>
                                            <input type="text" name="og_title" id="og_title"
                                                class="form-control form-control-sm">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="og_description">OG Description</label>
                                            <input type="text" name="og_description" id="og_description"
                                                class="form-control form-control-sm">
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label for="og_type">OG Type</label>
                                            <input type="text" name="og_type" id="og_type"
                                                class="form-control form-control-sm">
                                        </div>
                                    @endcan
                                    <div class="col-md-12">
                                        <label>Short Description <span class="text-danger">*</span></label>
                                        <textarea type="text" name="short_description" rows="5" class="form-control form-control-sm"></textarea>
                                    </div>

                                    <div class="col-md-12 my-2">
                                        <label for="">Details</label>
                                        <textarea id="editor" cols="30" rows="10"></textarea>
                                    </div>

                                    <div class="col-md-3 form-group">
                                        <label>{{ __(' Image') }} <span class="text-danger">*</span></label>
                                        <input type="file" name="company_image" class="dropify" data-max-file-size="1M"
                                            data-allowed-file-extensions="jpeg png jpg gif svg webp">
                                    </div>
                                    @can('og-data.create')
                                        <div class="col-md-3 form-group">
                                            <label>{{ __(' OG Image') }}</label>
                                            <input type="file" name="ogimage" class="dropify" data-max-file-size="2M"
                                                data-allowed-file-extensions="jpeg png jpg gif svg webp">
                                        </div>
                                    @endcan
                                    <div class="col-md-3 form-group">
                                        <label>{{ __(' Icon') }} <span class="text-danger">*</span></label>
                                        <input type="file" name="company_icon" class="dropify" data-max-file-size="1M"
                                            data-allowed-file-extensions="jpeg png jpg gif svg webp">
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <label for="company_email">Company Email</label>
                                        <input type="text" class="form-control form-control-sm" name="company_email"
                                            id="company_email">
                                        <br>
                                        <label for="address">Address</label>
                                        <input type="text" class="form-control form-control-sm" name="address"
                                            id="address">
                                        <br>
                                        <label for="address_2">Secondary Address</label>
                                        <input type="text" class="form-control form-control-sm" name="address_2"
                                            id="address_2">
                                        <br>
                                        <label for="status">Status</label>
                                        <select name="status" class="form-control form-control-sm">
                                            <option value="active">Active</option>
                                            <option value="in-active">In-active</option>
                                        </select>
                                        <br>
                                        <label>Display Order <span class="text-danger">*</span></label>
                                        <input type="number" name="display_order" class="form-control form-control-sm"
                                            value="{{ $display_order }}">
                                        <br>
                                        <input type="checkbox" id="search_engine" name="search_engine"
                                            class="filled-in chk-col-purple" checked />
                                        <label for="search_engine">Discourage search engines from indexing</label>
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <label for="facebook">Facebook</label>
                                        <input type="text" class="form-control form-control-sm" name="facebook"
                                            id="facebook" placeholder="https://www.facebook.com/">
                                        <br>
                                        <label for="twitter">Twitter</label>
                                        <input type="text" class="form-control form-control-sm" name="twitter"
                                            id="twitter" placeholder="https://www.x.com/">
                                        <br>
                                        <label for="linkedin">Linkedin</label>
                                        <input type="text" class="form-control form-control-sm" name="linkedin"
                                            id="linkedin" placeholder="https://www.linkedin.com/company/">
                                        <br>
                                        <label for="instagram">Instagram</label>
                                        <input type="text" class="form-control form-control-sm" name="instagram"
                                            id="instagram" placeholder="https://www.instagram.com/">
                                        <br>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="alert alert-danger addFormError" style="display: none;"></div>
                                        <button class="btn my-2 btn-sm btn-primary float-right">Save Record</button>
                                    </div>
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

        function form_validation() {

            $(".addFormError").show();
            $(".addFormError").html("<strong><i class='fa fa-spin fa-spinner fa-2x fa-fw'></i> Loading....</strong>");
            var form = new FormData($('#addForm')[0]);
            form.append('contents', editor.getData());

            $.ajax({
                type: "POST",
                url: "{{ $store_url }}",
                data: form,
                cache: false,
                contentType: false,
                processData: false,
                success: function(res) {
                    $(".addFormError").html('');
                    $.each(res.errors, function(key, value) {
                        $(".addFormError").append('<small>*' + value + '</small><br>');
                    })
                    if (res.success) {
                        $(".addFormError").append(res.success);
                        $(".addFormError").removeClass('alert-danger').addClass('alert-success').delay(1000)
                            .hide();
                        $("#addForm")[0].reset();
                        toastInfo('Record Added');
                        $(".addModal").modal('hide');
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
