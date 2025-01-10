@extends('admin.layout.main-layout')

@section('content')
    @php
        $data_route = route('job.datatable');
        $store_url = route('job.store');
        $destroy_url = route('job.destroy', 11);
        $update_url = route('job.update', 11);
        $heading = 'Add job';
    @endphp
    <div class="content-wrapper">
        <section class="content-header">

            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i>
                        {{ __('Dashboard') }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('job.index') }}"><i class="fa fa-list"></i>
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
                                        <label>{{ __('Title') }}</label>
                                        <input type="text" class="form-control form-control-sm" name="title">
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label>{{ __('Slug') }}</label>
                                        <input type="text" class="form-control form-control-sm" name="slug">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="">Category</label>
                                        <select name="category_id" class="form-control form-control-sm">
                                            {{ App\Helpers\Helper::getOptions([
                                                'table' => 'job_categories',
                                                'value' => 'title',
                                                'key' => 'id',
                                            ]) }}
                                        </select>
                                    </div>


                                    <div class="col-md-12">
                                        <hr>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="pagetitle">Page Title </label>
                                        <input type="text" name="page_title" id="page_title"
                                            class="form-control form-control-sm" maxlength="80">
                                        <p style="color: red; font-size: 12px">Char Count:<span id="charCount">0</span>/80
                                        </p>

                                    </div>

                                    {{-- <div class="col-md-4">
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
                                    </div> --}}
                                    <div class="col-md-12">
                                        <hr>
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label for="location">Location</label>
                                        <input type="text" name="location" placeholder="City/Branch"
                                            class="form-control form-control-sm">
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label for="salary">Salary</label>
                                        <input type="text" name="salary" placeholder="Rs.20000 - 500000"
                                            class="form-control form-control-sm">
                                    </div>

                                    <div class="col-md-4 form-group">
                                        <label for="department">Department</label>
                                        <input type="text" name="department" class="form-control form-control-sm">
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label for="type">Type</label>
                                        <input type="text" name="type" placeholder="i.e Permanent"
                                            class="form-control form-control-sm">
                                    </div>

                                    <div class="col-md-4">
                                        <label for="positions">Positions</label>
                                        <input type="text" name="positions" placeholder="Number of posts"
                                            class="form-control form-control-sm">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="level">Level</label>
                                        <input type="text" name="level" placeholder="i.e Professional / Internee"
                                            class="form-control form-control-sm">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="experience">Experience Required</label>
                                        <input type="text" name="experience" placeholder="i.e 6 Months to 1 Year"
                                            class="form-control form-control-sm">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="education">Education</label>
                                        <input type="text" name="education" placeholder="i.e Graduation"
                                            class="form-control form-control-sm">
                                    </div>

                                    <div class="col-md-12 my-2">
                                        <textarea id="editor" cols="30" rows="10">
                                        <p class="body-txt1 txt--clr mb-1">Replace this dummy job description with yours</p>

                                        <p class="body-txt1 txt--clr mb-4">Arcu fringilla fringilla imperdiet feugiat proin odio viverra. Id eget non pulvinar nibh ut turpis cras. Sed urna semper cursus nec ipsum diam ipsum donec dui. Nulla viverra nulla velit amet tellus. Ut massa tellus non aenean sed pharetra fusce id. Pharetra quam integer adipiscing nascetur. Sociis felis augue dapibus nunc diam adipiscing vitae tellus. Malesuada bibendum dictum morbi ac venenatis. Quis morbi vitae vulputate scelerisque cursus in ac quis molestie. Nibh arcu consectetur congue placerat platea id. Id mi quam at arcu netus. Amet urna tempor augue pharetra id. Enim etiam leo eleifend scelerisque.</p>
                                    <p class="body-txt1 txt--clr mb-4">Sed rhoncus dolor ac at scelerisque egestas aliquet placerat purus. Id pretium non imperdiet hendrerit posuere sed viverra accumsan vulputate. Id dis dignissim sagittis pulvinar dolor elementum in orci nibh. Ipsum dui convallis curabitur nunc. At id nec bibendum iaculis curabitur eu arcu tellus id.</p>

                                    <h3 class="head--3 secondary--clr">Responsibilities</h3>

                                    <p class="body-txt1 txt--clr mb-1">Lorem ipsum dolor sit amet consectetur. Eget interdum quis morbi pretium a quis facilisi scelerisque ullamcorper. Risus bibendum pretium risus nunc. Venenatis massa arcu interdum luctus. Et sit elementum risus cum massa volutpat amet aliquet.</p>

                                    <p class="body-txt1 txt--clr mb-4">Arcu fringilla fringilla imperdiet feugiat proin odio viverra. Id eget non pulvinar nibh ut turpis cras. Sed urna semper cursus nec ipsum diam ipsum donec dui. Nulla viverra nulla velit amet tellus. Ut massa tellus non aenean sed pharetra fusce id. Pharetra quam integer adipiscing nascetur. Sociis felis augue dapibus nunc diam adipiscing vitae tellus. Malesuada bibendum dictum morbi ac venenatis. Quis morbi vitae vulputate scelerisque cursus in ac quis molestie. Nibh arcu consectetur congue placerat platea id. Id mi quam at arcu netus. Amet urna tempor augue pharetra id. Enim etiam leo eleifend scelerisque.</p>

                                    <p class="body-txt1 txt--clr mb-4">Sed rhoncus dolor ac at scelerisque egestas aliquet placerat purus. Id pretium non imperdiet hendrerit posuere sed viverra accumsan vulputate. Id dis dignissim sagittis pulvinar dolor elementum in orci nibh. Ipsum dui convallis curabitur nunc. At id nec bibendum iaculis curabitur eu arcu tellus id.</p>

                                    <h3 class="head--3 secondary--clr">Job Requirements</h3>

                                    <p class="body-txt1 txt--clr mb-4">Lorem ipsum dolor sit amet consectetur. Eget interdum quis morbi pretium a quis facilisi scelerisque ullamcorper. Risus bibendum pretium risus nunc. Venenatis massa arcu interdum luctus. Et sit elementum risus cum massa volutpat amet aliquet.</p>

                                    <ul>
                                        <li class="body-txt1 txt--clr mb-4">Sed rhoncus dolor ac at scelerisque egestas aliquet placerat purus. Id pretium non imperdiet hendrerit posuere sed viverra accumsan vulputate.</li>
                                        <li class="body-txt1 txt--clr mb-4">Id dis dignissim sagittis pulvinar dolor elementum in orci nibh. Ipsum dui convallis curabitur nunc. At id nec bibendum iaculis curabitur eu arcu tellus id.</li>
                                        <li class="body-txt1 txt--clr mb-4">Sed rhoncus dolor ac at scelerisque egestas aliquet placerat purus. Id pretium non imperdiet hendrerit posuere sed viverra accumsan vulputate.</li>
                                    </ul>
                                        </textarea>
                                    </div>

                                    <div class="col-md-4 form-group">
                                        <label>{{ __('Advertisement Image') }}</label>
                                        <input type="file" name="image" id="filez1" class="filez1"
                                            data-max-file-size="1M"
                                            data-allowed-file-extensions="jpeg png jpg gif svg webp">
                                    </div>

                                    <div class="col-md-4 form-group">
                                        <label>{{ __('Header Image') }}</label>
                                        <input type="file" name="header_image" class="filez1" data-max-file-size="1M"
                                            data-allowed-file-extensions="jpeg png jpg gif svg webp">
                                    </div>

                                    {{-- <div class="col-md-3 form-group">
                                        <label>{{ __('OG Image') }}</label>
                                        <input type="file" name="file4" id="filez4" class="filez1"
                                            data-max-file-size="1M"
                                            data-allowed-file-extensions="jpeg png jpg gif svg webp">
                                    </div> --}}
                                    <div class="col-md-4 form-group">
                                        <label for="status">Status</label>
                                        <select name="status" class="form-control form-control-sm">
                                            <option value="active">Active</option>
                                            <option value="in-active">In-active</option>
                                        </select>
                                        <br>
                                        <label for="apply_before">Apply before</label>
                                        <input type="date" name="apply_before" class="form-control form-control-sm">
                                        <br>
                                        <span class="">
                                            <input type="checkbox" id="search_engine" name="search_engine"
                                                class="filled-in chk-col-purple" checked />
                                            <label for="search_engine">Discourage search engines from indexing </label>
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
    <script type="text/javascript">
        $(".filez1").dropify();

        function form_validation() {

            $(".addFormError").show();
            $(".addFormError").html("<strong><i class='fa fa-spin fa-spinner fa-2x fa-fw'></i> Loading....</strong>");
            var form = new FormData($('#addForm')[0]);
            form.append('contents', editor.getData());

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
                        location.href = "{{ route('job.index') }}";
                    }

                },
                error: function(xhr, ajaxOptions, thrownError) {
                    toastError(thrownError);
                    toastError(xhr.responseJSON.message)
                }

            });
            return false;
        }


        var editor = CKEDITOR.replace('editor', {
            filebrowserUploadUrl: "{{ route('upload', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form',
            baseFloatZIndex: 10005,
            allowedContent: true,
            font_names: 'Avenir;Avenir Next;Gill Sans MT;Calibri;Arial;Comic Sans Ms;Courier New;Georgia;Lucida Sans Unicode;Tahoma;Times New Roman;Trebochet MS;Verdana;'

        });
    </script>
@endsection
