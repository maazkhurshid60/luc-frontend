@extends('admin.layout.main-layout')

@section('content')
    @php
        // $lang = getTranslation('title', 'en');
        $columns = ['ID', 'title', 'Author','image', 'status', 'date'];
        $data_route = route('blog.datatable');
        $store_url = route('blog.store');
        $destroy_url = route('blog.destroy', 11);
        $update_url = route('blog.update', 11);
        $heading = 'Blog';
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
                            @can('blog.create')
                                <a href="{{ route('blog.create') }}"
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
        const lang = '{{ $lang }}'; // Hardcoded language

        var oTable = $('#dTable').DataTable({
            fixedHeader: true,

            dom: "<'row'<'col-md-12 'f>r>" +
                "<'row'<'col-md-12't>>" +
                "<'row'<'col-md-12'ip>>",
            buttons: [{
                extend: 'colvis',
                className: 'btn btn-sm btn-dark'
            }, {
                extend: 'excel',
                title: 'Blogs',
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
            columns: [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'title',
                    name: 'title',
                    render: function(data, type, row) {
                        return row.title[lang];
                    }
                },
                {
                    data: 'user',
                    name: 'user'
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
