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
                                            @can('role.permission')
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
                                                            id="role.permission" value="role.permission"
                                                            {{ in_array('role.permission', $role_permissions) ? 'checked' : '' }}>
                                                        <label for="role.permission">Can give permission to other roles</label>
                                                        <br>
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
                                            @endcan
                                            @can('menu.permission')
                                                <div class="col-md-6 row allPermissions">
                                                    <div class="col-md-4">
                                                        <h4>{{ __('Menu') }}</h4>
                                                        <br>
                                                        <input type="checkbox" class="filled-in chk-col-purple" id="menu.all"
                                                            onchange="select_check_box_all($(this))" value="menu">
                                                        <label for="menu.all">Select All</label>
                                                    </div>
                                                    <div class="col-md-8 menu">
                                                        <input type="checkbox" class="filled-in chk-col-red" name="Permission[]"
                                                            id="menu.permission" value="menu.permission"
                                                            {{ in_array('menu.permission', $role_permissions) ? 'checked' : '' }}>
                                                        <label for="menu.permission">Can give permission to other roles</label>
                                                        <br>
                                                        <input type="checkbox" class="filled-in chk-col-red" name="Permission[]"
                                                            id="menu.view" value="menu.view"
                                                            {{ in_array('menu.view', $role_permissions) ? 'checked' : '' }}>
                                                        <label for="menu.view">View</label>
                                                        <br>
                                                        <input type="checkbox" class="filled-in chk-col-red"
                                                            name="Permission[]" id="menu.create" value="menu.create"
                                                            {{ in_array('menu.create', $role_permissions) ? 'checked' : '' }}>
                                                        <label for="menu.create">Create</label>
                                                        <br>
                                                        <input type="checkbox" class="filled-in chk-col-red"
                                                            name="Permission[]" id="menu.edit" value="menu.edit"
                                                            {{ in_array('menu.edit', $role_permissions) ? 'checked' : '' }}>
                                                        <label for="menu.edit">Edit</label>
                                                        <br>
                                                        <input type="checkbox" class="filled-in chk-col-red"
                                                            name="Permission[]" id="menu.delete" value="menu.delete"
                                                            {{ in_array('menu.delete', $role_permissions) ? 'checked' : '' }}>
                                                        <label for="menu.delete">Delete</label>
                                                    </div>
                                                </div>
                                            @endcan
                                            <div class="col-md-12">
                                                <hr>
                                            </div>
                                            <div class="col-md-6 row allPermissions">
                                                <div class="col-md-4">
                                                    <h4>{{ __('Users') }}</h4>
                                                    <br>
                                                    <input type="checkbox" class="filled-in chk-col-purple"
                                                        id="user.all" onchange="select_check_box_all($(this))"
                                                        value="user">
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
                                            <div class="col-md-6 row allPermissions">
                                                <div class="col-md-4">
                                                    <h4>{{ __('Settings') }}</h4>
                                                    <br>
                                                    <input type="checkbox" class="filled-in chk-col-purple"
                                                        id="setting.all" onchange="select_check_box_all($(this))"
                                                        value="setting">
                                                    <label for="setting.all">Select All</label>
                                                </div>
                                                <div class="col-md-8 setting">
                                                    <br><br>
                                                    <input type="checkbox" class="filled-in chk-col-purple"
                                                        name="Permission[]" id="setting.view" value="setting.view"
                                                        {{ in_array('setting.view', $role_permissions) ? 'checked' : '' }}>
                                                    <label for="setting.view">View</label>
                                                    {{-- <br>
                                                    <input type="checkbox" class="filled-in chk-col-purple"
                                                        name="Permission[]" id="setting.create" value="setting.create"
                                                        {{ in_array('setting.create', $role_permissions) ? 'checked' : '' }}>
                                                    <label for="setting.create">Create</label> --}}
                                                    <br>
                                                    <input type="checkbox" class="filled-in chk-col-red"
                                                        name="Permission[]" id="setting.edit" value="setting.edit"
                                                        {{ in_array('setting.edit', $role_permissions) ? 'checked' : '' }}>
                                                    <label for="setting.edit">Edit</label>
                                                    {{-- <br>
                                                    <input type="checkbox" class="filled-in chk-col-red"
                                                        name="Permission[]" id="setting.delete" value="setting.delete"
                                                        {{ in_array('setting.delete', $role_permissions) ? 'checked' : '' }}>
                                                    <label for="setting.delete">Delete</label> --}}
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <hr>
                                            </div>
                                            <div class="col-md-6 row allPermissions">
                                                <div class="col-md-4">
                                                    <h4>{{ __('Project Categories') }}</h4>
                                                    <br>
                                                    <input type="checkbox" class="filled-in chk-col-purple"
                                                        id="project-category.all" onchange="select_check_box_all($(this))"
                                                        value="project-category">
                                                    <label for="project-category.all">Select All</label>
                                                </div>
                                                <div class="col-md-8 project-category">
                                                    <input type="checkbox" class="filled-in chk-col-purple"
                                                        name="Permission[]" id="project-category.view"
                                                        value="project-category.view"
                                                        {{ in_array('project-category.view', $role_permissions) ? 'checked' : '' }}>
                                                    <label for="project-category.view">View</label>
                                                    <br>
                                                    <input type="checkbox" class="filled-in chk-col-purple"
                                                        name="Permission[]" id="project-category.create"
                                                        value="project-category.create"
                                                        {{ in_array('project-category.create', $role_permissions) ? 'checked' : '' }}>
                                                    <label for="project-category.create">Create</label>
                                                    <br>
                                                    <input type="checkbox" class="filled-in chk-col-purple"
                                                        name="Permission[]" id="project-category.edit"
                                                        value="project-category.edit"
                                                        {{ in_array('project-category.edit', $role_permissions) ? 'checked' : '' }}>
                                                    <label for="project-category.edit">Edit</label>
                                                    <br>
                                                    <input type="checkbox" class="filled-in chk-col-purple"
                                                        name="Permission[]" id="project-category.delete"
                                                        value="project-category.delete"
                                                        {{ in_array('project-category.delete', $role_permissions) ? 'checked' : '' }}>
                                                    <label for="project-category.delete">Delete</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6 row allPermissions">
                                                <div class="col-md-4">
                                                    <h4>{{ __('Projects') }}</h4>
                                                    <br>
                                                    <input type="checkbox" class="filled-in chk-col-purple"
                                                        id="project.all" onchange="select_check_box_all($(this))"
                                                        value="project">
                                                    <label for="project.all">Select All</label>
                                                </div>
                                                <div class="col-md-8 project">
                                                    <input type="checkbox" class="filled-in chk-col-purple"
                                                        name="Permission[]" id="project.view" value="project.view"
                                                        {{ in_array('project.view', $role_permissions) ? 'checked' : '' }}>
                                                    <label for="project.view">View</label>
                                                    <br>
                                                    <input type="checkbox" class="filled-in chk-col-purple"
                                                        name="Permission[]" id="project.create" value="project.create"
                                                        {{ in_array('project.create', $role_permissions) ? 'checked' : '' }}>
                                                    <label for="project.create">Create</label>
                                                    <br>
                                                    <input type="checkbox" class="filled-in chk-col-purple"
                                                        name="Permission[]" id="project.edit" value="project.edit"
                                                        {{ in_array('project.edit', $role_permissions) ? 'checked' : '' }}>
                                                    <label for="project.edit">Edit</label>
                                                    <br>
                                                    <input type="checkbox" class="filled-in chk-col-purple"
                                                        name="Permission[]" id="project.delete" value="project.delete"
                                                        {{ in_array('project.delete', $role_permissions) ? 'checked' : '' }}>
                                                    <label for="project.delete">Delete</label>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <hr>
                                            </div>
                                      
                                            <div class="col-md-6 row allPermissions">
                                                <div class="col-md-4">
                                                    <h4>{{ __('Services') }}</h4>
                                                    <br>
                                                    <input type="checkbox" class="filled-in chk-col-purple"
                                                        id="service.all" onchange="select_check_box_all($(this))"
                                                        value="service">
                                                    <label for="service.all">Select All</label>
                                                </div>
                                                <div class="col-md-8 service">
                                                    <input type="checkbox" class="filled-in chk-col-purple"
                                                        name="Permission[]" id="service.view" value="service.view"
                                                        {{ in_array('service.view', $role_permissions) ? 'checked' : '' }}>
                                                    <label for="service.view">View</label>
                                                    <br>
                                                    <input type="checkbox" class="filled-in chk-col-purple"
                                                        name="Permission[]" id="service.create" value="service.create"
                                                        {{ in_array('service.create', $role_permissions) ? 'checked' : '' }}>
                                                    <label for="service.create">Create</label>
                                                    <br>
                                                    <input type="checkbox" class="filled-in chk-col-purple"
                                                        name="Permission[]" id="service.edit" value="service.edit"
                                                        {{ in_array('service.edit', $role_permissions) ? 'checked' : '' }}>
                                                    <label for="service.edit">Edit</label>
                                                    <br>
                                                    <input type="checkbox" class="filled-in chk-col-purple"
                                                        name="Permission[]" id="service.delete" value="service.delete"
                                                        {{ in_array('service.delete', $role_permissions) ? 'checked' : '' }}>
                                                    <label for="service.delete">Delete</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6 row allPermissions">
                                                <div class="col-md-4">
                                                    <h4>{{ __('Blog Categories') }}</h4>
                                                    <br>
                                                    <input type="checkbox" class="filled-in chk-col-purple"
                                                        id="blog-category.all" onchange="select_check_box_all($(this))"
                                                        value="blog-category">
                                                    <label for="blog-category.all">Select All</label>
                                                </div>
                                                <div class="col-md-8 blog-category">
                                                    <input type="checkbox" class="filled-in chk-col-purple"
                                                        name="Permission[]" id="blog-category.view"
                                                        value="blog-category.view"
                                                        {{ in_array('blog-category.view', $role_permissions) ? 'checked' : '' }}>
                                                    <label for="blog-category.view">View</label>
                                                    <br>
                                                    <input type="checkbox" class="filled-in chk-col-purple"
                                                        name="Permission[]" id="blog-category.create"
                                                        value="blog-category.create"
                                                        {{ in_array('blog-category.create', $role_permissions) ? 'checked' : '' }}>
                                                    <label for="blog-category.create">Create</label>
                                                    <br>
                                                    <input type="checkbox" class="filled-in chk-col-purple"
                                                        name="Permission[]" id="blog-category.edit"
                                                        value="blog-category.edit"
                                                        {{ in_array('blog-category.edit', $role_permissions) ? 'checked' : '' }}>
                                                    <label for="blog-category.edit">Edit</label>
                                                    <br>
                                                    <input type="checkbox" class="filled-in chk-col-purple"
                                                        name="Permission[]" id="blog-category.delete"
                                                        value="blog-category.delete"
                                                        {{ in_array('blog-category.delete', $role_permissions) ? 'checked' : '' }}>
                                                    <label for="blog-category.delete">Delete</label>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <hr>
                                            </div>
                                        
                                            <div class="col-md-6 row allPermissions">
                                                <div class="col-md-4">
                                                    <h4>{{ __('Blogs') }}</h4>
                                                    <br>
                                                    <input type="checkbox" class="filled-in chk-col-purple"
                                                        id="blog.all" onchange="select_check_box_all($(this))"
                                                        value="blog">
                                                    <label for="blog.all">Select All</label>
                                                </div>
                                                <div class="col-md-8 blog">
                                                    <input type="checkbox" class="filled-in chk-col-purple"
                                                        name="Permission[]" id="blog.view" value="blog.view"
                                                        {{ in_array('blog.view', $role_permissions) ? 'checked' : '' }}>
                                                    <label for="blog.view">View</label>
                                                    <br>
                                                    <input type="checkbox" class="filled-in chk-col-purple"
                                                        name="Permission[]" id="blog.create" value="blog.create"
                                                        {{ in_array('blog.create', $role_permissions) ? 'checked' : '' }}>
                                                    <label for="blog.create">Create</label>
                                                    <br>
                                                    <input type="checkbox" class="filled-in chk-col-purple"
                                                        name="Permission[]" id="blog.edit" value="blog.edit"
                                                        {{ in_array('blog.edit', $role_permissions) ? 'checked' : '' }}>
                                                    <label for="blog.edit">Edit</label>
                                                    <br>
                                                    <input type="checkbox" class="filled-in chk-col-purple"
                                                        name="Permission[]" id="blog.delete" value="blog.delete"
                                                        {{ in_array('blog.delete', $role_permissions) ? 'checked' : '' }}>
                                                    <label for="blog.delete">Delete</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6 row allPermissions">
                                                <div class="col-md-4">
                                                    <h4>{{ __('Jobs') }}</h4>
                                                    <br>
                                                    <input type="checkbox" class="filled-in chk-col-purple"
                                                        id="job.all" onchange="select_check_box_all($(this))"
                                                        value="job">
                                                    <label for="job.all">Select All</label>
                                                </div>
                                                <div class="col-md-8 job">
                                                    <input type="checkbox" class="filled-in chk-col-purple"
                                                        name="Permission[]" id="job.view" value="job.view"
                                                        {{ in_array('job.view', $role_permissions) ? 'checked' : '' }}>
                                                    <label for="job.view">View</label>
                                                    <br>
                                                    <input type="checkbox" class="filled-in chk-col-purple"
                                                        name="Permission[]" id="job.create" value="job.create"
                                                        {{ in_array('job.create', $role_permissions) ? 'checked' : '' }}>
                                                    <label for="job.create">Create</label>
                                                    <br>
                                                    <input type="checkbox" class="filled-in chk-col-purple"
                                                        name="Permission[]" id="job.edit" value="job.edit"
                                                        {{ in_array('job.edit', $role_permissions) ? 'checked' : '' }}>
                                                    <label for="job.edit">Edit</label>
                                                    <br>
                                                    <input type="checkbox" class="filled-in chk-col-purple"
                                                        name="Permission[]" id="job.delete" value="job.delete"
                                                        {{ in_array('job.delete', $role_permissions) ? 'checked' : '' }}>
                                                    <label for="job.delete">Delete</label>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <hr>
                                            </div>
                                      
                                  
                                            <div class="col-md-6 row allPermissions">
                                                <div class="col-md-4">
                                                    <h4>{{ __('Job Categories') }}</h4>
                                                    <br>
                                                    <input type="checkbox" class="filled-in chk-col-purple"
                                                        id="job-category.all" onchange="select_check_box_all($(this))"
                                                        value="job-category">
                                                    <label for="job-category.all">Select All</label>
                                                </div>
                                                <div class="col-md-8 job-category">
                                                    <input type="checkbox" class="filled-in chk-col-purple"
                                                        name="Permission[]" id="job-category.view"
                                                        value="job-category.view"
                                                        {{ in_array('job-category.view', $role_permissions) ? 'checked' : '' }}>
                                                    <label for="job-category.view">View</label>
                                                    <br>
                                                    <input type="checkbox" class="filled-in chk-col-purple"
                                                        name="Permission[]" id="job-category.create"
                                                        value="job-category.create"
                                                        {{ in_array('job-category.create', $role_permissions) ? 'checked' : '' }}>
                                                    <label for="job-category.create">Create</label>
                                                    <br>
                                                    <input type="checkbox" class="filled-in chk-col-purple"
                                                        name="Permission[]" id="job-category.edit"
                                                        value="job-category.edit"
                                                        {{ in_array('job-category.edit', $role_permissions) ? 'checked' : '' }}>
                                                    <label for="job-category.edit">Edit</label>
                                                    <br>
                                                    <input type="checkbox" class="filled-in chk-col-purple"
                                                        name="Permission[]" id="job-category.delete"
                                                        value="job-category.delete"
                                                        {{ in_array('job-category.delete', $role_permissions) ? 'checked' : '' }}>
                                                    <label for="job-category.delete">Delete</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6 row allPermissions">
                                                <div class="col-md-4">
                                                    <h4>{{ __('Job Applications') }}</h4>
                                                    <br>
                                                    <input type="checkbox" class="filled-in chk-col-purple"
                                                        id="job-application.all" onchange="select_check_box_all($(this))"
                                                        value="job-application">
                                                    <label for="job-application.all">Select All</label>
                                                </div>
                                                <div class="col-md-8 job-application">
                                                    <br><br>
                                                    <input type="checkbox" class="filled-in chk-col-purple"
                                                        name="Permission[]" id="job-application.view"
                                                        value="job-application.view"
                                                        {{ in_array('job-application.view', $role_permissions) ? 'checked' : '' }}>
                                                    <label for="job-application.view">View</label>
                                                    <br>
                                                    {{-- <input type="checkbox" class="filled-in chk-col-purple"
                                                        name="Permission[]" id="job-application.create"
                                                        value="job-application.create"
                                                        {{ in_array('job-application.create', $role_permissions) ? 'checked' : '' }}>
                                                    <label for="job-application.create">Create</label>
                                                    <br>
                                                    <input type="checkbox" class="filled-in chk-col-purple"
                                                        name="Permission[]" id="job-application.edit"
                                                        value="job-application.edit"
                                                        {{ in_array('job-application.edit', $role_permissions) ? 'checked' : '' }}>
                                                    <label for="job-application.edit">Edit</label>
                                                    <br> --}}
                                                    <input type="checkbox" class="filled-in chk-col-purple"
                                                        name="Permission[]" id="job-application.delete"
                                                        value="job-application.delete"
                                                        {{ in_array('job-application.delete', $role_permissions) ? 'checked' : '' }}>
                                                    <label for="job-application.delete">Delete</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6 row allPermissions">
                                                <div class="col-md-4">
                                                    <h4>{{ __('Journey') }}</h4>
                                                    <br>
                                                    <input type="checkbox" class="filled-in chk-col-purple"
                                                        id="journey.all" onchange="select_check_box_all($(this))"
                                                        value="journey">
                                                    <label for="journey.all">Select All</label>
                                                </div>
                                                <div class="col-md-8 journey">
                                                    <br><br>
                                                    <input type="checkbox" class="filled-in chk-col-purple"
                                                        name="Permission[]" id="journey.view"
                                                        value="journey.view"
                                                        {{ in_array('journey.view', $role_permissions) ? 'checked' : '' }}>
                                                    <label for="journey.view">View</label>
                                                    <br>
                                                    <input type="checkbox" class="filled-in chk-col-purple"
                                                        name="Permission[]" id="journey.create"
                                                        value="journey.create"
                                                        {{ in_array('journey.create', $role_permissions) ? 'checked' : '' }}>
                                                    <label for="journey.create">Create</label>
                                                    <br>
                                                    <input type="checkbox" class="filled-in chk-col-purple"
                                                        name="Permission[]" id="journey.edit"
                                                        value="journey.edit"
                                                        {{ in_array('journey.edit', $role_permissions) ? 'checked' : '' }}>
                                                    <label for="journey.edit">Edit</label>
                                                    <br>
                                                    <input type="checkbox" class="filled-in chk-col-purple"
                                                        name="Permission[]" id="journey.delete"
                                                        value="journey.delete"
                                                        {{ in_array('journey.delete', $role_permissions) ? 'checked' : '' }}>
                                                    <label for="journey.delete">Delete</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6 row allPermissions">
                                                <div class="col-md-4">
                                                    <h4>{{ __('Company') }}</h4>
                                                    <br>
                                                    <input type="checkbox" class="filled-in chk-col-purple"
                                                        id="company.all" onchange="select_check_box_all($(this))"
                                                        value="company">
                                                    <label for="company.all">Select All</label>
                                                </div>
                                                <div class="col-md-8 company">
                                                    <br><br>
                                                    <input type="checkbox" class="filled-in chk-col-purple"
                                                        name="Permission[]" id="company.view"
                                                        value="company.view"
                                                        {{ in_array('company.view', $role_permissions) ? 'checked' : '' }}>
                                                    <label for="company.view">View</label>
                                                    <br>
                                                    <input type="checkbox" class="filled-in chk-col-purple"
                                                        name="Permission[]" id="company.create"
                                                        value="company.create"
                                                        {{ in_array('company.create', $role_permissions) ? 'checked' : '' }}>
                                                    <label for="company.create">Create</label>
                                                    <br>
                                                    <input type="checkbox" class="filled-in chk-col-purple"
                                                        name="Permission[]" id="company.edit"
                                                        value="company.edit"
                                                        {{ in_array('company.edit', $role_permissions) ? 'checked' : '' }}>
                                                    <label for="company.edit">Edit</label>
                                                    <br>
                                                    <input type="checkbox" class="filled-in chk-col-purple"
                                                        name="Permission[]" id="company.delete"
                                                        value="company.delete"
                                                        {{ in_array('company.delete', $role_permissions) ? 'checked' : '' }}>
                                                    <label for="company.delete">Delete</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6 row allPermissions">
                                                <div class="col-md-4">
                                                    <h4>{{ __('Leads') }}</h4>
                                                    <br>
                                                    <input type="checkbox" class="filled-in chk-col-purple"
                                                        id="quotation.all" onchange="select_check_box_all($(this))"
                                                        value="quotation">
                                                    <label for="quotation.all">Select All</label>
                                                </div>
                                                <div class="col-md-8 quotation">
                                                    <br><br>
                                                    <input type="checkbox" class="filled-in chk-col-purple"
                                                        name="Permission[]" id="quotation.view"
                                                        value="quotation.view"
                                                        {{ in_array('quotation.view', $role_permissions) ? 'checked' : '' }}>
                                                    <label for="quotation.view">View</label>
                                                    <br>
                                                    <input type="checkbox" class="filled-in chk-col-purple"
                                                        name="Permission[]" id="quotation.create"
                                                        value="quotation.create"
                                                        {{ in_array('quotation.create', $role_permissions) ? 'checked' : '' }}>
                                                    <label for="quotation.create">Create</label>
                                                    <br>
                                                    <input type="checkbox" class="filled-in chk-col-purple"
                                                        name="Permission[]" id="quotation.edit"
                                                        value="quotation.edit"
                                                        {{ in_array('quotation.edit', $role_permissions) ? 'checked' : '' }}>
                                                    <label for="quotation.edit">Edit</label>
                                                    <br>
                                                    <input type="checkbox" class="filled-in chk-col-purple"
                                                        name="Permission[]" id="quotation.delete"
                                                        value="quotation.delete"
                                                        {{ in_array('quotation.delete', $role_permissions) ? 'checked' : '' }}>
                                                    <label for="quotation.delete">Delete</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6 row allPermissions">
                                                <div class="col-md-4">
                                                    <h4>{{ __('About Details') }}</h4>
                                                    <br>
                                                    <input type="checkbox" class="filled-in chk-col-purple"
                                                        id="aboutus-edits.all" onchange="select_check_box_all($(this))"
                                                        value="aboutus-edits">
                                                    <label for="aboutus-edits.all">Select All</label>
                                                </div>
                                                <div class="col-md-8 aboutus-edits">
                                                    <br><br>
                                                    <input type="checkbox" class="filled-in chk-col-purple"
                                                        name="Permission[]" id="aboutus-edits.view"
                                                        value="aboutus-edits.view"
                                                        {{ in_array('aboutus-edits.view', $role_permissions) ? 'checked' : '' }}>
                                                    <label for="aboutus-edits.view">View</label>
                                                    <br>
                                                    <input type="checkbox" class="filled-in chk-col-purple"
                                                        name="Permission[]" id="aboutus-edits.create"
                                                        value="aboutus-edits.create"
                                                        {{ in_array('aboutus-edits.create', $role_permissions) ? 'checked' : '' }}>
                                                    <label for="aboutus-edits.create">Create</label>
                                                    <br>
                                                    <input type="checkbox" class="filled-in chk-col-purple"
                                                        name="Permission[]" id="aboutus-edits.edit"
                                                        value="aboutus-edits.edit"
                                                        {{ in_array('aboutus-edits.edit', $role_permissions) ? 'checked' : '' }}>
                                                    <label for="aboutus-edits.edit">Edit</label>
                                                    <br>
                                                    <input type="checkbox" class="filled-in chk-col-purple"
                                                        name="Permission[]" id="aboutus-edits.delete"
                                                        value="aboutus-edits.delete"
                                                        {{ in_array('aboutus-edits.delete', $role_permissions) ? 'checked' : '' }}>
                                                    <label for="aboutus-edits.delete">Delete</label>
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
