@extends('admin.layout.main-layout')

@section('content')
    @php
        $data_route = route('blog.datatable');
        $store_url = route('blog.store');
        $destroy_url = route('blog.destroy', 11);
        $update_url = route('blog.update', 11);
        $heading = 'Update Blog';
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
                            <form method="POST" id="updateForm" enctype="multipart/form-data"
                                onsubmit="return update_validation()">
                                @method('PUT')
                                @csrf
                                <input type="hidden" name="id" value="{{ $data->id }}">
                                <div class=" row">
                                    <div class="col-md-4 form-group">
                                        <label>{{ __('Title') }} :</label>
                                        <input type="text" value="{{ $data->title }}"
                                            class="form-control form-control-sm" name="title">
                                    </div>

                                    <div class="col-md-4">
                                        <label>{{ __('Author/User') }} :</label>
                                        <input type="text" class="form-control form-control-sm"
                                            value="{{ $data->user }}" name="user">
                                    </div>

                                    <div class="col-md-4">
                                        <label>Display Order</label>
                                        <input type="number" value="{{ $data->display_order }}" name="display_order"
                                            class="form-control form-control-sm">
                                    </div>
                                    <div class="col-md-12">
                                        <hr>
                                    </div>
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

                                    <div class="col-md-4 form-group">
                                        <label for="meta_description">Meta Description</label>
                                        <input type="text" name="meta_description" id="meta_description" maxlength="180"
                                            value="{{ $data->meta_description }}" class="form-control form-control-sm">
                                        <p style="color: red; font-size: 12px">Char Count: <span
                                                id="descriptionCharCount">{{ strlen($data->meta_description) }}</span>/180
                                        </p>
                                    </div>

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

                                    <div class="col-md-12">
                                        <hr>
                                    </div>

                                    <div class="col-md-4 form-group">
                                        <label for="status">Category</label>
                                        <select name="category_id" class="form-control form-control-sm">
                                            @foreach ($BlogCategory as $cat)
                                                <option value="{{ $cat->id }}"
                                                    @if ($data->category_id == $cat->id) selected @endif>{{ $cat->title }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-4 form-group">
                                        <label for="status">Services Category</label>
                                        <select name="service_id[]" class="form-control form-control-sm" id="service-select"
                                            multiple>
                                            @foreach ($services as $cat)
                                                <option value="{{ $cat->id }}"
                                                    @if (in_array($cat->id, json_decode($data->service_id, true) ?? [])) selected @endif>
                                                    {{ $cat->title }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-4 form-group">
                                        <label for="status">Related Member</label>
                                        <select name="pro_id[]" class="form-control form-control-sm" id="pro-select"
                                            multiple>
                                            @foreach ($members as $member)
                                                <option value="{{ $member->id }}"
                                                    @if (in_array($member->id, json_decode($data->pro_id, true) ?? [])) selected @endif>
                                                    {{ $member->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-12 form-group">
                                        <label for="short_description">Short Description</label>
                                        <textarea class="form-control form-control-sm" name="short_description">{{ $data->short_description }}</textarea>
                                    </div>

                                    <div class="col-md-12 my-2">
                                        <textarea id="editor" cols="30" rows="10">@php
                                            echo $data->contents;
                                        @endphp</textarea>
                                    </div>
                                    <div class="col-md-3">
                                        <label>{{ __('Image') }}</label>
                                        <input type="file" name="file"
                                            data-default-file="{{ asset('storage/images/' . $data->image) }}"
                                            id="filez1" class="filez1" data-max-file-size="1M"
                                            data-allowed-file-extensions="jpeg png jpg gif webp">
                                        <!-- <img id="preview-image" src="{{ asset('storage/images/' . $data->image) }}" alt="Preview" style="max-width: 100%; margin-top: 10px;"> -->
                                    </div>
                                    <div class="col-md-3">
                                        <label>{{ __('Cover Image') }}</label>
                                        <input type="file" name="file3"
                                            data-default-file="{{ asset('storage/images/' . $data->cover_image) }}"
                                            id="filez3" class="filez3" data-max-file-size="1M"
                                            data-allowed-file-extensions="jpeg png jpg gif webp">
                                    </div>
                                    <div class="col-md-3">
                                        <label>{{ __('Breadcrumbs') }}</label>
                                        <input type="file" name="file2"
                                            data-default-file="{{ asset('storage/images/' . $data->breadcrumb) }}"
                                            id="filez2" class="filez2" data-max-file-size="1M"
                                            data-allowed-file-extensions="jpeg png jpg gif webp">
                                        <!-- <img id="preview-image" src="{{ asset('storage/images/' . $data->image) }}" alt="Preview" style="max-width: 100%; margin-top: 10px;"> -->
                                    </div>
                                    <div class="col-md-3">
                                        <label>{{ __('OG Image') }}</label>
                                        <input type="file" name="file4"
                                            data-default-file="{{ asset('storage/images/' . $data->og_image) }}"
                                            id="filez4" class="filez4" data-max-file-size="1M"
                                            data-allowed-file-extensions="jpeg png jpg gif webp">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="status">Status</label>
                                        <select name="status" class="form-control form-control-sm">
                                            <option @if ($data->status == 'active') selected @endif>Active</option>
                                            <option @if ($data->status == 'in-active') selected @endif>In-active</option>
                                        </select>
                                        <br>

                                        <label for="client">Tags (comma separated)</label>
                                        <input type="text" name="tags" value="{{ $data->tags }}"
                                            class="form-control form-control-sm">
                                    </div>

                                    <div class="col-md-6" style="margin-top: 3%;">
                                        <span class="">
                                            <input type="checkbox" id="search_engine" name="search_engine"
                                                class="filled-in chk-col-purple"
                                                {{ $data->search_engine == '1' ? 'checked' : '' }} />
                                            <label for="search_engine">Discourage search engines from indexing </label>
                                        </span>
                                        <br>
                                        <label for="date">Date</label>
                                        <input type="date" name="date" class="form-control form-control-sm"
                                            value="{{ $data->date }}">
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
    <!-- Include Select2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <!-- Include Select2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#service-select').select2({
                placeholder: "Select services",
                allowClear: true
            });
            $('#pro-select').select2({
                placeholder: "Select Member",
                allowClear: true,
            });
        });
    </script>

    <!-- <script>
        Dropzone.options.fileDropzone = {
            maxFilesize: 1, // MB
            acceptedFiles: '.jpeg,.jpg,.png,.gif,.svg,.webp',
            init: function() {
                this.on("success", function(file, response) {
                    // Assuming your response includes the image path
                    let previewImage = document.getElementById('preview-image');
                    previewImage.src = response.filePath;
                    console.log('Image source set to:', response.filePath); // Debugging line
                });
            }
        };

        // If you want to show the existing image when the page loads
        document.addEventListener("DOMContentLoaded", function() {
            let previewImagePath = "{{ asset('storage/images/' . $data->image) }}";
            let previewImage = document.getElementById('preview-image');
            if (previewImagePath) {
                previewImage.src = previewImagePath;
                console.log('Initial image source set to:', previewImagePath); // Debugging line
            }
        });
    </script> -->


    <script type="text/javascript">
        $(".filez1").dropify();
        $(".filez2").dropify();
        $(".filez3").dropify();
        $(".filez4").dropify();

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
