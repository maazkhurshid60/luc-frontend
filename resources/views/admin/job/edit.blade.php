@extends('admin.layout.main-layout')

@section('content')
    @php
        $data_route = route('job.datatable');
        $store_url = route('job.store');
        $destroy_url = route('job.destroy', 11);
        $update_url = route('job.update', 11);
        $heading = 'Update Job';
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
                            <form method="POST" id="updateForm" enctype="multipart/form-data"
                                onsubmit="return update_validation()">
                                @method('PUT')
                                @csrf
                                <input type="hidden" name="id" value="{{ $data->id }}">
                                <div class=" row">
                                    <div class="col-md-8 form-group">
                                        <label>{{ __('Title') }} :</label>
                                        <input type="text" value="{{ $data->title }}"
                                            class="form-control form-control-sm" name="title">
                                    </div>

                                    <div class="col-md-4">
                                        <label for="">Category</label>
                                        <select name="category_id" class="form-control form-control-sm">
                                            {{ App\Helpers\Helper::getOptions([
                                                'table' => 'job_categories',
                                                'value' => 'title',
                                                'key' => 'id',
                                                'select' => $data->category_id,
                                            ]) }}
                                        </select>
                                    </div>

                                    <div class="col-md-12">
                                        <hr>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="pagetitle">Page Title</label>
                                        <input type="text" name="page_title" id="page_title" maxlength="80"
                                            value="{{ $data->page_title }}" class="form-control form-control-sm">
                                        <p style="color: red; font-size: 12px">Char Count: <span
                                                id="charCount">{{ strlen($data->page_title) }}</span>/80</p>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="meta_keywords">Meta Keywords</label>
                                        <input type="text" name="meta_keywords" id="meta_keywords"
                                            value="{{ $data->meta_keywords }}" class="form-control form-control-sm">
                                    </div>

                                    <div class="col-md-4 form-group">
                                        <label for="meta_description">Meta Description</label>
                                        <input type="text" name="meta_description" id="meta_description" maxlength="180"
                                            value="{{ $data->meta_description }}" class="form-control form-control-sm">
                                        <p style="color: red; font-size: 12px">Char Count: <span
                                                id="descriptionCharCount">{{ strlen($data->meta_description) }}</span>/180
                                        </p>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="og_title">OG Title</label>
                                        <input type="text" name="og_title" id="og_title" value="{{ $data->og_title }}"
                                            class="form-control form-control-sm">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="og_description">OG Description</label>
                                        <input type="text" name="og_description" id="og_description"
                                            value="{{ $data->og_description }}" class="form-control form-control-sm">
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label for="og_type">OG Type</label>
                                        <input type="text" name="og_type" id="og_type" value="{{ $data->og_type }}"
                                            class="form-control form-control-sm">
                                    </div>
                                    <div class="col-md-12">
                                        <hr>
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label for="location">Location</label>
                                        <input type="text" name="location" value="{{ $data->location }}"
                                            placeholder="City/Branch" class="form-control form-control-sm">
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label for="salary">Salary</label>
                                        <input type="text" name="salary" value="{{ $data->salary }}"
                                            placeholder="Rs.20000 - 500000" class="form-control form-control-sm">
                                    </div>

                                    <div class="col-md-4 form-group">
                                        <label for="department">Department</label>
                                        <input type="text" name="department" value="{{ $data->department }}"
                                            class="form-control form-control-sm">
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label for="type">Type</label>
                                        <input type="text" name="type" value="{{ $data->type }}"
                                            placeholder="i.e Permanent" class="form-control form-control-sm">
                                    </div>

                                    <div class="col-md-4">
                                        <label for="positions">Positions</label>
                                        <input type="text" name="positions" value="{{ $data->positions }}"
                                            placeholder="Number of posts" class="form-control form-control-sm">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="level">Level</label>
                                        <input type="text" name="level" value="{{ $data->level }}"
                                            placeholder="i.e Professional / Internee"
                                            class="form-control form-control-sm">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="experience">Experience Required</label>
                                        <input type="text" name="experience" value="{{ $data->experience }}"
                                            placeholder="i.e 6 Months to 1 Year" class="form-control form-control-sm">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="education">Education</label>
                                        <input type="text" name="education" value="{{ $data->education }}"
                                            placeholder="i.e Graduation" class="form-control form-control-sm">
                                    </div>
                                    <div class="col-md-12 my-2">
                                        <textarea id="editor" cols="30" rows="10">@php
                                            echo $data->contents;
                                        @endphp</textarea>
                                    </div>
                                    <div class="col-md-3">
                                        <label>{{ __('Image') }}</label>
                                        <input type="file" name="image"
                                            data-default-file="{{ asset('storage/images/' . $data->file) }}"
                                            id="filez1" class="filez1" data-max-file-size="1M"
                                            data-allowed-file-extensions="jpeg png jpg gif svg webp">
                                    </div>

                                    <div class="col-md-3 form-group">
                                        <label>{{ __('Header Image') }}</label>
                                        <input type="file" name="header_image"
                                            data-default-file="{{ asset('storage/images/' . $data->header_image) }}"
                                            class="filez1" data-max-file-size="1M"
                                            data-allowed-file-extensions="jpeg png jpg gif svg webp">
                                    </div>

                                    <div class="col-md-3">
                                        <label>{{ __('OG Image') }}</label>
                                        <input type="file" name="file4"
                                            data-default-file="{{ asset('storage/images/' . $data->og_image) }}"
                                            id="filez4" class="filez1" data-max-file-size="1M"
                                            data-allowed-file-extensions="jpeg png jpg gif svg webp">
                                    </div>

                                    <div class="col-md-3">
                                        <label for="status">Status</label>
                                        <select name="status" class="form-control form-control-sm">
                                            <option @if ($data->status == 'active') selected @endif>Active</option>
                                            <option @if ($data->status == 'in-active') selected @endif>In-active</option>
                                        </select>

                                        <br>
                                        <label for="apply_before">Apply before</label>
                                        <input type="date" name="apply_before" value="{{ $data->apply_before }}"
                                            class="form-control form-control-sm">
                                        <br>
                                        <span class="">
                                            <input type="checkbox" id="search_engine" name="search_engine"
                                                class="filled-in chk-col-purple"
                                                {{ $data->search_engine == '1' ? 'checked' : '' }} />
                                            <label for="search_engine">Discourage search engines from indexing </label>
                                        </span>
                                    </div>
                                    <div class="col-md-12">
                                        <br>
                                        <div class="alert alert-danger updateFormError" style="display: none;"></div>
                                        <button type="submit"
                                            class="btn btn-primary waves-effect text-left btn-sm float-right">Update
                                            Data</button>
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

        function update_validation() {

            $(".updateFormError").show();
            $(".updateFormError").html("<strong><i class='fa fa-spin fa-spinner fa-2x fa-fw'></i> Loading....</strong>");
            var form = new FormData($('#updateForm')[0]);
            form.append('contents', editor.getData());

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
