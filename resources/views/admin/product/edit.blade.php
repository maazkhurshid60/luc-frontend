@extends('admin.layout.main-layout')

@section('content')
    @php
        $data_route = route('product.datatable');
        $store_url = route('product.store');
        $destroy_url = route('product.destroy', 11);
        $update_url = route('product.update', 11);
        $heading = 'Update product';
    @endphp
    <div class="content-wrapper">
        <section class="content-header">

            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i>
                        {{ __('Dashboard') }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('product.index') }}"><i class="fa fa-list"></i>
                        {{ __('Product List') }}</a></li>

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
                                    <div class="col-md-6 form-group">
                                        <label>{{ __('Title') }} <span class="text-danger">*</span></label>
                                        <input type="text" value="{{ $data->title }}"
                                            class="form-control form-control-sm" name="title">
                                    </div>

                                    <div class="col-md-6">
                                        <label>{{ __('Slug') }} <span class="text-danger">*</span></label>
                                        <input type="text" value="{{ $data->slug }}"
                                            class="form-control form-control-sm" name="slug">
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

                                    <div class="col-md-6">
                                        <label>Display Order</label>
                                        <input type="number" value="{{ $data->display_order }}" name="display_order"
                                            class="form-control form-control-sm">
                                    </div>
                                    <div class="col-md-6" style="margin-top: 3%;">
                                        <span class="">
                                            <input type="checkbox" id="search_engine" name="search_engine"
                                                class="filled-in chk-col-purple"
                                                {{ $data->search_engine == '1' ? 'checked' : '' }} />
                                            <label for="search_engine">Discourage search engines from indexing</label>
                                        </span>
                                    </div>
                                    <div class="col-md-12 form-group">
                                        <label for="short_description">Short Description <span
                                                class="text-danger">*</span></label>
                                        <textarea class="form-control form-control-sm" name="short_description">{{ $data->short_description }}</textarea>
                                    </div>

                                    <div class="col-md-12 my-2">
                                        <textarea id="editor" cols="30" rows="10">@php
                                            echo $data->contents;
                                        @endphp</textarea>
                                    </div>
                                    <div class="col-md-4">
                                        <label>{{ __('Image') }} <span class="text-danger">*</span></label>
                                        <input type="file" name="file"
                                            data-default-file="{{ asset('storage/images/' . $data->image) }}"
                                            id="filez1" class="filez1" data-max-file-size="1M"
                                            data-allowed-file-extensions="jpeg png jpg gif svg webp">
                                    </div>
                                    <div class="col-md-4">
                                        <label>{{ __('OG Image') }}</label>
                                        <input type="file" name="file4"
                                            data-default-file="{{ asset('storage/images/' . $data->og_image) }}"
                                            id="filez4" class="filez4" data-max-file-size="1M"
                                            data-allowed-file-extensions="jpeg png jpg gif svg webp">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="status">Status</label>
                                        <select name="status" class="form-control form-control-sm">
                                            <option @if ($data->status == 'active') selected @endif>Active</option>
                                            <option @if ($data->status == 'in-active') selected @endif>In-active</option>
                                        </select>

                                    </div>
                                    <div class="col-md-12">
                                        <br>
                                        <div class="alert alert-danger updateFormError" style="display: none;"></div>
                                        <button type="submit"
                                            class="btn btn-primary waves-effect text-left btn-sm float-right">Update
                                            Data</button>
                                    </div>
                                    <div class="col-md-12">
                                        <hr>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-header">
                                                Files
                                                <button type="button" data-toggle="modal" data-target=".addFileModal"
                                                    class="btn btn-dark btn-xs float-right">Add File</button>
                                            </div>
                                            <div class="card-body">
                                                <div class="product-files-container">Loading..</div>
                                            </div>
                                        </div>
                                    </div>
                            </form>

                        </div>
                        <!-- /.box-body -->
                    </div>
                </div>
            </div>
            <div class="modal fade addFileModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
                aria-hidden="true" style="display: none;">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content brad0">
                        <div class="modal-header brad0">
                            <h4 class="modal-title addFileModalTitle" id="myLargeModalLabel">Product Files</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                        <div class="modal-body addFileModalBody">
                            <form method="POST" id="fileForm" enctype="multipart/form-data"
                                onsubmit="return file_validation()">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $data->id }}">
                                <div class=" row">
                                    <div class="col-md-6 form-group">
                                        <label>Title</label>
                                        <input type="text" class="form-control form-control-sm" name="title">
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label>Type</label>
                                        <select name="type" class="form-control form-control-sm">
                                            <option>Slider-icon-pre</option>
                                            <option>Slider-icon-post</option>
                                            <option>Slider-Banner</option>
                                            <option>Logo</option>
                                            <option>Gallery</option>
                                            <option>Other</option>
                                        </select>
                                    </div>

                                    <div class="col-md-12 form-group">
                                        <label>Details</label>
                                        <textarea name="details" class="form-control"></textarea>
                                    </div>

                                </div>
                                <div class="col-md-4">
                                    <label>{{ __('Image/File') }}</label>
                                    <input type="file" name="file" id="filez2" class="filez2"
                                        data-max-file-size="2M">
                                </div>
                                <div class="col-md-12">
                                    <div class="alert alert-danger fileFormError" style="display: none;"></div>
                                    <button class="btn my-2 btn-sm btn-primary float-right">Save Record</button>
                                </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
    </div>

    <div class="modal fade editFileModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
        aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content brad0">
                <div class="modal-header brad0">
                    <h4 class="modal-title editFileModalTitle" id="myLargeModalLabel">Edit Product File</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body editFileModalBody">
                    Loading...
                </div>
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
    <script type="text/javascript">
        let token = "{{ csrf_token() }}";
        $(".filez1").dropify();
        $(".filez4").dropify();
        var drEvent = $(".filez2").dropify();
        drEvent = drEvent.data('dropify');

        function fileList() {
            $.ajax({
                type: "GET",
                url: "{{ route('product-file.index') }}",
                data: {
                    product_id: {{ $data->id }}
                },
                success: function(res) {
                    $('.product-files-container').html(res);
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    toastError(thrownError);
                    toastError(xhr.responseJSON.message)
                }
            });
        }
        fileList();

        function deleteFile(id) {
            $(".product-files-container").html('Loading..');
            $.ajax({
                type: "POST",
                url: "{{ route('data.index') }}",
                data: {
                    '_token': token,
                    type: 'delete_product_file',
                    id
                },
                success: function(res) {
                    fileList();
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    toastError(thrownError);
                    toastError(xhr.responseJSON.message)
                }
            });
        }

        function editFile(id) {
            $(".editFileModal").modal();
            $(".editFileModalBody").html('loading...');
            $.ajax({
                type: "GET",
                url: "{{ route('product-file.show', 11) }}",
                data: {
                    id
                },
                success: function(res) {
                    $(".editFileModalBody").html(res);
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    toastError(thrownError);
                    toastError(xhr.responseJSON.message)
                }
            });
        }

        function file_update_validation() {
            $(".editFileFormError").show();
            $(".editFileFormError").html("<strong><i class='fa fa-spin fa-spinner fa-2x fa-fw'></i> Loading....</strong>");
            var form = new FormData($('#editFileForm')[0]);
            $.ajax({
                type: "POST",
                url: "{{ route('product-file.update', 11) }}",
                data: form,
                cache: false,
                contentType: false,
                processData: false,
                success: function(res) {

                    $(".editFileFormError").html('');
                    $.each(res.errors, function(key, value) {
                        $(".editFileFormError").append('<small>*' + value + '</small><br>');
                    })
                    if (res.success) {
                        $(".editFileFormError").append(res.success);
                        $(".editFileFormError").removeClass('alert-danger').addClass('alert-success').delay(
                            1000).hide();
                        $("#editFileForm")[0].reset();
                        toastInfo('Record Updated');
                        fileList();
                        $(".editFileModal").modal('hide');

                    }

                },
                error: function(xhr, ajaxOptions, thrownError) {
                    toastError(thrownError);
                    toastError(xhr.responseJSON.message)
                }

            });
            return false;
        }

        function file_validation() {

            $(".fileFormError").show();
            $(".fileFormError").html("<strong><i class='fa fa-spin fa-spinner fa-2x fa-fw'></i> Loading....</strong>");
            var form = new FormData($('#fileForm')[0]);
            $.ajax({
                type: "POST",
                url: "{{ route('product-file.store') }}",
                data: form,
                cache: false,
                contentType: false,
                processData: false,
                success: function(res) {

                    $(".fileFormError").html('');
                    $.each(res.errors, function(key, value) {
                        $(".fileFormError").append('<small>*' + value + '</small><br>');
                    })
                    if (res.success) {
                        $(".fileFormError").append(res.success);
                        $(".fileFormError").removeClass('alert-danger').addClass('alert-success').delay(1000)
                            .hide();
                        $("#fileForm")[0].reset();
                        toastInfo('Record Added');
                        fileList();
                        $(".addFileModal").modal('hide');
                        drEvent.resetPreview();
                        drEvent.clearElement();
                    }

                },
                error: function(xhr, ajaxOptions, thrownError) {
                    toastError(thrownError);
                    toastError(xhr.responseJSON.message)
                }

            });
            return false;
        }

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
                        location.href = "{{ route('product.index') }}";
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
