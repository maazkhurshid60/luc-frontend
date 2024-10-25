@extends('admin.layout.main-layout')

@section('content')
    @php
        $data_route = route('blog.datatable');
        $store_url = route('blog.store');
        $destroy_url = route('blog.destroy', 11);
        $update_url = route('blog.update', 11);
        $heading = 'Add Blog';
    @endphp
    <div class="content-wrapper">
        <section class="content-header">

            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i>
                        {{ __('Dashboard') }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('blog.index') }}"><i class="fa fa-list"></i>
                        {{ __('Blog List') }}</a></li>

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
                                        <label>{{ __('Title') }} <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control form-control-sm" name="title">
                                    </div>
                                    <div class="col-md-4">
                                        <label>{{ __('Author/User') }} :</label>
                                        <input type="text" class="form-control form-control-sm" name="user">
                                    </div>

                                    <div class="col-md-4">
                                        <label>Display Order</label>
                                        <input type="number" name="display_order" class="form-control form-control-sm"
                                            min="1" value="{{ $display_order }}">
                                    </div>

                                    <div class="col-md-12">
                                        <hr>
                                    </div>

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
                                    <div class="col-md-12">
                                        <hr>
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label for="status">Category</label>
                                        <select name="category_id" class="form-control form-control-sm">
                                            @foreach ($BlogCategory as $cat)
                                                <option value="{{ $cat->id }}">{{ $cat->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-4 form-group">
                                        <label for="status">Services Category</label>
                                        <select name="service_id[]" class="form-control form-control-sm" id="service-select"
                                            multiple>
                                            @foreach ($services as $cat)
                                                <option value="{{ $cat->id }}">{{ $cat->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-4 form-group">
                                        <label for="status">Related Member</label>
                                        <select name="pro_id[]" class="form-control form-control-sm" id="pro-select"
                                            multiple>
                                            @foreach ($members as $member)
                                                <option value="{{ $member->id }}">{{ $member->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-12 form-group">
                                        <label for="short_description">Short Description <span
                                                class="text-danger">*</span></label>
                                        <textarea class="form-control form-control-sm" name="short_description"></textarea>
                                    </div>
                                    <div class="col-md-12 my-2">
                                        <textarea id="editor" cols="30" rows="10"></textarea>
                                    </div>
                                    <div class="col-md-3">
                                        <label>{{ __('Image') }}</label>
                                        <input type="file" name="file" id="filez1" class="filez1"
                                            data-max-file-size="1M" data-allowed-file-extensions="jpeg png jpg gif webp">
                                    </div>
                                    <div class="col-md-3">
                                        <label>{{ __('Cover Image') }} <span class="text-danger">*</span></label>
                                        <input type="file" name="file3" id="filez3" class="filez3"
                                            data-max-file-size="1M" data-allowed-file-extensions="jpeg png jpg gif webp">
                                    </div>
                                    <div class="col-md-3">
                                        <label>{{ __('Breadcrumbs') }}</label>
                                        <input type="file" name="file2" id="filez2" class="filez2"
                                            data-max-file-size="1M" data-allowed-file-extensions="jpeg png jpg gif webp">
                                    </div>
                                    <div class="col-md-3">
                                        <label>{{ __('OG Image') }}</label>
                                        <input type="file" name="file4" id="filez4" class="filez4"
                                            data-max-file-size="1M" data-allowed-file-extensions="jpeg png jpg gif webp">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="status">Status</label>
                                        <select name="status" class="form-control form-control-sm">
                                            <option value="active">Active</option>
                                            <option value="in-active">In-active</option>
                                        </select>
                                        <br>

                                        <label for="client">Tags (comma separated)</label>
                                        <input type="text" name="tags" class="form-control form-control-sm">
                                    </div>
                                    <div class="col-md-6" style="margin-top: 3%;">
                                        <span class="">
                                            <input type="checkbox" id="search_engine" name="search_engine"
                                                class="filled-in chk-col-purple" checked />
                                            <label for="search_engine">Discourage search engines from indexing</label>
                                        </span>
                                        <br>
                                        <label for="date">Date</label>
                                        <input type="date" name="date" class="form-control form-control-sm">
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
    <!-- Include Select2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <!-- Include Select2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <!-- Initialize Select2 -->
    <script>
        $(document).ready(function() {
            $('#service-select').select2({
                placeholder: "Select services",
                allowClear: true
            });
        });
        $(document).ready(function() {
            $('#pro-select').select2({
                placeholder: "Select Member",
                allowClear: true,
            });
        });
    </script>


    <script type="text/javascript">
        $(".filez1").dropify();
        $(".filez2").dropify();
        $(".filez3").dropify();
        $(".filez4").dropify();

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
                        location.href = "{{ route('blog.index') }}";
                    }

                },
                error: function(xhr, ajaxOptions, thrownError) {
                    toastError(thrownError);
                    toastError(xhr.responseJSON.message)
                }

            });
            return false;
        }



        var editor = CKEDITOR.replace('editor', {
            filebrowserUploadUrl: "{{ route('upload', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form',
            baseFloatZIndex: 10005,
            allowedContent: true,
            font_names: 'Avenir;Avenir Next;Gill Sans MT;Calibri;Arial;Comic Sans Ms;Courier New;Georgia;Lucida Sans Unicode;Tahoma;Times New Roman;Trebochet MS;Verdana;'

        });
    </script>
@endsection
