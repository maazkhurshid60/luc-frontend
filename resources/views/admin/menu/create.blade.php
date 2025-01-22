@extends('admin.layout.main-layout')

@section('content')
    @php
        $data_route = route('menu.datatable');
        $store_url = route('menu.store');
        $destroy_url = route('menu.destroy', 11);
        $update_url = route('menu.update', 11);
        $heading = 'Add Menu';
    @endphp
    <div class="content-wrapper">
        <section class="content-header">

            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i>
                        {{ __('Dashboard') }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('menu.index') }}"><i class="fa fa-list"></i>
                        {{ __('Menu List') }}</a></li>

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
                                    <div class="col-md-6 form-group">
                                        <label>{{ __('Name') }} <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control form-control-sm" name="name"
                                            id="generate-slug" target="#SlugMenuCreateForm">
                                    </div>
                                    <div class="col-md-6 form-group char-counter">
                                        <label>{{ __('Slug') }} <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control form-control-sm" name="slug"
                                            id="SlugMenuCreateForm">
                                        <small><span class="text-red">Char Counter : 0</span></small>
                                    </div>

                                    @can('meta-data.create')
                                        <div class="col-md-12">
                                            <hr>
                                        </div>
                                        <div class="col-md-6">
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
                                        </div> --}}
                                    @endcan
                                    {{-- @can('og-data.create')
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
                                        </div>
                                    @endcan --}}
                                    <div class="col-md-6 form-group">
                                        <label for="meta_description">Heading</label>
                                        <input type="text" name="heading" class="form-control form-control-sm">
                                        <span class="text-danger"><small>For Site Home page & Inside Page</small></span>
                                    </div>
                                    <div class="col-md-12 form-group">
                                        <label for="description">Short Description</label>
                                        <textarea name="short_description" class="form-control form-control-sm"></textarea>
                                    </div>

                                    <div class="col-md-12 my-2">
                                        <textarea n id="editor" cols="30" rows="10"></textarea>
                                    </div>
                                    <div class="col-md-6">
                                        <label>{{ __('Image') }} <span class="text-danger">*</span></label>
                                        <input type="file" name="file" id="filez1" class="filez1"
                                            data-max-file-size="1M"
                                            data-allowed-file-extensions="jpeg png jpg gif svg webp">
                                    </div>
                                    {{-- @can('og-data.create')
                                        <div class="col-md-4">
                                            <label>{{ __('OG Image') }}</label>
                                            <input type="file" name="file4" id="filez4" class="filez4"
                                                data-max-file-size="1M" data-allowed-file-extensions="jpeg png jpg gif webp">
                                        </div>
                                    @endcan --}}
                                    <div class="col-md-6" style="margin-top: 2%;">
                                        <span class="">
                                            <input type="checkbox" id="search_engine" name="search_engine"
                                                class="filled-in chk-col-purple" checked />
                                            <label for="search_engine">Discourage search engines from indexing </label>
                                        </span>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="box-header">
                                            <hr>
                                            <h3 class="box-title">About Section Details</h3>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <textarea n id="editor2" cols="30" rows="10"></textarea>
                                    </div>
                                    <div class="col-md-4">
                                        <label>{{ __('About Img') }} <span class="text-danger">*</span></label>
                                        <input type="file" name="aboutimg" id="filez2" class="filez2"
                                            data-max-file-size="1M"
                                            data-allowed-file-extensions="jpeg png jpg gif svg webp">
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

        function form_validation() {

            $(".addFormError").show();
            $(".addFormError").html("<strong><i class='fa fa-spin fa-spinner fa-2x fa-fw'></i> Loading....</strong>");
            var form = new FormData($('#addForm')[0]);
            form.append('description', editor.getData());
            form.append('about_description', editor2.getData());
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
                        location.href = "{{ route('menu.index') }}";
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
        editor.setData(
            '<section><div class="container"><div class="row"><div class="col-lg-12"><div class="heading-text heading-section"><h2>Heading</h2></div></div><div class="col-lg-12">Contents.</div><ul><li class="col-lg-12">bullet point 1</li><li class="col-lg-12">bullet point 2</li><li class="col-lg-12" >bullet point 3</li></ul ></div></div></section>'
        );
        var editor2 = CKEDITOR.replace('editor2', {
            filebrowserUploadUrl: "{{ route('upload', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form',
            baseFloatZIndex: 10005,
            allowedContent: true,
            font_names: 'Avenir;Avenir Next;Gill Sans MT;Calibri;Arial;Comic Sans Ms;Courier New;Georgia;Lucida Sans Unicode;Tahoma;Times New Roman;Trebochet MS;Verdana;'

        });
        editor2.setData(
            '<h2 class="head--2 secondary--clr line-ht3 mb-0 pyb-40">What makes our company different </h2><p class="body-txt1 txt--clr mb-0 pyb-40">Lorem ipsum dolor sit amet, consectetur adipiscing elit.Suspendisse varius enim in eros elementum tristique. Duiscursus, mi quis viverra ornare, eros dolor interdum nulla, utcommodo diam libero vitae erat.</p><li class="body-txt1 txt--clr mb-0 pb-4">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li><li class="body-txt1 txt--clr mb-0 pb-4">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li><li class="body-txt1 txt--clr mb-0 pyb-60">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li>'
        );
    </script>
@endsection
