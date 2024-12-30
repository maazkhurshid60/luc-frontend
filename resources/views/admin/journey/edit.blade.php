@extends('admin.layout.main-layout')

@section('content')
    @php
        // $data_route = route('service.datatable');
        // $store_url = route('service.store');
        // $destroy_url = route('service.destroy', 11);S
        $update_url = route('journey.update', 11);
        $heading = 'Update Journey';
    @endphp
    <div class="content-wrapper">
        <section class="content-header">

            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i>
                        {{ __('Dashboard') }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('service.index') }}"><i class="fa fa-list"></i>
                        {{ __('Journey List') }}</a></li>

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
                                        <label>{{ __('Year') }} <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control form-control-sm" name="year"
                                            value="{{ $data->year }}">
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label>Month <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control form-control-sm" name="month"
                                            value="{{ $data->month }}">
                                    </div>

                                    <div class="col-md-4">
                                        <label for="pagetitle">Title <span class="text-danger">*</span></label>
                                        <input type="text" name="title" id="page_title"
                                            class="form-control form-control-sm" maxlength="80"
                                            value="{{ $data->title }}">
                                    </div>
                                    <div class="col-md-12">
                                        <label for="pagetitle">Description <span class="text-danger">*</span></label>
                                        <textarea name="description" id="" cols="30" rows="10" class="form-control">
                                            {{ $data->description }}
                                        </textarea>
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
    <!-- Initialize Select2 -->


    <script type="text/javascript">
        function update_validation() {

            $(".updateFormError").show();
            $(".updateFormError").html("<strong><i class='fa fa-spin fa-spinner fa-2x fa-fw'></i> Loading....</strong>");
            var form = new FormData($('#updateForm')[0]);
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
            // Function to populate the featured project select dropdown
            function populateFeaturedProjects(categoryId, selectedProjects = []) {
                if (categoryId) {
                    $.ajax({
                        type: 'GET',
                        url: '{{ route('featured.projects') }}',
                        data: {
                            category_id: categoryId
                        },
                        success: function(response) {
                            // Clear the existing options
                            var $featuredProjectSelect = $('select[name="featured_project[]"]');
                            $featuredProjectSelect.empty();

                            // Add a default option
                            $featuredProjectSelect.append('<option value="">Select</option>');

                            // Populate new options
                            $.each(response, function(index, project) {
                                var isSelected = selectedProjects.includes(project.id
                                    .toString()) ? 'selected' : '';
                                $featuredProjectSelect.append('<option value="' + project.id +
                                    '" ' + isSelected + '>' + project.name + '</option>');
                            });

                            // Reinitialize the select picker if using a library like Select2
                            // $('select[name="featured_project[]"]').select2(); // Uncomment if using Select2
                        },
                        error: function(xhr, status, error) {
                            console.error('Error fetching featured projects:', error);
                        }
                    });
                } else {
                    // If no category selected, clear the featured projects dropdown
                    $('select[name="featured_project[]"]').empty().append('<option value="">Select</option>');
                }
            }

            // Get the initial category ID and selected projects from the server or HTML
            var initialCategoryId = $('select[name="projectcategory"]').val(); // Get the initial category ID
            var preselectedProjects =
                @json($data->featured_projects); // Replace this with your actual preselected project IDs

            // Populate the featured projects dropdown on page load for editing
            populateFeaturedProjects(initialCategoryId, preselectedProjects);

            // When the project category dropdown value changes
            $('select[name="projectcategory"]').on('change', function() {
                var categoryId = $(this).val();

                // Populate the featured projects dropdown when the category changes
                populateFeaturedProjects(categoryId);
            });
        });
    </script> --}}


    {{-- <script type="text/javascript">
        $(document).ready(function() {
            var ajaxUrl = '{{ route('featured.projects') }}'; // Adjust the URL if needed

            // Initialize the multi-select dropdown
            $('select[name="featured_project[]"]').on('change', function() {
                var maxSelections = 4;

                // Handle change event for the multi-select dropdown
                var selectedOptions = $(this).find('option:selected');

                // Check if the number of selected options exceeds the limit
                if (selectedOptions.length > maxSelections) {
                    toastInfo('You can only select up to 4 projects.');

                    // Remove the last selected option
                    $(this).find('option:selected').last().prop('selected', false);

                    // Keep only the first 4 selections
                    $(this).val($(this).val().slice(0, maxSelections)).trigger('change');
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
