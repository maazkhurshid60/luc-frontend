@extends('admin.layout.main-layout')

@section('content')
    @php
        $columns = ['ID', 'Name', 'Remarks', 'Date Adeed'];
        $data_route = route('role.datatable');
        $store_url = route('role.store');
        $destroy_url = route('role.destroy', 11);
        $update_url = route('role.update', 11);
        $heading = 'Roles';
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
                            <a href="{{ route('role.create') }}"
                                class="btn mx-1 btn-sm btn-dark float-right">{{ __('lang.Add') }}
                            </a>
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
        var oTable = $('#dTable').DataTable({
            fixedHeader: true,

            dom: "<'row'<'col-md-12 'f>r>" +
                "<'row'<'col-md-12't>>" +
                "<'row'<'col-md-12'ip>>",
            "pageLength": 100,
            processing: true,
            serverSide: true,
            responsive: true,
            ajax: {
                url: '{{ $data_route }}'
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
                    data: 'remarks',
                    name: 'remarks'
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
    </script>
@endsection
