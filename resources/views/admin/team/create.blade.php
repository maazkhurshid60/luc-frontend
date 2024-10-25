@extends('admin.layout.main-layout')

@section('content')
    @php
        $data_route = route('team.datatable');
        $store_url = route('team.store');
        $destroy_url = route('team.destroy', 11);
        $update_url = route('team.update', 11);
        $heading = 'Add team';
    @endphp
    <div class="content-wrapper">
        <section class="content-header">

            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i>
                        {{ __('Dashboard') }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('team.index') }}"><i class="fa fa-list"></i>
                        {{ __('team List') }}</a></li>

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
                                        <label>Name</label>
                                        <input type="text" class="form-control form-control-sm" name="name">
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label>Designation</label>
                                        <input type="text" class="form-control form-control-sm" name="designation">
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label>Hourly rate</label>
                                        <input type="text" class="form-control form-control-sm" name="hourly_rate">
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
                                            class="form-control form-control-sm" maxlength="80">
                                        <p style="color: red; font-size: 12px">Char Count:<span
                                                id="keywordsCharCount">0</span>/80</p>
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
                                    <div class="col-md-12 my-2">
                                        <textarea name="details" id="editor" cols="30" rows="10"> 
											<div class="professional-skills">
												<h1>Skills:</h1>
												
												<ul>
												<li>Use Cases</li>
												<li>User Stories</li>
												<li>Acceptance Criteria</li>
												<li>Test Scenarios</li>
												<li>UML/BPMN</li>
												<li>Work Breakdown Structure</li>
												<li>Functional Requirements</li>
												<li>Non-functional Requirements</li>
												<li>Workflows</li>
												<li>Wireframing</li>
												<li>Prototyping</li>
												<li>Planning &amp; Monitoring</li>
												<li>Clarifying Business Ideas</li>
												<li>Validating Requirements</li>
												<li>Communication with Stakeholders and Team</li>
												</ul>
											</div>
											
											<div class="document-types">
												<h1>Document Types:</h1>
												
												<ul>
												<li>Gap Analysis</li>
												<li>Impact Analysis</li>
												<li>RoadMap</li>
												<li>Test Scenarios</li>
												<li>Scope &amp; Cost Baseline</li>
												<li>Project Timeline</li>
												<li>Change Management</li>
												<li>User Guidelines</li>
												<li>Story Mapping</li>
												<li>Presentations</li>
												<li>Business Requirement Document (BRD)</li>
												<li>Software Requirement Specification (SRS)</li>
												</ul>
											</div>
										</textarea>
                                    </div>

                                    <div class="col-md-12 form-group">
                                        <label>Short Description</label>
                                        <textarea name="description" id="" class="form-control form-control-sm"></textarea>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label>Facebook</label>
                                        <input type="text" class="form-control form-control-sm" name="facebook">
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label>Twitter</label>
                                        <input type="text" class="form-control form-control-sm" name="twitter">
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label>Instagram</label>
                                        <input type="text" class="form-control form-control-sm" name="instagram">
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label>Email</label>
                                        <input type="email" class="form-control form-control-sm" name="mail">
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label for="status">Consultation link</label>
                                        <input name="consultation_link" class="form-control form-control-sm">
                                    </div>
                                    <div class="col-md-6 form-group">
                                        
                                    </div>
                                    <div class="col-md-3">
                                        <label>{{ __('Image') }}</label>
                                        <input type="file" name="file" id="filez1" class="filez1"
                                            data-max-file-size="1M"
                                            data-allowed-file-extensions="jpeg png jpg gif svg webp">
                                    </div>
                                    <div class="col-md-3">
                                        <label>{{ __('OG Image') }}</label>
                                        <input type="file" name="file4" id="filez4" class="filez4"
                                            data-max-file-size="1M"
                                            data-allowed-file-extensions="jpeg png jpg gif svg webp">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="">Status</label>
                                        <select name="status" class="form-control form-control-sm">
                                            <option value="active">Active</option>
                                            <option value="in-active">In-active</option>
                                        </select>
                                        <br>
                                        <label for="status">Enable Fix</label>
                                        <select name="enable_fix" class="form-control form-control-sm">
                                            <option value="0">Disable</option>
                                            <option value="1">Enable</option>
                                        </select>
                                        <br>
                                        <label>Display Order</label>
                                        <input type="number" name="display_order" min="1"
                                            value="{{ $display_order }}" class="form-control form-control-sm">
                                    </div>
                                    <div class="col-md-3">
                                        <label>Short Designation</label>
                                        <input type="text" name="short_designation"
                                            class="form-control form-control-sm">
                                        <br>
                                        <label>Success Rate</label>
                                        <input type="number" name="success_rate" class="form-control form-control-sm">
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
        $(".filez1,.filez4").dropify();

        function form_validation() {

            $(".addFormError").show();
            $(".addFormError").html("<strong><i class='fa fa-spin fa-spinner fa-2x fa-fw'></i> Loading....</strong>");
            var form = new FormData($('#addForm')[0]);
            form.append('details', editor.getData());

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
                        location.href = "{{ route('team.index') }}";
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
