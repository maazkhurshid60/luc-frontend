@extends('admin.layout.main-layout')

@section('content')
    @php
        $data_route = route('project.datatable');
        $store_url = route('project.store');
        $destroy_url = route('project.destroy', 11);
        $update_url = route('project.update', 11);
        $heading = 'Update Project';
    @endphp
    <div class="content-wrapper">
        <section class="content-header">

            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i>
                        {{ __('Dashboard') }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('project.index') }}"><i class="fa fa-list"></i>
                        {{ __('Project List') }}</a></li>

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
                            <form method="POST" id="updateForm" enctype="multipart/form-data" class="repeater"
                                onsubmit="return update_validation()">
                                @method('PUT')
                                @csrf
                                <input type="hidden" name="id" value="{{ $data->id }}">
                                <div class=" row">
                                    <div class="col-md-8 form-group">
                                        <label>{{ __('Name') }} <span class="text-danger">*</span></label>
                                        <input type="text" value="{{ $data->name }}"
                                            class="form-control form-control-sm" name="name">
                                    </div>

                                    <div class="col-md-4" style="display: none;">
                                        <label for="">Category</label>
                                        <select name="category_id" class="form-control form-control-sm">
                                            {{ App\Helpers\Helper::getOptions([
                                                'table' => 'projects_categories',
                                                'value' => 'title',
                                                'key' => 'id',
                                                'select' => $data->category_id,
                                            ]) }}
                                        </select>
                                    </div>


                                    <div class="col-md-4">
                                        <label for="category_select">Category <span class="text-danger">*</span></label>
                                        <select name="category_select[]" id="category_select"
                                            class="form-control form-control-sm" multiple>
                                            {!! App\Helpers\Helper::getOptions([
                                                'table' => 'projects_categories',
                                                'value' => 'title',
                                                'key' => 'id',
                                                'select' => json_decode($data->categories_id),
                                            ]) !!}
                                        </select>
                                    </div>


                                    <div class="col-md-4">
                                        <label for="pagetitle">Background Color Code</label>
                                        <input type="text" name="color_code" class="form-control form-control-sm"
                                            value="{{ $data->color_code }}">
                                    </div>

                                    <div class="col-md-4">
                                        <label>Display Order <span class="text-danger">*</span></label>
                                        <input type="number" value="{{ $data->display_order }}" min="1"
                                            name="display_order" class="form-control form-control-sm">
                                    </div>

                                    <div class="col-md-4" style="margin-top: 3%;">
                                        <span class="">
                                            <input type="checkbox" id="search_engine" name="search_engine"
                                                class="filled-in chk-col-purple"
                                                {{ $data->search_engine == '1' ? 'checked' : '' }} />
                                            <label for="search_engine">Discourage search engines from indexing</label>
                                        </span>
                                    </div>
                                    @can('meta-data.add')
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
                                    @endcan
                                    @can('og-data.add')
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
                                            <input type="text" name="og_type" id="og_type"
                                                value="{{ $data->og_type }}" class="form-control form-control-sm">
                                        </div>
                                        <div class="col-md-12">
                                            <hr>
                                        </div>
                                    @endcan
                                    <div class="col-md-4">
                                        <label for="client">Client</label>
                                        <input type="text" name="client" value="{{ $data->client }}"
                                            class="form-control form-control-sm">
                                    </div>

                                    <div class="col-md-4">
                                        <label for="services">Services</label>
                                        <input type="text" name="services" value="{{ $data->services }}"
                                            class="form-control form-control-sm">
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label for="link">Link/URL</label>
                                        <input type="text" name="link" value="{{ $data->link }}"
                                            class="form-control form-control-sm">
                                    </div>

                                    <div class="col-md-12 form-group">
                                        <label>Short Description <span class="text-danger">*</span></label>
                                        <textarea class="form-control " id="description_editor" name="description" maxlength="150">{{ $data->description }}</textarea>
                                    </div>



                                    <div class="col-md-12 my-2">
                                        <textarea name="contents" id="editor" cols="30" rows="10">{!! $data->contents !!}</textarea>
                                    </div>

                                    <div class="col-md-12 form-group">
                                        <div data-repeater-list="sections-group">
                                            <h3 style="display: inline-flex;">Details Section</h3>
                                            @if (!empty($sectionData))
                                                @foreach ($sectionData as $section)
                                                    <div data-repeater-item class="mb-3">
                                                        <div class="row">
                                                            <div class="col-md-8 mb-2">
                                                                <div class="form-group">
                                                                    <label for="input">Heading</label>
                                                                    <input type="text" name="input"
                                                                        class="form-control"
                                                                        value="{{ $section->section_heading }}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="text">Details</label>
                                                                    <textarea name="text" class="form-control">{{ $section->section_text }}</textarea>
                                                                </div>
                                                            </div>
                                                            <div class="col mb-2">
                                                                <div class="form-group">
                                                                    <label for="image">Image</label>
                                                                    <input type="file" name="section_image"
                                                                        id="section_image" class="section-image"
                                                                        data-default-file="{{ asset('storage/images/' . $section->section_image) }}"
                                                                        data-max-file-size="1M"
                                                                        data-allowed-file-extensions="jpeg png jpg gif svg webp" />
                                                                </div>
                                                                <div class="form-group">
                                                                    <input data-repeater-delete type="button"
                                                                        value="Delete" class="btn btn-danger">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                    </div>
                                                @endforeach
                                            @else
                                                <!-- Display one blank section item if sectionData is empty -->
                                                <div data-repeater-item class="mb-3">
                                                    <div class="row">
                                                        <div class="col-md-8 mb-2">
                                                            <div class="form-group">
                                                                <label for="input">Heading</label>
                                                                <input type="text" name="input" class="form-control"
                                                                    value="">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="text">Details</label>
                                                                <textarea name="text" class="form-control"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col mb-2">
                                                            <div class="form-group">
                                                                <label for="image">Image</label>
                                                                <input type="file" name="section_image"
                                                                    id="section_image" class="section-image"
                                                                    data-max-file-size="1M"
                                                                    data-allowed-file-extensions="jpeg png jpg gif svg webp" />
                                                            </div>
                                                            <div class="form-group">
                                                                <input data-repeater-delete type="button" value="Delete"
                                                                    class="btn btn-danger">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                </div>
                                            @endif
                                        </div>
                                        <input data-repeater-create type="button" value="Add Section"
                                            class="btn btn-primary float-right">
                                    </div>

                                    <div class="col-md-3">
                                        <label>{{ __('Cover Image') }} <span class="text-danger">*</span></label>
                                        <input type="file" name="image" class="dropify" data-max-file-size="1M"
                                            data-default-file="{{ asset('storage/images/' . $data->cover_image) }}"
                                            data-allowed-file-extensions="jpeg png jpg gif svg webp">
                                    </div>
                                    <div class="col-md-3">
                                        <label>{{ __('Details Image') }}</label>
                                        <input type="file" name="detail_image" class="dropify"
                                            data-max-file-size="1M"
                                            data-default-file="{{ asset('storage/images/' . $data->details_image) }}"
                                            data-allowed-file-extensions="jpeg png jpg gif svg webp">
                                    </div>

                                    <div class="col-md-3">
                                        <label>{{ __('Images Gallery') }}</label>
                                        <input type="file" name="gallery_image[]" id="gallery-files" class="dropify"
                                            data-max-file-size="1M"
                                            data-default-file="{{ asset('storage/images/' . $data->details_image) }}"
                                            data-allowed-file-extensions="jpeg png jpg gif svg webp" multiple>
                                        <small class="form-text text-muted">You can upload up to 3 images.</small>
                                    </div>
                                    @can('og-data.add')
                                        <div class="col-md-3">
                                            <label>{{ __('OG Image') }}</label>
                                            <input type="file" name="file4" data-max-file-size="1M"
                                                data-default-file="{{ asset('storage/images/' . $data->og_image) }}"class="dropify"
                                                data-allowed-file-extensions="jpeg png jpg gif svg webp">
                                        </div>
                                    @endcan
                                    <div class="col-md-6">
                                        <label for="status">Status</label>
                                        <select name="status" class="form-control form-control-sm">
                                            <option @if ($data->status == 'active') selected @endif>Active</option>
                                            <option @if ($data->status == 'in-active') selected @endif>In-active</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label>{{ __('Site Visibility') }}</label>
                                        <select name="site_visibility" class="form-control form-control-sm">
                                            <option @if ($data->site_visibility == 1) selected @endif value="1">Show
                                                in Portfolio</option>
                                            <option @if ($data->site_visibility == 0) selected @endif value="0">Hide
                                                from Portfolio</option>
                                        </select>
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

    @php
        $cate = $data->categories_id;
    @endphp
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
            $('#category_select').select2({
                placeholder: 'Select categories',
                allowClear: true
            });
        });
    </script>

    <script type="text/javascript">
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
                        location.href = "{{ route('project.index') }}";
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.repeater/1.2.1/jquery.repeater.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.repeater').repeater({
                initEmpty: false,
                defaultValues: {
                    'text-input': ''
                },
                show: function() {
                    $(this).slideDown();
                },
                hide: function(deleteElement) {
                    if (confirm('Are you sure you want to delete this element?')) {
                        $(this).slideUp(deleteElement);
                    }
                },
            });
        });
    </script>
@endsection
