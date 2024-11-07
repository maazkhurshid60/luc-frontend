@extends('admin.layout.main-layout')
@section('content')
    @php
        $store_url = route('role.store');
        $heading = 'Roles & Permission Registration';
        $role_index = route('role.index');
        $role_permissions = [];
    @endphp
    <div class="content-wrapper">
        <section class="content-header">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i>
                        {{ __('Dashboard') }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('role.index') }}"><i class="fa fa-key"></i>
                        {{ __('Roles & Permission') }}</a></li>
                <li class="breadcrumb-item active">{{ __($heading) }}</li>
            </ol>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="box round-shadow-box">
                        <div class="box-header">
                            <h3 class="box-title">{{ __($heading) }}</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="registerForm">
                                <form method="POST" id="addForm" enctype="multipart/form-data"
                                    onsubmit="return form_validation()">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-4 form-group">
                                            <label>{{ __(' Role Title') }}</label>
                                            <input type="text" name="name" class="form-control form-control-sm">
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <label>{{ __('Remarks') }}</label>
                                            <input type="text" name="remarks" class="form-control form-control-sm">
                                        </div>
                                        <div class="col-md-12 row">
                                            <div class="col-md-12">
                                                <hr>
                                            </div>
                                            <div class="col-md-12">
                                                <input type="checkbox" class="filled-in chk-col-purple " name="Permission[]"
                                                    id="allPermissions" value="allPermissions">
                                                <label for="allPermissions"
                                                    style="font-size: 18pt;font-weight: 500;line-height: 1.2;">Select All
                                                    Permissions</label>
                                            </div>
                                            <div class="col-md-12">
                                                <hr>
                                            </div>
                                            <div class="col-md-6 row allPermissions">
                                                <div class="col-md-4">
                                                    <h4>{{ __('Roles') }}</h4>
                                                    <br>
                                                    <input type="checkbox" class="filled-in chk-col-purple" id="role.all"
                                                        onchange="select_check_box_all($(this))" value="role">
                                                    <label for="role.all">Select All</label>
                                                </div>
                                                <div class="col-md-8 role">
                                                    <input type="checkbox" class="filled-in chk-col-red" name="Permission[]"
                                                        id="role.view" value="role.view">
                                                    <label for="role.view">View</label>
                                                    <br>
                                                    <input type="checkbox" class="filled-in chk-col-red" name="Permission[]"
                                                        id="role.create" value="role.create">
                                                    <label for="role.create">Create</label>
                                                    <br>
                                                    <input type="checkbox" class="filled-in chk-col-red" name="Permission[]"
                                                        id="role.edit" value="role.edit">
                                                    <label for="role.edit">Edit</label>
                                                    <br>
                                                    <input type="checkbox" class="filled-in chk-col-red" name="Permission[]"
                                                        id="role.delete" value="role.delete">
                                                    <label for="role.delete">Delete</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6 row allPermissions">
                                                <div class="col-md-4">
                                                    <h4>{{ __('Users') }}</h4>
                                                    <br>
                                                    <input type="checkbox" class="filled-in chk-col-purple" id="user.all"
                                                        onchange="select_check_box_all($(this))" value="user">
                                                    <label for="user.all">Select All</label>
                                                </div>
                                                <div class="col-md-8 user">
                                                    <input type="checkbox" class="filled-in chk-col-purple"
                                                        name="Permission[]" id="user.view" value="user.view">
                                                    <label for="user.view">View</label>
                                                    <br>
                                                    <input type="checkbox" class="filled-in chk-col-purple"
                                                        name="Permission[]" id="user.create" value="user.create">
                                                    <label for="user.create">Create</label>
                                                    <br>
                                                    <input type="checkbox" class="filled-in chk-col-purple"
                                                        name="Permission[]" id="user.edit" value="user.edit">
                                                    <label for="user.edit">Edit</label>
                                                    <br>
                                                    <input type="checkbox" class="filled-in chk-col-red"
                                                        name="Permission[]" id="user.delete" value="user.delete">
                                                    <label for="user.delete">Delete</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="addFormError alert text-red"></div>
                                        </div>
                                        <div class="col-md-12 ">
                                            <button class="btn btn-purple btn-sm float-right">Register Role</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="editArea"></div>
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
    <script type="text/javascript">
    
        $('#allPermissions').click(function() {
            if ($(this).is(':checked'))
                $('.allPermissions input[type=checkbox]').prop('checked', true)
            else
                $('.allPermissions input[type=checkbox]').prop('checked', false)
        })

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
                        $(".addFormError").delay(1000).hide();
                        $("#addForm")[0].reset();
                        toastInfo('Record Added');
                        window.location.href = '{{ $role_index }}';
                    }
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    toastError(thrownError);
                    toastError(xhr.responseJSON.message)
                }
            });
            return false;
        }

        function select_check_box_all(event) {
            var className = event[0].value;
            if (event[0].checked) {
                $('.' + className + ' :checkbox').each(function() {
                    this.checked = true;
                });
            } else {
                $('.' + className + ' :checkbox').each(function() {
                    this.checked = false;
                });
            }
        }
    </script>
@endsection
