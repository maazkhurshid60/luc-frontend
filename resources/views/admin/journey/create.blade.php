@extends('admin.layout.main-layout')

@section('content')
    @php
        $data_route = route('service.datatable');
        $store_url = route('journey.store');
        $destroy_url = route('service.destroy', 11);
        $update_url = route('service.update', 11);
        $heading = 'Add Journey';
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
                            <form method="POST" id="addForm"
                                onsubmit="return form_validation()">
                                @csrf

                                <div class=" row">
                                    <div class="col-md-4 form-group">
                                        <label>{{ __('Year') }} <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control form-control-sm" name="year">
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label>Month <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control form-control-sm" name="month">
                                    </div>

                                    <div class="col-md-4">
                                        <label for="pagetitle">Title </label>
                                        <input type="text" name="title" id="page_title"
                                            class="form-control form-control-sm" maxlength="80">
                                    </div>
                                    <div class="col-md-12">
                                        <label for="pagetitle">Description </label>
                                        <textarea name="description" id="" cols="30" rows="10" class="form-control"></textarea>
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
                        location.href = "{{ route('journey.index') }}";
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

    {{-- <script type="text/javascript">
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
    </script> --}}
@endsection
