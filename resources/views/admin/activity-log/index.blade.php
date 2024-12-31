@extends('admin.layout.main-layout')

@section('content')
    @php
        $data_route = route('activity.datatable');
        $heading = 'Activity Log';
        $cols = ['date', 'module', 'description', 'subject ID', 'causer'];
        $modules = \DB::table('activity_log')->distinct('log_name')->pluck('log_name')->toArray();
        if ($modules) {
            $modules = array_unique($modules);
        }
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
                            <h3 class="box-title">{{ __($heading . ' Log') }}</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="container-fluid pl-0">
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 mb-2">
                                        <div class="input-group">
                                            <button type="button"
                                                class="form-control form-control-sm d-flex justify-content-between"
                                                id="daterange-btn">
                                                <span>
                                                    Date range picker
                                                </span>
                                                <i class="pl-2 fa fa-caret-down"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-4 mb-2">
                                        <select class="form-control form-control-sm" name="filter_module">
                                            <option value="" selected>All Modules</option>
                                            @foreach ($modules as $element)
                                                <option value="{{ $element }}">{{ ucfirst($element) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-3 col-md-4 mb-2">
                                        <select class="form-control form-control-sm" name="filter_user_id">
                                            <option value="" selected>All Users</option>
                                            @foreach ($users as $element)
                                                <option value="{{ $element->user_id }}">{{ $element->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-3 col-md-4 mb-2">
                                        <input type="text" name="filter_subject_id"
                                            class="form-control form-control-sm filter_subject_id" placeholder="Subject id">
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table id="dTable" class="table table-bordered table-striped spTable">
                                    <thead>
                                        <tr>
                                            @foreach ($cols as $element)
                                                <th>{{ ucfirst($element) }}</th>
                                            @endforeach
                                            <th class="notexport" width="1%">{{ __('Action') }}</th>
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
    </div>
    <div class="modal fade extraModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true"
        style="display: none;">
        <div class="modal-dialog modal-lg xl-modal">
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
    <style type="text/css">
        .form-control {
            margin-right: 1px;
            border-radius: 0px;
        }
    </style>
@endsection

@section('custom-scripts')
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <script src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script type="text/javascript">
        let modalCustom = $('.extraModal');
        var start_time = null;
        var end_time = null;

        $('#daterange-btn').daterangepicker({
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf(
                        'month')],
                },
                startDate: moment().subtract(29, 'days'),
                endDate: moment(),
            },
            function(start, end) {
                $('#daterange-btn span').html(
                    start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY')
                );
                start_time = start.format('YYYY-MM-DD'); // Fixed the date format
                end_time = end.format('YYYY-MM-DD'); // Fixed the date format
                oTable.draw(); // Refresh the table
            }
        );

        var oTable = $('#dTable').DataTable({
            fixedHeader: true,
            "order": [
                [0, "desc"]
            ],
            dom: "<'row'<'col-md-12 'f>r>" + // Removed 'B' (buttons) from the DOM structure
                "<'row'<'col-md-12't>>" +
                "<'row'<'col-md-12'ip>>",
            "pageLength": 100,
            processing: true,
            serverSide: true,
            responsive: true,
            ajax: {
                url: '{{ $data_route }}',
                data: function(d) {
                    d.causer_id = $('select[name=filter_user_id]').val();
                    d.date = start_time && end_time ? `${start_time}/${end_time}` : null;
                    d.subject_id = $('.filter_subject_id').val();
                    d.log_name = $('select[name=filter_module]').val();
                }
            },
            columns: [{
                    data: 'created_at',
                    name: 'created_at'
                },
                {
                    data: 'log_name',
                    name: 'log_name'
                },
                {
                    data: 'description',
                    name: 'description'
                },
                {
                    data: 'subject',
                    name: 'subject'
                },
                {
                    data: 'causer',
                    name: 'causer'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                }
            ]
        });


        $('select[name=filter_module],select[name=filter_user_id]').change(oTable.draw);
        $('.filter_subject_id').keyup(oTable.draw);

        function showlogs(data) {
            modalCustom.modal();
            modalCustom.find('.modal-header').find('h3').html('Changes');
            modalCustom.find('.modal-body').html('<strong class="m-1">New:</strong>')
                .append('<table class="table table-sm table-bordered table-new"></table')
                .append('<br><strong class="mt-2">Old:</strong>')
                .append('<table class="table table-sm table-bordered table-old"></table')
            for (value in data.attributes) {
                if (data.attributes.hasOwnProperty(value)) {
                    modalCustom.find('.modal-body').find('.table-new').append('<tr>')
                        .append('<td>' + value + '</td>')
                        .append('<td>' + data.attributes[value] + '</td>')
                        .append('</tr>')
                }
            }
            for (value in data.old) {
                if (data.old.hasOwnProperty(value)) {
                    modalCustom.find('.modal-body').find('.table-old').append('<tr>')
                        .append('<td>' + value + '</td>')
                        .append('<td>' + data.old[value] + '</td>')
                        .append('</tr>')
                }
            }
        }
    </script>
@endsection
