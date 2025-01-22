@extends('admin.layout.main-layout')
@section('content')
    @php
        $data_route = route('data.index');
        $heading = 'Settings';
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
                                <input type="hidden" name="id" value="{{ $settings->id }}">
                                <input type="hidden" name="lang" value="{{ $lang }}">
                                <div class=" row">
                                    <div class="col-md-4 form-group">
                                        <label>Site Name</label>
                                        <input type="text" name="siteName" value="{{ $settings->siteName }}"
                                            class="form-control form-control-sm">
                                    </div>
                                    <div class="col-md-8 form-group">
                                        <label>Slogan</label>
                                        <input type="text" name="slogan" value="{{ $settings->slogan }}"
                                            class="form-control form-control-sm">
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="row">
                                            <div class="col-md-6 form-group">
                                                <label>Email</label>
                                                <input type="text" name="email" value="{{ $settings->email }}"
                                                    class="form-control form-control-sm">
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label>Phone</label>
                                                <input type="text" name="phone" value="{{ $settings->phone }}"
                                                    class="form-control form-control-sm">
                                            </div>

                                            <div class="col-md-12 form-group">
                                                <label>Address</label>
                                                <input type="text" name="address" value="{{ $settings->address }}"
                                                    class="form-control form-control-sm">
                                            </div>

                                            <div class="col-md-6 form-group">
                                                <label>Email Second</label>
                                                <input type="text" name="email2" value="{{ $settings->email2 }}"
                                                    class="form-control form-control-sm">
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label>Phone Second</label>
                                                <input type="text" name="phone2" value="{{ $settings->phone2 }}"
                                                    class="form-control form-control-sm">
                                            </div>

                                            <div class="col-md-12 form-group">
                                                <label>Address Second</label>
                                                <input type="text" name="address2" value="{{ $settings->address2 }}"
                                                    class="form-control form-control-sm">
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label>Facebook Link</label>
                                                <input type="text" name="fb" value="{{ $settings->fb }}"
                                                    class="form-control form-control-sm">
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label>Twitter</label>
                                                <input type="text" name="twitter" value="{{ $settings->twitter }}"
                                                    class="form-control form-control-sm">
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <label>Youtube</label>
                                                <input type="text" name="youtube" value="{{ $settings->youtube }}"
                                                    class="form-control form-control-sm">
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <label>Gmail</label>
                                                <input type="text" name="googleplus" value="{{ $settings->googleplus }}"
                                                    class="form-control form-control-sm">
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <label>Instagram</label>
                                                <input type="text" name="instagram" value="{{ $settings->instagram }}"
                                                    class="form-control form-control-sm">
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <label>Linkedin</label>
                                                <input type="text" name="linkedin" value="{{ $settings->linkedin }}"
                                                    class="form-control form-control-sm">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label>Logo</label>
                                        <input type="file" name="logo_image" class="form-control my-2 dropify"
                                            data-max-file-size="1M"
                                            data-allowed-file-extensions="jpeg png jpg gif svg webp"
                                            data-default-file="{{ asset('storage/images/' . $settings->logo) }}">
                                        <label>Icon</label>
                                        <input type="file" name="icon_image" class="form-control my-2 dropify2"
                                            data-max-file-size="1M"
                                            data-allowed-file-extensions="jpeg png jpg gif svg webp"
                                            data-default-file="{{ asset('storage/images/' . $settings->icon) }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label>About Us</label>
                                        <textarea name="about_us" class="form-control form-control-sm">{{ $settings->about_us }}</textarea>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Google Map</label>
                                        <textarea name="map" class="form-control form-control-sm">{{ $settings->map }}</textarea>
                                    </div>
                                    <div class="col-md-6 my-2">
                                        <label>Embed Video</label>
                                        <textarea name="video" class="form-control form-control-sm">{{ $settings->video }}</textarea>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="alert alert-danger updateFormError" style="display: none;"></div>

                                    </div>
                                </div>




                                <div class="row">

                                    <div class="col-md-12">
                                        <button class="btn btn-sm btn-primary float-right">Update Settings</button>
                                        <a href="{{ route('settings.index', 'lang=fr') }}"
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
            form.append('type', 'update_settings');
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
