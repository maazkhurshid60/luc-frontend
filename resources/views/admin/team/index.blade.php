@extends('admin.layout.main-layout')

@section('content')
    @php
        $columns = ['ID', 'name', 'designation', 'status', 'date'];
        $data_route = route('team.datatable');
        $store_url = route('team.store');
        $destroy_url = route('team.destroy', 11);
        $update_url = route('team.update', 11);
        $heading = 'Team';
    @endphp
    <div class="content-wrapper">
        <section class="content-header">

            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i>
                        {{ __('Dashboard') }}</a></li>

                <li class="breadcrumb-item active">{{ __($heading) }}</li>
            </ol>
        </section>


        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">{{ __($heading . ' List') }}</h3>
                            @can('team.create')
                                {{-- <button  data-toggle="modal" data-target=".addModal"  class="btn mx-1 btn-sm btn-dark float-right">{{ __('lang.Add') }}</button> --}}
                                <a href="{{ route('team.create') }}"
                                    class="btn mx-1 btn-sm btn-dark float-right">{{ __('lang.Add') }}</a>
                            @endcan
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">

                            <form method="POST" id="search-form" class="form-inline" role="form">

                                <!-- <div class="form-group mr-1">
                                                                                                    <input type="text" class="form-control form-control-sm" name="sid"  placeholder="Search ID">
                                                                                                </div>

                                                                                                <div class="form-group mx-1">
                                                                                                    <input type="text" class="form-control form-control-sm" name="stipologia"  placeholder="tipologia">
                                                                                                </div>
                                                                                                 <div class="form-group mx-1">
                                                                                                    <input type="text" class="form-control form-control-sm" name="scontratto"  placeholder="contratto">
                                                                                                </div>
                                                                                                <div class="form-group mx-1">
                                                                                                    <input type="text" class="form-control form-control-sm" name="scomune"  placeholder="comune">
                                                                                                </div>
                                                                                                <div class="form-group mx-1">
                                                                                                    <input type="text" class="form-control form-control-sm" name="sofferta"  placeholder="offerta">
                                                                                                </div>
                                                                                                <div class="form-group mx-1">
                                                                                                    <input type="text" class="form-control form-control-sm" name="sprezzo"  placeholder="prezzo">
                                                                                                </div>



                                                                                                <button type="submit" class="btn mx-1 btn-primary btn-sm">Search</button> -->
                            </form>
                            <div class="table-responsive">
                                <table id="dTable" class="table table-bordered table-striped spTable">
                                    <thead>
                                        <tr>
                                            @foreach ($columns as $item)
                                                <th>{{ ucfirst($item) }}</th>
                                            @endforeach
                                            <th class="notexport">{{ __('Action') }}</th>


                                        </tr>
                                    </thead>

                                </table>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                </div>
            </div>

        </section>


        <form style="display: none;" id="delete_form" method="POST" action="{{ $destroy_url }}">
            <input type="hidden" name="id" id="delete_key">
            @method('DELETE')
            @csrf
        </form>
    </div>
    <div class="modal fade extraModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true"
        style="display: none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content brad0">
                <div class="modal-header brad0 extraModalHeader">
                    <h4 class="modal-title extraModalTitle" id="myLargeModalLabel"></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body extraModalBody">

                </div>
            </div>
        </div>
    </div>
    <div class="modal fade listFileModal" tabindex="-1" role="dialog" aria-labelledby="myListLargeModalLabel"
        aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content brad0">
                <div class="modal-header brad0 listFileModalHeader">
                    <h4 class="modal-title listFileModalTitle" id="myListLargeModalLabel"></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="card">
                        <div class="card-header">
                            Files
                            <button type="button" data-toggle="modal" data-target=".addFileModal"
                                class="btn btn-dark btn-xs float-right" id="addFileBtn">Add File</button>
                        </div>
                        <div class="listFileModalBody"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade addFileModal" tabindex="-1" role="dialog" aria-labelledby="myAddLargeModalLabel"
        aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content brad0">
                <div class="modal-header brad0">
                    <h4 class="modal-title addFileModalTitle" id="myAddLargeModalLabel">Add Team Files</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body addFileModalBody">

                </div>
            </div>
        </div>
    </div>
    <div class="modal fade editFileModal" tabindex="-1" role="dialog" aria-labelledby="myEditLargeModalLabel"
        aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content brad0">
                <div class="modal-header brad0">
                    <h4 class="modal-title editFileModalTitle" id="myEditLargeModalLabel">Edit Team File</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body editFileModalBody">
                    Loading...
                </div>
            </div>
        </div>
    </div>
@endsection
@section('custom-css')
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet"
        href="{{ asset('backend/assets/vendor_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') }}">
    <style type="text/css">
        .form-control {
            margin-right: 1px;
            border-radius: 0px;
        }

        .dropify-wrapper {
            height: 125px !important;
        }
    </style>
@endsection

@section('custom-scripts')
    <!-- bootstrap color picker -->
    <script
        src="{{ asset('backend/assets/vendor_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js') }}">
    </script>
    <script src="https://cdn.ckeditor.com/4.13.0/full/ckeditor.js"></script>

    <script type="text/javascript">
        var editor = CKEDITOR.replace('editor', {
            filebrowserUploadUrl: "{{ route('upload', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form',
            baseFloatZIndex: 10005,
            font_names: 'Avenir;Avenir Next;Gill Sans MT;Calibri;Arial;Comic Sans Ms;Courier New;Georgia;Lucida Sans Unicode;Tahoma;Times New Roman;Trebochet MS;Verdana;'

        });
        var drEvent = $("#filez1").dropify();
        var dataURL = "{{ route('data.index') }}";
        var token = '{{ csrf_token() }}';
        var oTable = $('#dTable').DataTable({
            fixedHeader: true,

            dom: "<'row'<'col-md-12 'Bf>r>" +
                "<'row'<'col-md-12't>>" +
                "<'row'<'col-md-12'ip>>",
            buttons: [{
                extend: 'colvis',
                className: 'btn btn-sm btn-dark'
            }, {
                extend: 'excel',
                title: 'Shifts',
                className: 'btn btn-sm btn-dark mr-2',
                exportOptions: {
                    columns: ':not(.notexport)'
                }
            }],
            "pageLength": 100,
            processing: false,
            serverSide: true,
            responsive: true,
            ajax: {
                url: '{{ $data_route }}',

            },
            columns: [

                {
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'designation',
                    name: 'sub_title'
                },

                {
                    data: 'status',
                    name: 'status'
                },
                {
                    data: 'created_at',
                    name: 'created_at'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                }
            ]
        });

        function update_validation() {

            $(".updateFormError").show();
            $(".updateFormError").html("<strong><i class='fa fa-spin fa-spinner fa-2x fa-fw'></i>Loading....</strong>");
            var form = new FormData($('#updateForm')[0]);
            form.append('details', editor2.getData());

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
                        $(".updateFormError").removeClass('alert-danger').addClass('alert-success');
                        $(".extraModal").modal('hide');
                        $(".extraModalBody").html('');
                        oTable.draw();

                    }

                },
                error: function(xhr, ajaxOptions, thrownError) {
                    toastError(thrownError);
                    toastError(xhr.responseJSON.message)
                }

            });
            return false;
        }

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
                        oTable.draw();
                        drEvent = drEvent.data('dropify');
                        drEvent.resetPreview();
                        drEvent.clearElement();
                        editor.setData('');


                    }

                },
                error: function(xhr, ajaxOptions, thrownError) {
                    toastError(thrownError);
                    toastError(xhr.responseJSON.message)
                }

            });
            return false;
        }


        function updateRecord(id) {
            url = "{{ $update_url }}";
            url = url.replace('11', id);
            $(".extraModal").modal();
            $(".extraModalTitle").html("{{ __('Update Record') }}");
            $(".extraModalBody").html("<i class='fa fa-spin fa-spinner'></i> {{ __('Loading...') }}");
            $.get(url, function(res) {
                $(".extraModalBody").html(res);
            })
        }

        function delete_record(recordID) {
            swal({
                title: "Are you sure?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete it!",
                closeOnConfirm: false
            }, function() {
                swal("Deleted!", "Record has been deleted.", "success");
                $("#delete_key").val(recordID);
                $('#delete_form').submit();
            });
        }
    </script>
    <script>
        function fileList(team_id) {
            $.ajax({
                type: "GET",
                url: "{{ route('team-file.index') }}",
                data: {
                    team_id: team_id
                },
                success: function(res) {
                    console.log(res);
                    $(".listFileModal").modal();
                    $(".listFileModalBody").html(
                        "<i class='fa fa-spin fa-spinner'></i> {{ __('Loading...') }}");
                    $(".listFileModalTitle").html("{{ __('Team Files') }}");

                    $(".listFileModalBody").html(res.html);
                    $('#addFileBtn').attr('onclick', 'addFile(' + res.team_id + ')');
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    toastError(thrownError);
                    toastError(xhr.responseJSON.message);
                }
            });
        }


        function addFile(team_id) {
            $(".addFileModal").modal();
            $(".addFileModalBody").html('loading...');
            $.ajax({
                type: "GET",
                url: "{{ route('team-file.create') }}",
                data: {
                    team_id: team_id
                },
                success: function(res) {
                    $(".addFileModalBody").html(res);
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    toastError(thrownError);
                    toastError(xhr.responseJSON.message)
                }
            });
        }

        function file_validation() {

            $(".fileFormError").show();
            $(".fileFormError").html("<strong><i class='fa fa-spin fa-spinner fa-2x fa-fw'></i> Loading....</strong>");
            var form = new FormData($('#fileForm')[0]);
            $.ajax({
                type: "POST",
                url: "{{ route('team-file.store') }}",
                data: form,
                cache: false,
                contentType: false,
                processData: false,
                success: function(res) {

                    $(".fileFormError").html('');
                    $.each(res.errors, function(key, value) {
                        $(".fileFormError").append('<small>*' + value + '</small><br>');
                    })
                    if (res.success) {
                        $(".fileFormError").append(res.success);
                        $(".fileFormError").removeClass('alert-danger').addClass('alert-success').delay(1000)
                            .hide();
                        $("#fileForm")[0].reset();
                        toastInfo('Record Added');
                        fileList(res.team_id);
                        $(".addFileModal").modal('hide');
                        drEvent.resetPreview();
                        drEvent.clearElement();
                    }

                },
                error: function(xhr, ajaxOptions, thrownError) {
                    toastError(thrownError);
                    toastError(xhr.responseJSON.message)
                }

            });
            return false;
        }

        function editFile(id) {
            $(".editFileModal").modal();
            $(".editFileModalBody").html('loading...');
            $.ajax({
                type: "GET",
                url: "{{ route('team-file.show', 11) }}",
                data: {
                    id
                },
                success: function(res) {
                    $(".editFileModalBody").html(res);
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    toastError(thrownError);
                    toastError(xhr.responseJSON.message)
                }
            });
        }

        function file_update_validation() {
            $(".editFileFormError").show();
            $(".editFileFormError").html("<strong><i class='fa fa-spin fa-spinner fa-2x fa-fw'></i> Loading....</strong>");
            var form = new FormData($('#editFileForm')[0]);
            $.ajax({
                type: "POST",
                url: "{{ route('team-file.update', 11) }}",
                data: form,
                cache: false,
                contentType: false,
                processData: false,
                success: function(res) {

                    $(".editFileFormError").html('');
                    $.each(res.errors, function(key, value) {
                        $(".editFileFormError").append('<small>*' + value + '</small><br>');
                    })
                    if (res.success) {
                        $(".editFileFormError").append(res.success);
                        $(".editFileFormError").removeClass('alert-danger').addClass('alert-success').delay(
                            1000).hide();
                        $("#editFileForm")[0].reset();
                        toastInfo('Record Updated');
                        $(".listFileModal ").modal('hide');
                        $(".editFileModal").modal('hide');

                    }

                },
                error: function(xhr, ajaxOptions, thrownError) {
                    toastError(thrownError);
                    toastError(xhr.responseJSON.message)
                }

            });
            return false;
        }

        function deleteFile(id) {
            $(".team-files-container").html('Loading..');
            $.ajax({
                type: "POST",
                url: "{{ route('data.index') }}",
                data: {
                    '_token': token,
                    type: 'delete_team_file',
                    id
                },
                success: function(response) {
                    fileList(response.team_id);
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    toastError(thrownError);
                    toastError(xhr.responseJSON.message)
                }
            });
        }

        function updateLabel(id) {
            var label = $('#tool_label').val();
            if (label === undefined || label === '') {
                toastError('Tool label is required');
                return;
            }
            $(".team-files-container").html('Loading..');
            $.ajax({
                type: "POST",
                url: "{{ route('team.updateLabel') }}",
                data: {
                    '_token': "{{ csrf_token() }}",
                    id: id,
                    label: label,
                },
                success: function(response) {
                    if (response.success) {
                        toastInfo(response.message);
                        fileList(response.team_id);
                        $(".team-files-container").html('');
                        $(".label-errors").hide();
                    } else {
                        $(".team-files-container").html('');
                        $(".label-errors").html(response.errors.join('<br>'));
                        $(".label-errors").show();
                    }
                },
                error: function(xhr) {
                    $(".team-files-container").html('');
                    if (xhr.responseJSON && xhr.responseJSON.errors) {
                        $(".label-errors").html(xhr.responseJSON.errors.join('<br>'));
                        $(".label-errors").show();
                    } else {
                        toastError('An unexpected error occurred.');
                    }
                }
            });
        }
    </script>
@endsection
