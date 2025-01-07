@extends('admin.layout.main-layout')

@section('content')
    @php
        $columns = ['ID', 'name', 'email', 'contact No.', 'type', 'date'];
        $data_route = route('quotation-form.datatable');
        $update_url = route('quoteationform.show', 11);
        $destroy_url = route('quotationform.delete', 11);
        $heading = 'Quotation Form List';
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
                            <h3 class="box-title">{{ __($heading) }}</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#contact" role="tab"
                                        aria-controls="contact" aria-selected="true">Contact</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#quotation" role="tab"
                                        aria-controls="quotation" aria-selected="false">Quotation</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#project" role="tab"
                                        aria-controls="project" aria-selected="false">Project</a>
                                </li>
                            </ul>
                            <div class="tab-content " style="border: 0px" id="myTabContent">
                                <div class="tab-pane fade show active" id="contact" role="tabpanel"
                                    aria-labelledby="contact-tab">
                                    <div class="table-responsive">
                                        <table id="cTable" class="table table-bordered table-striped spTable">
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
                                <div class="tab-pane fade" id="quotation" role="tabpanel" aria-labelledby="quotation-tab">
                                    <div class="table-responsive">
                                        <table id="qTable" class="table table-bordered table-striped spTable">
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
                                <div class="tab-pane fade" id="project" role="tabpanel" aria-labelledby="project-tab">
                                    <div class="table-responsive">
                                        <table id="pTable" class="table table-bordered table-striped spTable">
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
                            </div>

                        </div>
                        <!-- /.box-body -->
                    </div>
                </div>
            </div>

        </section>

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

       
    </div>
@endsection
@section('custom-css')
    <style type="text/css">
        .form-control {
            margin-right: 1px;
            border-radius: 0px;
        }
    </style>
@endsection

@section('custom-scripts')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <!-- Include Select2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script type="text/javascript">
        var dataURL = "{{ route('data.index') }}";
        var token = '{{ csrf_token() }}';
        var oTable = $('#cTable').DataTable({
            fixedHeader: true,

            dom: "<'row'<'col-md-12'f>r>" +
                "<'row'<'col-md-12't>>" +
                "<'row'<'col-md-12'ip>>",
            pageLength: 100,
            processing: false,
            serverSide: true,
            responsive: true,
            ajax: {
                url: '{{ $data_route }}',
                data: function(d) {
                    d.type = 'Contact Form';
                },
            },
            columns: [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'email',
                    name: 'email'
                },
                {
                    data: 'contact_no',
                    name: 'contact_no'
                },
                {
                    data: 'type',
                    name: 'type'
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


        var qTable = $('#qTable').DataTable({
            fixedHeader: true,

            dom: "<'row'<'col-md-12'f>r>" +
                "<'row'<'col-md-12't>>" +
                "<'row'<'col-md-12'ip>>",
            "pageLength": 100,
            processing: false,
            serverSide: true,
            responsive: true,
            ajax: {
                url: '{{ $data_route }}',
                data: function(d) {
                    d.type = 'Quote Form';
                },
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
                    data: 'email',
                    name: 'email'
                },
                {
                    data: 'contact_no',
                    name: 'contact_no'
                },
                {
                    data: 'type',
                    name: 'type'
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

        var pTable = $('#pTable').DataTable({
            fixedHeader: true,

            dom: "<'row'<'col-md-12'f>r>" +
                "<'row'<'col-md-12't>>" +
                "<'row'<'col-md-12'ip>>",
            "pageLength": 100,
            processing: false,
            serverSide: true,
            responsive: true,
            ajax: {
                url: '{{ $data_route }}',
                data: function(d) {
                    d.type = 'Project Form';
                },
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
                    data: 'email',
                    name: 'email'
                },
                {
                    data: 'contact_no',
                    name: 'contact_no'
                },
                {
                    data: 'type',
                    name: 'type'
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

        function delete_record(recordID) {
            if (true) {
                swal({
                    title: "Are you sure?",
                    text: "You will not be able to recover this record!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Yes, delete it!",
                    closeOnConfirm: false
                }, function() {
                    $.ajax({
                        url: $('#delete_form').attr('action'),
                        type: 'POST',
                        data: {
                            _method: 'GET',
                            _token: $('input[name="_token"]').val(),
                            id: recordID
                        },
                        success: function(response) {
                            if (response.success) {
                                swal("Deleted!", "Record has been deleted.", "success");
                                location.reload();

                            } else {
                                swal("Error!", response.message, "error");
                            }
                        },
                        error: function() {
                            swal("Error!", "An error occurred while deleting the record.", "error");
                        }
                    });
                })
            } else {
                swal("Cancelled", "Your record is safe :)", "error");
            }
        }




        function updateRecord(id) {
            url = "{{ $update_url }}";
            url = url.replace('11', id);
            $(".extraModal").modal();
            $(".extraModalTitle").html("{{ __('Form Details') }}");
            $(".extraModalBody").html("<i class='fa fa-spin fa-spinner'></i> {{ __('Loading...') }}");
            $.get(url, function(res) {
                $(".extraModalBody").html(res);
            })
        }
    </script>
@endsection
