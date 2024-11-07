@extends('admin.layout.main-layout')
@section('content')
    @php
        $heading = 'Roles & Permission Updation';
        $role_index = route('role.index');
        $update_url = route('role.update', $obj->id);
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
                                <form method="POST" id="updateForm" enctype="multipart/form-data"
                                    onsubmit="return form_validation()">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-md-4 form-group">
                                            <label>{{ __(' Role Title') }}</label>
                                            <input type="text" name="name" class="form-control form-control-sm"
                                                value="{{ $obj->name }}">
                                        </div>
                                        <div class="col-md-12 row">
                                            <div class="col-md-12">
                                                <hr>
                                            </div>
                                            <div class="col-md-12">
                                                <input type="checkbox" class="filled-in chk-col-purple" id="allPermissions"
                                                    value="allPermissions">
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
                                                        id="role.view" value="role.view"
                                                        {{ in_array('role.view', $role_permissions) ? 'checked' : '' }}>
                                                    <label for="role.view">View</label>
                                                    <br>
                                                    <input type="checkbox" class="filled-in chk-col-red" name="Permission[]"
                                                        id="role.create" value="role.create"
                                                        {{ in_array('role.create', $role_permissions) ? 'checked' : '' }}>
                                                    <label for="role.create">Create</label>
                                                    <br>
                                                    <input type="checkbox" class="filled-in chk-col-red" name="Permission[]"
                                                        id="role.edit" value="role.edit"
                                                        {{ in_array('role.edit', $role_permissions) ? 'checked' : '' }}>
                                                    <label for="role.edit">Edit</label>
                                                    <br>
                                                    <input type="checkbox" class="filled-in chk-col-red" name="Permission[]"
                                                        id="role.delete" value="role.delete"
                                                        {{ in_array('role.delete', $role_permissions) ? 'checked' : '' }}>
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
                                                        name="Permission[]" id="user.view" value="user.view"
                                                        {{ in_array('user.view', $role_permissions) ? 'checked' : '' }}>
                                                    <label for="user.view">View</label>
                                                    <br>
                                                    <input type="checkbox" class="filled-in chk-col-purple"
                                                        name="Permission[]" id="user.create" value="user.create"
                                                        {{ in_array('user.create', $role_permissions) ? 'checked' : '' }}>
                                                    <label for="user.create">Create</label>
                                                    <br>
                                                    <input type="checkbox" class="filled-in chk-col-purple"
                                                        name="Permission[]" id="user.edit" value="user.edit"
                                                        {{ in_array('user.edit', $role_permissions) ? 'checked' : '' }}>
                                                    <label for="user.edit">Edit</label>
                                                    <br>
                                                    <input type="checkbox" class="filled-in chk-col-red"
                                                        name="Permission[]" id="user.delete" value="user.delete"
                                                        {{ in_array('user.delete', $role_permissions) ? 'checked' : '' }}>
                                                    <label for="user.delete">Delete</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="updateFormError alert text-red"></div>
                                        </div>

                                        <div class="col-md-12 ">
                                            <button class="btn btn-purple btn-sm float-right">Update Role</button>
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
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(res) {
                    $(".updateFormError").html('');
                    $.each(res.errors, function(key, value) {
                        $(".updateFormError").append('<small>*' + value + '</small><br>');
                    })
                    if (res.success) {
                        $(".updateFormError").append(res.success);
                        $(".updateFormError").delay(1000).hide();
                        toastInfo('Record Updated');
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
