@extends('admin.layout.main-layout')

@section('content')
    @php
        $columns = ['ID', 'Name', 'Contact', 'Image', 'Status', 'date'];
        $data_route = route('company.datatable');
        $destroy_url = route('company.destroy', 11);
        $heading = 'Company';
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
                            @can('company.create')
                                <a href="{{ route('company.create') }}"
                                    class="btn mx-1 btn-sm btn-dark float-right">{{ __('lang.Add') }}</a>
                            @endcan
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
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
                },
                {
                    extend: 'excel',
                    title: 'Company',
                    className: 'btn btn-sm btn-dark mr-2',
                    exportOptions: {
                        columns: ':not(.notexport)'
                    }
                }
            ],
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
                    data: 'contact',
                    name: 'contact'
                },
                {
                    data: 'image',
                    name: 'image'
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

        // function delete_record(recordID) {
        //     swal({
        //         title: "Are you sure?",
        //         type: "warning",
        //         showCancelButton: true,
        //         confirmButtonColor: "#DD6B55",
        //         confirmButtonText: "Yes, delete it!",
        //         closeOnConfirm: false
        //     }, function() {
        //         swal("Deleted!", "Record has been deleted.", "success");
        //         $("#delete_key").val(recordID);
        //         $('#delete_form').submit();
        //     });
        // }
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
                        url: $('#delete_form').attr('action'), // Use the form's action attribute
                        type: 'POST',
                        data: {
                            _method: 'DELETE', // Spoofing the DELETE method
                            _token: $('input[name="_token"]').val(), // CSRF token
                            id: recordID
                        },
                        success: function(response) {
                            if (response.success) {
                                swal("Deleted!", "Record has been deleted.", "success");
                                location.reload(); // Reload the page to reflect changes

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
    </script>
@endsection
