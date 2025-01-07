@extends('admin.layout.main-layout')

@section('content')
    @php
        $data_route = route('announcement.datatable');
        $store_url = route('announcement.store');
        $destroy_url = route('announcement.destroy', $data->id);
        $update_url = route('announcement.update', $data->id);
        $heading = 'Update Announcement';
    @endphp
    <div class="content-wrapper">
        <section class="content-header">

            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i>
                        {{ __('Dashboard') }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('announcement.index') }}"><i class="fa fa-list"></i>
                        {{ __('Announcement List') }}</a></li>

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
                                <input type="hidden" name="lang" value="{{ $lang }}">

                                <div class=" row">
                                    <div class="col-md-12 form-group">
                                        <label>{{ __('Title') }} <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control form-control-sm" name="title"
                                            value="{{ $data->title }}">
                                    </div>
                                    <div class="col-md-12 my-2">
                                        <textarea id="description" cols="30" rows="10">
                                            {{ $data->description }}
                                        </textarea>
                                    </div>
                                    <div class="col-md-6">
                                        <label>{{ __('Image') }} <span class="text-danger">*</span></label>
                                        <input type="file" name="file" id="filez1" class="filez1"
                                            data-default-file="{{ asset('storage/images/' . $data->image) }}"
                                            data-max-file-size="1M"
                                            data-allowed-file-extensions="jpeg png jpg gif svg webp">
                                    </div>
                                    <div class="col-md-6" style="margin-top: 2%;">

                                        <span class="">
                                            <input type="checkbox" id="search_engine" name="search_engine"
                                                class="filled-in chk-col-purple"
                                                {{ $data->search_engine == '1' ? 'checked' : '' }} />
                                            <label for="search_engine">Discourage search engines from indexing </label>
                                        </span>
                                        <br>
                                        <label for="status">Status</label>
                                        <select name="status" class="form-control form-control-sm">
                                            <option value="active">Active</option>
                                            <option value="in-active">In-active</option>
                                        </select>
                                        <br>
                                        <label for="type">Type</label>
                                        <input type="text" class="form-control form-control-sm" name="type"
                                            value="{{ $data->type }}">
                                        <br>
                                    </div>
                                    <div class="col-md-6 mt-3">
                                        <label for="start_date">Start Date</label>
                                        <input type="date" name="start_date" class="form-control form-control-sm" value="{{ $data->start_date }}">
                                    </div>
                                    <div class="col-md-6 mt-3">
                                        <label for="end_date">End Date</label>
                                        <input type="date" name="end_date" class="form-control form-control-sm" value="{{ $data->end_date }}">
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
        $(".filez4").dropify();
        $(".filez2").dropify();

        function update_validation() {

            $(".updateFormError").show();
            $(".updateFormError").html("<strong><i class='fa fa-spin fa-spinner fa-2x fa-fw'></i> Loading....</strong>");
            var form = new FormData($('#updateForm')[0]);
            form.append('description', editor.getData());
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
                        location.href= "{{ route('announcement.index') }}"; 
                    }

                },
                error: function(xhr, ajaxOptions, thrownError) {
                    toastError(thrownError);
                    toastError(xhr.responseJSON.message)
                }

            });
            return false;
        }

        var editor = CKEDITOR.replace('description', {
            filebrowserUploadUrl: "{{ route('upload', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form',
            baseFloatZIndex: 10005,
            allowedContent: true,
            font_names: 'Avenir;Avenir Next;Gill Sans MT;Calibri;Arial;Comic Sans Ms;Courier New;Georgia;Lucida Sans Unicode;Tahoma;Times New Roman;Trebochet MS;Verdana;'

        });
    </script>
@endsection
