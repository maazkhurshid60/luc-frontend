@extends('admin.layout.main-layout')
@section('content')
    @php
        $data_route = route('aboutdetails.store');
        $heading = 'About Us Page Details';
    @endphp
    <div class="content-wrapper">
        <section class="content-header">

            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i>
                        {{ __('Dashboard') }}</a></li>

                <li class="breadcrumb-item active">{{ __($heading) }}</li>
            </ol>
        </section>


        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">{{ __($heading . '') }}</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">

                            <form method="POST" id="updateForm" enctype="multipart/form-data"
                                onsubmit="return update_validation()">
                                @csrf
                                <input type="hidden" name="id" value="{{ $about_details->id ?? '' }}">
                                <input type="hidden" name="lang" value="{{ $lang }}">
                                <div class=" row">
                                    <div class="col-md-6 form-group">
                                        <label>Journey Section Heading <span class="text-danger">*</span></label>
                                        <input type="text" name="journey_heading"
                                            value="{{ $about_details->journey_heading ?? '' }}"
                                            class="form-control form-control-sm">
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label>Vision Section Heading <span class="text-danger">*</span></label>
                                        <input type="text" name="vision_heading"
                                            value="{{ $about_details->vision_heading ?? '' }}"
                                            class="form-control form-control-sm">
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label>Journey Section Image</label>
                                        <input type="file" name="journeyimg" class="form-control my-2 dropify"
                                            data-max-file-size="1M" data-allowed-file-extensions="jpeg png jpg gif svg webp"
                                            data-default-file="{{ isset($about_details) ? asset('storage/images/' . $about_details->journey_img) : '' }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label>Vision Section Image</label>
                                        <input type="file" name="visionimg" class="form-control my-2 dropify2"
                                            data-max-file-size="1M" data-allowed-file-extensions="jpeg png jpg gif svg webp"
                                            data-default-file="{{ isset($about_details) ? asset('storage/images/' . $about_details->vision_img) : '' }}">
                                    </div>
                                    <div class="col-md-12 mb-4">
                                        <label>Our Vision Description <span class="text-danger">*</span></label>
                                        <textarea name="vision_desc" class="form-control form-control-sm">{{ $about_details->vision_desc ?? '' }}</textarea>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="alert alert-danger updateFormError" style="display: none;"></div>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <button class="btn btn-sm btn-primary float-right">Update Settings</button>
                                        <a href="{{ route('aboutdetails.index', 'lang=fr') }}"
                                        class="btn btn-sm btn-primary float-right mr-3">Edit French</a>
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

        .dropify-wrapper {
            height: 125px !important;
        }
    </style>
@endsection

@section('custom-scripts')
    <script type="text/javascript">
        var dataURL = "{{ $data_route }}";
        var token = '{{ csrf_token() }}';

        function update_validation() {

            $(".updateFormError").show();
            $(".updateFormError").html("<strong><i class='fa fa-spin fa-spinner fa-2x fa-fw'></i>Loading....</strong>");
            var form = new FormData($('#updateForm')[0]);
            form.append('type', 'update');
            $.ajax({
                type: "POST",
                url: dataURL,
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
                        $(".updateFormError").removeClass('alert-danger').addClass('alert-success');
                        $(".extraModal").modal('hide');
                        $(".extraModalBody").html('');
                        oTable.draw();

                    }

                },
                error: function(xhr, ajaxOptions, thrownError) {
                    toastError(thrownError);
                    toastError(xhr.responseJSON.message)
                }

            });
            return false;
        }
        $(".dropify,.dropify2").dropify();
    </script>
@endsection
