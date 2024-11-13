@extends('admin.layout.main-layout')

@section('content')
    @php
        $columns = ['ID', 'title', 'Featured', 'status', 'date'];
        $data_route = route('service.datatable');
        $store_url = route('service.store');
        $destroy_url = route('service.destroy', 11);
        $update_url = route('service.update', 11);
        $heading = 'Service';
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
                            @can('service.create')
                                {{-- <button  data-toggle="modal" data-target=".addModal"  class="btn mx-1 btn-sm btn-dark float-right">{{ __('lang.Add') }}</button> --}}
                                <a href="{{ route('service.create') }}"
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

        <div class="modal fade addModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
            aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content brad0">
                    <div class="modal-header brad0">
                        <h4 class="modal-title addModalTitle" id="myLargeModalLabel">{{ __($heading . ' Registration') }}</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body addModalBody">
                        <form method="POST" id="addForm" enctype="multipart/form-data"
                            onsubmit="return form_validation()">
                            @csrf
                            <div class=" row">
                                <div class="col-md-8 form-group">
                                    <label>Title</label>
                                    <input type="text" class="form-control form-control-sm" name="title">
                                </div>
                                <div class="col-md-4 form-group">
                                    <label>Icon</label>
                                    <input type="text" class="form-control form-control-sm" name="icon">
                                </div>

                                <div class="col-md-12 form-group">
                                    <label>Description</label>
                                    <textarea name="description" class="form-control form-control-sm"></textarea>
                                </div>
                                <div class="col-md-4">
                                    <label for="">Status</label>
                                    <select name="status" class="form-control form-control-sm">
                                        <option value="active">Active</option>
                                        <option value="in-active">In-active</option>
                                    </select>
                                </div>


                                <div class="col-md-12">
                                    <div class="alert alert-danger addFormError" style="display: none;"></div>
                                    <button class="btn my-2 btn-sm btn-primary float-right">Save Record</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <form style="display: none;" id="delete_form" method="POST" action="{{ $destroy_url }}">
            <input type="hidden" name="id" id="delete_key">
            @method('DELETE')
            @csrf
        </form>
    </div>
    <div class="modal fade extraModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
        aria-hidden="true" style="display: none;">
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
@endsection
@section('custom-css')
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet"
        href="{{ asset('backend_asset/assets/vendor_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') }}">
    <style type="text/css">
        .form-control {
            margin-right: 1px;
            border-radius: 0px;
        }
    </style>
@endsection

@section('custom-scripts')
    <script type="text/javascript">
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
                title: 'Service',
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
                    data: 'title',
                    name: 'title'
                },
                {
                    data: 'is_featured',
                    name: 'is_featured'
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
@endsection
