@extends('admin.layout.main-layout')
@section('content')
    <style>
        .table-bordered-custom tbody tr {
            border: 1px solid #dee2e6;
        }

        .table-bordered-custom tbody td {
            border: none;
            /* Remove borders from columns */
        }
    </style>
    <div class="content-wrapper">
        <section class="content-header">
            <h1> {{ __('Update Profile') }} </h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i>
                        {{ __('Dashboard') }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('user.index') }}"><i class="fa fa-users"></i>
                        {{ __('Employees') }}</a></li>
                <li class="breadcrumb-item active">{{ __('Edit Employee') }}</li>
            </ol>
        </section>


        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="box round-shadow-box">

                        <!-- /.box-header -->
                        <div class="box-body">
                            <ul class="nav nav-tabs customtab3" role="tablist">
                                <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#profile"
                                        role="tab"><span class="hidden-sm-up"><i class="ion-home"></i></span> <span
                                            class="hidden-xs-down">Profile</span></a> </li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#updatePassword"
                                        role="tab"><span class="hidden-sm-up"><i class="fa fa-key"></i></span> <span
                                            class="hidden-xs-down">Change
                                            Password</span></a> </li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane active" id="profile" role="tabpanel">
                                    <div class="pad">

                                        <form method="POST" name="myForm" id="myForm" enctype="multipart/form-data"
                                            onsubmit="return form_validation()">
                                            @method('PUT')
                                            @csrf

                                            <div class="row">
                                                <div class="col-md-8">
                                                    <div class=" row">
                                                        <div class="col-md-6 form-group">
                                                            <label>{{ __('Name') }}</label> <span
                                                                class="text-danger">*</span>
                                                            <input type="text" value="{{ $element->name }}"
                                                                name="name" class="form-control form-control-sm">
                                                        </div>
                                                        <div class="col-md-6 form-group">
                                                            <label> {{ __('Email') }}</label> <span
                                                                class="text-danger">*</span>
                                                            <input type="email" value="{{ $element->email }}"
                                                                name="email" class="form-control form-control-sm">
                                                        </div>
                                                        <div class="col-md-6 form-group">
                                                            <label> {{ __('Contact') }}</label>
                                                            <input type="text" value="{{ $element->contact }}"
                                                                name="contact" class="form-control form-control-sm">
                                                        </div>
                                                        <div class="col-md-6 form-group">
                                                            <label> {{ __('Postal Code') }}</label>
                                                            <input type="text" name="postal_code"
                                                                value="{{ $element->postal_code }}"
                                                                class="form-control form-control-sm">
                                                        </div>
                                                        <div class="col-md-6 form-group">
                                                            <label> {{ __('Street') }}</label>
                                                            <input type="text" value="{{ $element->street }}"
                                                                name="street" class="form-control form-control-sm">
                                                        </div>
                                                        <div class="col-md-6 form-group">
                                                            <label> {{ __('City') }}</label>
                                                            <input type="text" name="city"
                                                                value="{{ $element->city }}"
                                                                class="form-control form-control-sm">
                                                        </div>
                                                        <div class="col-md-6 form-group">
                                                            <label> {{ __('Province') }}</label>
                                                            <input type="text" name="province"
                                                                value="{{ $element->province }}"
                                                                class="form-control form-control-sm">
                                                        </div>
                                                        <div class="col-md-6 form-group">
                                                            <label> {{ __('Country') }}</label>
                                                            <input type="text" name="country"
                                                                value="{{ $element->country }}"
                                                                class="form-control form-control-sm">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label>{{ __('Select Profile Image') }}</label>
                                                    <input type="file"
                                                        data-default-file="{{ 'storage/images/' . $element->image }}"
                                                        name="profile_image" class="form-control my-2 dropify">
                                                    <div class=" form-group">
                                                        <label> {{ __('Status') }}</label>
                                                        <select name="status" class="form-control form-control-sm">
                                                            <option
                                                                @if ($element->status == 'active') {{ 'selected' }} @endif
                                                                value="active">{{ __('Active') }}</option>
                                                            <option
                                                                @if ($element->status == 'in-active') {{ 'selected' }} @endif
                                                                value="in-active">{{ __('In-active') }}</option>
                                                        </select>
                                                    </div>
                                                    <div class="alert text-danger addFormError" style="display: none;">
                                                    </div>
                                                    <button
                                                        class="btn btn-primary float-right btn-sm">{{ __('Update Record') }}
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="tab-pane pad" id="updatePassword" role="tabpanel">
                                    {{-- wrapper for change password section --}}
                                    <div class="row">
                                        <form method="POST" id="passwordForm" onsubmit="return password_validation()">
                                            @method('PUT')
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-12 form-group">
                                                    <label> {{ __('New password') }}</label>
                                                    <input type="password" name="password"
                                                        class="form-control form-control-sm">
                                                </div>
                                                <div class="col-md-12 form-group">
                                                    <label> {{ __('Confirm Password') }} </label>
                                                    <input type="password" name="password_confirmation"
                                                        class="form-control form-control-sm">
                                                </div>
                                            </div>
                                            <div class="passwordFormError alert text-danger" style="display: none;">
                                            </div>
                                            <button class="btn btn-primary float-right btn-sm">{{ __('Change Password') }}
                                            </button>
                                        </form>
                                    </div>
                                    {{-- end wrapper for change password --}}
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@section('custom-css')
    <link rel="stylesheet"
        href="{{ asset('backend_assets/assets/vendor_components/lou-multi-select/css/multi-select.css') }}">
@endsection
@section('custom-scripts')
    <script src="{{ asset('backend_assets/assets/vendor_components/lou-multi-select/js/jquery.multi-select.js') }}">
    </script>

    <script type="text/javascript">
        $('.selectize').selectize();
        var url = "{{ route('user.update', $element->user_id) }}";
        var passwordURL = "{{ route('user.update.password', $element->user_id) }}";
        var dataURL = "{{ route('data.index') }}";
        var token = "{{ csrf_token() }}"
        var drEvent = $(".dropify").dropify();

        function form_validation() {
            $(".addFormError").show();
            $(".addFormError").html("<strong><i class='fa fa-spin fa-spinner fa-2x fa-fw'></i> Loading....</strong>");
            var form = new FormData($('#myForm')[0]);

            $.ajax({
                type: "POST",
                url: url,
                data: form,
                cache: false,
                contentType: false,
                processData: false,
                success: function(res) {
                    console.log(res);

                    $(".addFormError").html('');
                    $.each(res.errors, function(key, value) {
                        $(".addFormError").append('<small>*' + value + '</small><br>');
                    })
                    if (res.success) {
                        $(".addFormError").append(res.success);
                        $(".addFormError").removeClass('text-danger').addClass('text-success');
                        window.location.href = "{{ route('user.index') }}";

                    }

                }
            });
            return false;
        }

        function password_validation() {
            $(".passwordFormError").show();
            $(".passwordFormError").html("<strong><i class='fa fa-spin fa-spinner fa-2x fa-fw'></i> Loading....</strong>");
            var form = new FormData($('#passwordForm')[0]);

            $.ajax({
                type: "POST",
                url: passwordURL,
                data: form,
                cache: false,
                contentType: false,
                processData: false,
                success: function(res) {
                    console.log(res);

                    $(".passwordFormError").html('');
                    $.each(res.errors, function(key, value) {
                        $(".passwordFormError").append('<small>*' + value + '</small><br>');
                    })
                    if (res.success) {
                        $(".passwordFormError").append(res.success);
                        $(".passwordFormError").removeClass('text-danger').addClass('text-success');
                    }
                }
            });
            return false;
        }
    </script>
@endsection
