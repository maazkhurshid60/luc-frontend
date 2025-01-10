@extends('admin.layout.main-layout')

@section('content')
    @php
        $data_route = route('service.datatable');
        $store_url = route('service.store');
        $destroy_url = route('service.destroy', 11);
        $update_url = route('service.update', 11);
        $heading = 'Add Service';
    @endphp
    <div class="content-wrapper">
        <section class="content-header">

            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i>
                        {{ __('Dashboard') }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('service.index') }}"><i class="fa fa-list"></i>
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
                                    <div class="col-md-6 form-group">
                                        <label>{{ __('Title') }} <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control form-control-sm" name="title">
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label>Slug <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control form-control-sm" name="slug">
                                    </div>

                                    <div class="col-md-6">
                                        <label for="pagetitle">Page Title </label>
                                        <input type="text" name="page_title" id="page_title"
                                            class="form-control form-control-sm" maxlength="80">
                                        <p style="color: red; font-size: 12px">Char Count:<span id="charCount">0</span>/80
                                        </p>

                                    </div>
{{-- 
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
                                    </div> --}}

                                    {{-- <div class="col-md-4">
                                        <label>Project Categories <span class="text-danger">*</span></label>
                                        <select name="projectcategory" class="form-control form-control-sm">
                                            <option selected value="">Select</option>
                                            @foreach (App\Helpers\Helper::projectcategory() as $category)
                                                <option value="{{ $category->id }}">{{ $category->title }}</option>
                                            @endforeach
                                        </select>
                                    </div> --}}

                                    <div class="col-md-6 mb-3 ">
                                        <label>Select Company</span></label>
                                        <select id="company_select" name="company_select"
                                            class="form-control form-control-sm">
                                            <option value="" disabled selected>Select a company</option>
                                            @foreach ($service_company as $company)
                                                <option value="{{ $company->id }}">{{ $company->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-12 form-group">
                                        <label>Short Description</label>
                                        <textarea class="form-control" id="description_editor"></textarea>
                                    </div>

                                    <div class="col-md-12 my-2">
                                        <textarea id="editor" cols="30" rows="10"></textarea>
                                    </div>

                                    <div class="col-md-6 form-group">
                                        <label>{{ __(' Image') }} <span class="text-danger">*</span></label>
                                        <input type="file" name="image" id="filez1" class="filez1"
                                            data-max-file-size="1M"
                                            data-allowed-file-extensions="jpeg png jpg gif svg webp">
                                        <small class="text-muted">This image will appear on services page</small>
                                    </div>
                                    {{-- <div class="col-md-4 form-group">
                                        <label>{{ __(' OG Image') }}</label>
                                        <input type="file" name="image5" id="filez5" class="filez5"
                                            data-max-file-size="2M"
                                            data-allowed-file-extensions="jpeg png jpg gif svg webp">
                                    </div> --}}
                                    <div class="col-md-6 form-group">
                                        <label for="status">Status <span class="text-danger">*</span></label>
                                        <select name="status" class="form-control form-control-sm">
                                            <option value="active">Active</option>
                                            <option value="in-active">In-active</option>
                                        </select>
                                        <br>
                                        <span class="">
                                            <input type="checkbox" id="search_engine" name="search_engine"
                                                class="filled-in chk-col-purple" checked />
                                            <label for="search_engine">Discourage search engines from indexing</label>
                                        </span>
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
            font_names: 'Avenir;Avenir Next;Gill Sans MT;Calibri;Arial;Comic Sans Ms;Courier New;Georgia;Lucida Sans Unicode;Tahoma;Times New Roman;Trebochet MS;Verdana;'

        });
        var description_editor = CKEDITOR.replace('description_editor', {
            filebrowserUploadUrl: "{{ route('upload', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form',
            baseFloatZIndex: 10005,
            allowedContent: true,
            font_names: 'Avenir;Avenir Next;Gill Sans MT;Calibri;Arial;Comic Sans Ms;Courier New;Georgia;Lucida Sans Unicode;Tahoma;Times New Roman;Trebochet MS;Verdana;'

        });

        $(".filez1,.filez5").dropify();

        function form_validation() {

            $(".addFormError").show();
            $(".addFormError").html("<strong><i class='fa fa-spin fa-spinner fa-2x fa-fw'></i> Loading....</strong>");
            var form = new FormData($('#addForm')[0]);
            form.append('contents', editor.getData());
            form.append('description', description_editor.getData());

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
                        location.href = "{{ route('service.index') }}";
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
