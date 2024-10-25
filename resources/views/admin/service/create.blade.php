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
                                    <div class="col-md-4 form-group">
                                        <label>{{ __('Title') }} <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control form-control-sm" name="title">
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label>Slug <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control form-control-sm" name="slug">
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
                                    <div class="col-md-4">
                                        <label>Display Order <span class="text-danger">*</span></label>
                                        <input type="number" name="display_order" class="form-control form-control-sm"
                                            value="{{ $display_order }}">
                                    </div>

                                    <div class="col-md-4">
                                        <label>Project Categories <span class="text-danger">*</span></label>
                                        <select name="projectcategory" class="form-control form-control-sm">
                                            <option selected value="">Select</option>
                                            @foreach (App\Helpers\Helper::projectcategory() as $category)
                                                <option value="{{ $category->id }}">{{ $category->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-4">
                                        <label>Featured Projects <span class="text-danger">*</span></label>
                                        <select name="featured_project[]" id="featured_project"
                                            class="form-control form-control-sm" multiple>
                                            <option value="">Select</option>
                                            <!-- Options will be populated dynamically -->
                                        </select>
                                    </div>

                                    <div class="col-md-4">
                                        <label>Background Color <span class="text-danger">*</span></label>
                                        <input type="text" name="bg_color" class="form-control form-control-sm">
                                    </div>
                                    <div class="col-md-12">
                                        <label>Seo Keywords Heading</span></label>
                                        <input type="text" name="seo_more_heading" class="form-control form-control-sm">
                                    </div>

                                    <div class="col-md-12 form-group">
                                        <label>Seo Keywords Content</label>
                                        <textarea class="form-control" id="seo_more_content" name="seo_more_content"></textarea>
                                    </div>
                                    <div class="col-md-12">
                                        <hr>
                                    </div>
                                    <div class="col-md-12 form-group">
                                        <label>Short Description</label>
                                        <textarea class="form-control" id="description_editor"></textarea>
                                    </div>

                                    <div class="col-md-12 my-2">
                                        <textarea id="editor" cols="30" rows="10"></textarea>
                                    </div>

                                    <div class="col-md-3 form-group">
                                        <label>{{ __(' Image') }} <span class="text-danger">*</span></label>
                                        <input type="file" name="image" id="filez1" class="filez1"
                                            data-max-file-size="1M"
                                            data-allowed-file-extensions="jpeg png jpg gif svg webp">
                                        <small class="text-muted">This image will appear on services page</small>
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <label>{{ __(' ICON') }}</label>
                                        <input type="file" name="image2" id="filez2" class="filez2"
                                            data-max-file-size="1M" data-allowed-file-extensions="svg">
                                        <small class="text-muted">This image will appear on home page</small>
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <label>Service Icon</label>
                                        <input type="file" name="image4" id="filez4" class="filez4"
                                            data-max-file-size="2M"
                                            data-allowed-file-extensions="jpeg png jpg gif svg webp">
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <label>{{ __(' BANNER') }}</label>
                                        <input type="file" name="image3" id="filez3" class="filez3"
                                            data-max-file-size="2M"
                                            data-allowed-file-extensions="jpeg png jpg gif svg webp">
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <label>{{ __('Secondary Image') }}</label>
                                        <input type="file" name="image6" id="filez5" class="filez5"
                                            data-max-file-size="2M"
                                            data-allowed-file-extensions="jpeg png jpg gif svg webp">
                                        <small class="text-muted">This image will appear in related services
                                            section</small>
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <label>{{ __(' OG Image') }}</label>
                                        <input type="file" name="image5" id="filez5" class="filez5"
                                            data-max-file-size="2M"
                                            data-allowed-file-extensions="jpeg png jpg gif svg webp">
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <label for="status">Status <span class="text-danger">*</span></label>
                                        <select name="status" class="form-control form-control-sm">
                                            <option value="active">Active</option>
                                            <option value="in-active">In-active</option>
                                        </select>
                                        <br>
                                        <label for="is_featured">Is Featured</label>
                                        <select name="is_featured" class="form-control form-control-sm">
                                            <option value="1">Yes</option>
                                            <option value="0" selected>No</option>
                                        </select>
                                        <br>
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <label>Position</label>
                                        <br>
                                        {{-- <span class="mx-2">
                               <input type="checkbox" id="top" value="top" name="position[]" class="filled-in chk-col-purple" />
                               <label for="top">Top Bar</label>   
                             </span>
                             <span class="mx-2">
                               <input type="checkbox" id="navigation" value="navigation" name="position[]" class="filled-in chk-col-purple" />
                               <label for="navigation">Navigation Bar</label>   
                             </span>
                              --}}
                                        <span class="mx-2">
                                            <input type="checkbox" id="footer" value="footer" name="position[]"
                                                class="filled-in chk-col-purple" />
                                            <label for="footer">Footer (products)</label>
                                        </span> <br>
                                        <span class="mx-2">
                                            <input type="checkbox" id="other" value="other" name="position[]"
                                                class="filled-in chk-col-purple" />
                                            <label for="other">Footer (services)</label>
                                        </span> <br>
                                        <span class="mx-2">
                                            <input type="checkbox" id="organization" value="organization"
                                                name="position[]" class="filled-in chk-col-purple" />
                                            <label for="organization">Footer (organization)</label>
                                        </span>
                                        {{-- <span class="mx-2">
                               <input type="checkbox" id="bottom" value="bottom" name="position[]" class="filled-in chk-col-purple"  />
                               <label for="bottom">Bottom </label>  
                             </span> --}}
                                    </div>
                                    <div class="col-md-3" style="margin-top: 3%;">
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

    <!-- Initialize Select2 -->
    <script>
        $(document).ready(function() {
            $('#featured_project').select2({
                placeholder: 'Select categories',
                allowClear: true
            });
        });
    </script>



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
        var seo_more_content = CKEDITOR.replace('seo_more_content', {
            filebrowserUploadUrl: "{{ route('upload', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form',
            baseFloatZIndex: 10005,
            allowedContent: true,
            font_names: 'Avenir;Avenir Next;Gill Sans MT;Calibri;Arial;Comic Sans Ms;Courier New;Georgia;Lucida Sans Unicode;Tahoma;Times New Roman;Trebochet MS;Verdana;'

        });

        $(".filez1,.filez2,.filez3,.filez4,.filez5").dropify();

        function form_validation() {

            $(".addFormError").show();
            $(".addFormError").html("<strong><i class='fa fa-spin fa-spinner fa-2x fa-fw'></i> Loading....</strong>");
            var form = new FormData($('#addForm')[0]);
            form.append('contents', editor.getData());
            form.append('description', description_editor.getData());
            form.append('seo_more_content', seo_more_content.getData());

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

    <script type="text/javascript">
        $(document).ready(function() {
            var ajaxUrl = '{{ route('featured.projects') }}'; // Adjust the URL if needed

            // Initialize the multi-select dropdown
            $('select[name="featured_project[]"]').on('change', function() {
                var selectedOptions = $(this).find('option:selected');
                var maxSelections = 3;

                // Check if the number of selected options exceeds the limit
                if (selectedOptions.length > maxSelections) {
                    toastInfo('You can only select up to 4 projects.');

                    // Remove the last selected option
                    $(this).find('option:selected').last().prop('selected', false);
                    $(this).val($(this).val().slice(0, maxSelections)); // Keep only the first 4 selections
                }
            });

            // When the project category dropdown value changes
            $('select[name="projectcategory"]').on('change', function() {
                var categoryId = $(this).val();
                var $featuredProjectSelect = $('select[name="featured_project[]"]');

                if (categoryId) {
                    $.ajax({
                        type: 'GET',
                        url: ajaxUrl,
                        data: {
                            category_id: categoryId
                        },
                        success: function(response) {
                            $featuredProjectSelect.empty().append(
                                '<option value="">Select</option>');

                            if (response.length) {
                                $.each(response, function(index, project) {
                                    $featuredProjectSelect.append('<option value="' +
                                        project.id + '">' + project.name +
                                        '</option>').prop('disabled', false);
                                });
                            } else {
                                $featuredProjectSelect.append(
                                    '<option value="" disabled>No projects found</option>');
                            }

                            // Reinitialize the select picker if using a library like Select2
                            // $('select[name="featured_project[]"]').select2(); // Uncomment if using Select2
                        },
                        error: function(xhr, status, error) {
                            console.error('Error fetching featured projects:', error);
                        }
                    });
                } else {
                    $featuredProjectSelect.empty().append('<option value="">Select</option>').prop(
                        'disabled', true);
                }
            });
        });
    </script>
@endsection
