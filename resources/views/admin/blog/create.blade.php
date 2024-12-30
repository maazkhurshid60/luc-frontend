@extends('admin.layout.main-layout')

@section('content')
    @php
        $data_route = route('blog.datatable');
        $store_url = route('blog.store');
        $destroy_url = route('blog.destroy', 11);
        $update_url = route('blog.update', 11);
        $heading = 'Add Blog';
    @endphp
    <div class="content-wrapper">
        <section class="content-header">

            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i>
                        {{ __('Dashboard') }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('blog.index') }}"><i class="fa fa-list"></i>
                        {{ __('Blog List') }}</a></li>

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
                                    <div class="col-md-12 form-group">
                                        <label>{{ __('Title') }} <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control form-control-sm" name="title">
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
                                    <div class="col-md-12">
                                        <hr>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label for="status">Category</label>
                                        <select name="category_id" class="form-control form-control-sm">
                                            @foreach ($BlogCategory as $cat)
                                                <option value="{{ $cat->id }}">{{ $cat->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-6 form-group">
                                        <label for="status">Services Category</label>
                                        <select name="service_id[]" class="form-control form-control-sm" id="service-select"
                                            multiple>
                                            @foreach ($services as $cat)
                                                <option value="{{ $cat->id }}">{{ $cat->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>


                                    <div class="col-md-12 form-group">
                                        <label for="short_description">Short Description <span
                                                class="text-danger">*</span></label>
                                        <textarea class="form-control form-control-sm" name="short_description"></textarea>
                                    </div>
                                    <div class="col-md-12 my-2">
                                        <textarea id="editor" cols="30" rows="10">
                                            <p class="body-txt1 txt--clr mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                                Donec ullamcorper mattis lorem non. Ultrices praesent amet ipsum justo massa. Eu dolor
                                                aliquet risus gravida nunc at feugiat consequat purus. Non massa enim vitae duis mattis.
                                                Vel in ultricies vel fringilla.</p>
                                            <hr class="grey--clr">
                                            <h3 id="introduction" class="head--3 secondary--clr">Introduction</h3>
                                            <p class="body-txt1 txt--clr mb-4">Mi tincidunt elit, id quisque ligula ac diam, amet. Vel
                                                etiam suspendisse morbi eleifend faucibus eget vestibulum felis. Dictum quis montes, sit
                                                sit. Tellus aliquam enim urna, etiam. Mauris posuere vulputate arcu amet, vitae nisi,
                                                tellus tincidunt. At feugiat sapien varius id.</p>
                                            <p class="body-txt1 txt--clr mb-4">Eget quis mi enim, leo lacinia pharetra, semper. Eget in
                                                volutpat mollis at volutpat lectus velit, sed auctor. Porttitor fames arcu quis fusce
                                                augue enim. Quis at habitant diam at. Suscipit tristique risus, at donec. In turpis vel
                                                et quam imperdiet. Ipsum molestie aliquet sodales id est ac volutpat. </p>
                                            <img src="{{ asset('assets/frontend/images/blog-detailcontent-img.webp') }}" alt=""
                                                class="mb-4 anime-scale">
                                            <div class="blog-detail-quote ps-4">
                                                <h3 class="head--3">“In a world older and more complete than ours they move finished and
                                                    complete, gifted with extensions of the senses we have lost or never attained,
                                                    living by voices we shall never hear.”</h3>
                                                <p class="body-txt1 secondary--clr mb-4">— Olivia Rhye, Product Designer</p>
                                            </div>
                                            <p class="body-txt1 txt--clr mb-4">Dolor enim eu tortor urna sed duis nulla. Aliquam
                                                vestibulum, nulla odio nisl vitae. In aliquet pellentesque aenean hac vestibulum turpis
                                                mi bibendum diam. Tempor integer aliquam in vitae malesuada fringilla.</p>
                                            <p class="body-txt1 txt--clr mb-4">Elit nisi in eleifend sed nisi. Pulvinar at orci, proin
                                                imperdiet commodo consectetur convallis risus. Sed condimentum enim dignissim adipiscing
                                                faucibus consequat, urna. Viverra purus et erat auctor aliquam. Risus, volutpat
                                                vulputate posuere purus sit congue convallis aliquet. Arcu id augue ut feugiat donec
                                                porttitor neque. Mauris, neque ultricies eu vestibulum, bibendum quam lorem id. Dolor
                                                lacus, eget nunc lectus in tellus, pharetra, porttitor.</p>
                                            <p class="body-txt1 txt--clr mb-4">Ipsum sit mattis nulla quam nulla. Gravida id gravida ac
                                                enim mauris id. Non pellentesque congue eget consectetur turpis. Sapien, dictum molestie
                                                sem tempor. Diam elit, orci, tincidunt aenean tempus. Quis velit eget ut tortor tellus.
                                                Sed vel, congue felis elit erat nam nibh orci.</p>
                                            <h3 id="software" class="head--3">Lorem ipsum dolor sit amet</h3>
                                            <p class="body-txt1 txt--clr mb-4">Pharetra morbi libero id aliquam elit massa integer
                                                tellus. Quis felis aliquam ullamcorper porttitor. Pulvinar ullamcorper sit dictumst ut
                                                eget a, elementum eu. Maecenas est morbi mattis id in ac pellentesque ac.</p>
                                            <h3 id="resources" class="head--3">Lorem ipsum dolor sit amet</h3>
                                            <p class="body-txt1 txt--clr mb-4">Sagittis et eu at elementum, quis in. Proin praesent
                                                volutpat egestas sociis sit lorem nunc nunc sit. Eget diam curabitur mi ac. Auctor
                                                rutrum lacus malesuada massa ornare et. Vulputate consectetur ac ultrices at diam dui
                                                eget fringilla tincidunt. Arcu sit dignissim massa erat cursus vulputate gravida id. Sed
                                                quis auctor vulputate hac elementum gravida cursus dis.</p>
                                            <p class="body-txt1 txt--clr mb-0 ps-3">1. Lectus id duis vitae porttitor enim gravida
                                                morbi.</p>
                                            <p class="body-txt1 txt--clr mb-0 ps-3">2. Eu turpis posuere semper feugiat volutpat elit,
                                                ultrices suspendisse. Auctor vel in vitae placerat.</p>
                                            <p class="body-txt1 txt--clr mb-0 ps-3 mb-4">3. Suspendisse maecenas ac donec scelerisque
                                                diam sed est duis purus.</p>
                                            <img src="{{ asset('assets/frontend/images/blog-detailcontent-img2.webp') }}" alt=""
                                                class="mb-4 anime-scale">
                                            <p class="body-txt1 txt--clr mb-4">Lectus leo massa amet posuere. Malesuada mattis non
                                                convallis quisque. Libero sit et imperdiet bibendum quisque dictum vestibulum in non.
                                                Pretium ultricies tempor non est diam. Enim ut enim amet amet integer cursus. Sit ac
                                                commodo pretium sed etiam turpis suspendisse at.</p>
                                            <p class="body-txt1 txt--clr mb-4">Tristique odio senectus nam posuere ornare leo metus,
                                                ultricies. Blandit duis ultricies vulputate morbi feugiat cras placerat elit. Aliquam
                                                tellus lorem sed ac. Montes, sed mattis pellentesque suscipit accumsan. Cursus viverra
                                                aenean magna risus elementum faucibus molestie pellentesque. Arcu ultricies sed mauris
                                                vestibulum.</p>
                                            <h3 id="conclusion" class="head--3">Conclusion</h3>
                                            <p class="body-txt1 txt--clr mb-4">Morbi sed imperdiet in ipsum, adipiscing elit dui lectus.
                                                Tellus id scelerisque est ultricies ultricies. Duis est sit sed leo nisl, blandit elit
                                                sagittis. Quisque tristique consequat quam sed. Nisl at scelerisque amet nulla purus
                                                habitasse.</p>
                                            <p class="body-txt1 txt--clr mb-4">Nunc sed faucibus bibendum feugiat sed interdum. Ipsum
                                                egestas condimentum mi massa. In tincidunt pharetra consectetur sed duis facilisis
                                                metus. Etiam egestas in nec sed et. Quis lobortis at sit dictum eget nibh tortor commodo
                                                cursus.</p>
                                            <p class="body-txt1 txt--clr mb-4">Odio felis sagittis, morbi feugiat tortor vitae feugiat
                                                fusce aliquet. Nam elementum urna nisi aliquet erat dolor enim. Ornare id morbi eget
                                                ipsum. Aliquam senectus neque ut id eget consectetur dictum. Donec posuere pharetra odio
                                                consequat scelerisque et, nunc tortor.</p>
                                            <p class="body-txt1 txt--clr mb-4">Nulla adipiscing erat a erat. Condimentum lorem posuere
                                                gravida enim posuere cursus diam.</p>
                                        </textarea>
                                    </div>
                                    <div class="col-md-4">
                                        <label>{{ __('Image') }}</label>
                                        <input type="file" name="file" id="filez1" class="filez1"
                                            data-max-file-size="1M" data-allowed-file-extensions="jpeg png jpg gif webp">
                                    </div>
                                    <div class="col-md-4">
                                        <label>{{ __('Cover Image') }} <span class="text-danger">*</span></label>
                                        <input type="file" name="file3" id="filez3" class="filez3"
                                            data-max-file-size="1M" data-allowed-file-extensions="jpeg png jpg gif webp">
                                    </div>
                              
                                    <div class="col-md-4">
                                        <label>{{ __('OG Image') }}</label>
                                        <input type="file" name="file4" id="filez4" class="filez4"
                                            data-max-file-size="1M" data-allowed-file-extensions="jpeg png jpg gif webp">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="status">Status</label>
                                        <select name="status" class="form-control form-control-sm">
                                            <option value="active">Active</option>
                                            <option value="in-active">In-active</option>
                                        </select>
                                        <br>

                                        <label for="client">Author</label>
                                        <input type="text" name="user" class="form-control form-control-sm">
                                    </div>
                                    <div class="col-md-6" style="margin-top: 3%;">
                                        <span class="">
                                            <input type="checkbox" id="search_engine" name="search_engine"
                                                class="filled-in chk-col-purple" checked />
                                            <label for="search_engine">Discourage search engines from indexing</label>
                                        </span>
                                        <br>
                                        <label for="date">Date</label>
                                        <input type="date" name="date" class="form-control form-control-sm">
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
    <!-- Include Select2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <!-- Include Select2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <!-- Initialize Select2 -->
    <script>
        $(document).ready(function() {
            $('#service-select').select2({
                placeholder: "Select services",
                allowClear: true
            });
        });
        $(document).ready(function() {
            $('#pro-select').select2({
                placeholder: "Select Member",
                allowClear: true,
            });
        });
    </script>


    <script type="text/javascript">
        $(".filez1").dropify();
        $(".filez2").dropify();
        $(".filez3").dropify();
        $(".filez4").dropify();

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
                        location.href = "{{ route('blog.index') }}";
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
