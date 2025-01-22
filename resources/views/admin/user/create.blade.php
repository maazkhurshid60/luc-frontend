@extends('admin.layout.main-layout')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1> {{ __('Employee Registration') }} </h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i>
                        {{ __('Dashboard') }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('user.index') }}"><i class="fa fa-users"></i>
                        {{ __('Employees') }}</a></li>
                <li class="breadcrumb-item active">{{ __('Add Employee') }}</li>
            </ol>
        </section>


        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="box round-shadow-box">

                        <!-- /.box-header -->
                        <div class="box-body">
                            <form method="POST" name="myForm" id="myForm" enctype="multipart/form-data"
                                onsubmit="return form_validation()">
                                @csrf
                                <div class="row">
                                    <div class="col-md-8">

                                        <div class=" row">
                                            <div class="col-md-6 form-group">
                                                <label>{{ __('Name') }}</label> <span class="text-danger">*</span>
                                                <input type="text" name="name" class="form-control form-control-sm">
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label> {{ __('Email') }}</label> <span class="text-danger">*</span>
                                                <input type="email" name="email" class="form-control form-control-sm">
                                            </div>
                                            <div class="col-md-6 form-group usernameClass">
                                                <label> {{ __('Username') }}</label> <span class="text-danger">*</span>
                                                <input type="text" name="username" class="form-control form-control-sm">
                                            </div>
                                            <div class="col-md-6 form-group passwordClass">
                                                <label> {{ __('Password') }}</label> <span class="text-danger">*</span>
                                                <input type="password" name="password" class="form-control form-control-sm">
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label> {{ __('Contact') }}</label>
                                                <input type="text" name="contact" class="form-control form-control-sm">
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label> {{ __('Postal Code') }}</label>
                                                <input type="text" name="postal_code"
                                                    class="form-control form-control-sm">
                                            </div>
                                            <div class="col-md-6 form-group"> <label> {{ __('Street') }}</label> <input
                                                    type="text" name="street" class="form-control form-control-sm">
                                            </div>
                                            <div class="col-md-6 form-group"> <label> {{ __('City') }}</label> <input
                                                    type="text" name="city" class="form-control form-control-sm">
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label> {{ __('Province') }}</label>
                                                <input type="text" name="province" class="form-control form-control-sm">
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label> {{ __('Country') }}</label>
                                                <input type="text" name="country" class="form-control form-control-sm">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label>{{ __('Select Profile Image') }}</label>
                                        <input type="file" name="profile_image" class="form-control my-2 dropify">
                                        <div class="form-group">
                                            <label> {{ __('Status') }}</label>
                                            <select name="status" class="form-control form-control-sm">
                                                <option value="active">{{ __('Active') }}</option>
                                                <option value="in-active">{{ __('In-active') }}</option>
                                            </select>
                                        </div>
                                        <div class="form-group roleClass">
                                            <label>{{ __('Role') }}</label>
                                            <select name="role" class="form-control form-control-sm">
                                                {!! App\Helpers\Helper::getRoles([
                                                    'value' => 'name',
                                                    'selectOption' => true,
                                                ]) !!}
                                            </select>
                                        </div>
                                        {{-- <div class="form-group">
                                            <input type="checkbox" class="filled-in chk-col-purple" id="software_user"
                                                name="software_user" checked value="1">
                                            <label for="software_user">{{ __('Software User') }}</label>
                                        </div> --}}
                                        <div class="alert text-danger addFormError" style="display: none;"></div>
                                        <button class="btn btn-primary btn-sm float-right">{{ __('Save Record') }}</button>
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
@section('custom-scripts')
    <script type="text/javascript">
        $('.selectize').selectize();
        var storeURL = "{{ route('user.store') }}";
        var drEvent = $(".dropify").dropify();
        var dataURL = "{{ route('data.index') }}";
        var token = "{{ csrf_token() }}";

        function form_validation() {

            $(".addFormError").show();
            $(".addFormError").html("<strong><i class='fa fa-spin fa-spinner fa-2x fa-fw'></i> Loading....</strong>");
            var form = new FormData($('#myForm')[0]);

            $.ajax({
                type: "POST",
                url: storeURL,
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
                        $(".addFormError").append('<p>' + res.success + '</p');
                        $(".addFormError").removeClass('text-danger').addClass('text-success');
                        $("#myForm")[0].reset();
                        $(".dropify-clear").click();
                        window.location.href = "{{ route('user.index') }}";
                    }
                }
            });
            return false;
        }
    </script>
@endsection
