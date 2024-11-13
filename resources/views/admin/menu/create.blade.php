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
                                    <div class="col-md-4 form-group">
                                        <label>{{ __('Name') }} <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control form-control-sm" name="name"
                                            id="generate-slug" target="#SlugMenuCreateForm">
                                    </div>
                                    <div class="col-md-4 form-group char-counter">
                                        <label>{{ __('Slug') }} <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control form-control-sm" name="slug"
                                            id="SlugMenuCreateForm">
                                        <small><span class="text-red">Char Counter : 0</span></small>
                                    </div>
                                    {{-- <div class="col-md-3">
                                        <label for="">Parent</label>
                                        <select name="parent" id="parent" class="form-control form-control-sm">
                                            <option value="0">No parent</option>
                                            {{ App\Helpers\Helper::menuOptions() }}
                                        </select>
                                    </div> --}}
                                    <div class="col-md-2">
                                        <label>Display Order <span class="text-danger">*</span></label>
                                        <input type="number" name="display_order" class="form-control form-control-sm"
                                            min="1" value="{{ $display_order }}">
                                    </div>
                                    {{-- <div class="col-md-2" style="margin-top: 3%;">
                                        <span class="">
                                            <input type="checkbox" id="show_services" name="show_services"
                                                class="filled-in chk-col-purple" />
                                            <label for="show_services">Show Services </label>
                                        </span>
                                    </div> --}}
                                    <div class="col-md-2" style="margin-top: 2%;">
                                        <span class="">
                                            <input type="checkbox" id="search_engine" name="search_engine"
                                                class="filled-in chk-col-purple" checked />
                                            <label for="search_engine">Discourage search engines from indexing </label>
                                        </span>
                                    </div>
                                    @can('meta-data.create')
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
                                        <div class="col-md-4">
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
                                    @endcan
                                    @can('og-data.create')
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
                                    @endcan
                                    <div class="col-md-8 form-group">
                                        <label for="description">Short Description</label>
                                        <textarea name="short_description" class="form-control form-control-sm"></textarea>
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label for="meta_description">Heading</label>
                                        <input type="text" name="heading" class="form-control form-control-sm">
                                        <span class="text-danger"><small>For Site Home page & Inside Page</small></span>
                                    </div>
                                    {{-- <div class="col-md-12 my-2">
                                        <textarea n id="editor" cols="30" rows="10"> </textarea>
                                    </div> --}}
                                    <div class="col-md-4">
                                        <label>{{ __('Image') }} <span class="text-danger">*</span></label>
                                        <input type="file" name="file" id="filez1" class="filez1"
                                            data-max-file-size="1M"
                                            data-allowed-file-extensions="jpeg png jpg gif svg webp">
                                    </div>
                                    @can('og-data.create')
                                        <div class="col-md-4">
                                            <label>{{ __('OG Image') }}</label>
                                            <input type="file" name="file4" id="filez4" class="filez4"
                                                data-max-file-size="1M" data-allowed-file-extensions="jpeg png jpg gif webp">
                                        </div>
                                    @endcan
                                    <div class="col-md-4">
                                        <label for="display">Display</label>
                                        <select name="display" class="form-control form-control-sm">
                                            <option>Yes</option>
                                            <option>No</option>
                                        </select>
                                        <br>

                                        <label>Position <span class="text-danger">*</span></label>
                                        <br>
                                        <span class="mx-2">
                                            <input type="checkbox" id="top" value="top" name="position[]"
                                                class="filled-in chk-col-purple" />
                                            <label for="top">Top Bar</label>
                                        </span>
                                        <br>
                                        <span class="mx-2">
                                            <input type="checkbox" id="navigation" value="navigation" name="position[]"
                                                class="filled-in chk-col-purple" checked />
                                            <label for="navigation">Navigation Bar</label>
                                        </span>
                                        {{-- <br>
                                        <span class="mx-2">
                                            <input type="checkbox" id="footer" value="footer" name="position[]"
                                                class="filled-in chk-col-purple" />
                                            <label for="footer">Footer(products)</label>
                                        </span>
                                        <br>
                                        <span class="mx-2">
                                            <input type="checkbox" id="other" value="other" name="position[]"
                                                class="filled-in chk-col-purple" />
                                            <label for="other">Footer (services)</label>
                                        </span>
                                        <br>
                                        <span class="mx-2">
                                            <input type="checkbox" id="organization" value="organization"
                                                name="position[]" class="filled-in chk-col-purple" />
                                            <label for="organization">Footer (organization)</label>
                                        </span> --}}
                                        <br>
                                        <span class="mx-2">
                                            <input type="checkbox" id="bottom" value="bottom" name="position[]"
                                                class="filled-in chk-col-purple" />
                                            <label for="bottom">Bottom </label>
                                        </span>
                                        <br>


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

        function form_validation() {

            $(".addFormError").show();
            $(".addFormError").html("<strong><i class='fa fa-spin fa-spinner fa-2x fa-fw'></i> Loading....</strong>");
            var form = new FormData($('#addForm')[0]);
            // form.append('description', editor.getData());
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

        // var editor = CKEDITOR.replace('editor', {
        //     filebrowserUploadUrl: "{{ route('upload', ['_token' => csrf_token()]) }}",
        //     filebrowserUploadMethod: 'form',
        //     baseFloatZIndex: 10005,
        //     allowedContent: true,
        //     font_names: 'Avenir;Avenir Next;Gill Sans MT;Calibri;Arial;Comic Sans Ms;Courier New;Georgia;Lucida Sans Unicode;Tahoma;Times New Roman;Trebochet MS;Verdana;'

        // });
        // editor.setData(
        //     '<section><div class="container"><div class="row"><div class="col-lg-12"><div class="heading-text heading-section"><h2>Heading</h2></div></div><div class="col-lg-12">Contents.</div></div></div></section>'
        // );
    </script>
    <script>
        // $(document).on('click', '#show_services', function(event) {
        //     // event.preventDefault();
        //     if ($(this).prop("checked") == true) {
        //         $('#parent').prop('disabled', true);
        //     } else if ($(this).prop("checked") == false) {
        //         $('#parent').prop('disabled', false);
        //     }
        // });
    </script>
@endsection
