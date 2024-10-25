@extends('admin.layout.main-layout')

@section('content')
    @php
        $columns = ['ID', 'name', 'email', 'contact No.', 'profile', 'date'];
        $data_route = route('hiring-application.datatable');
        $update_url = route('hiring-application.show', 11);
        $destroy_url = route('hiring-application.destroy', 11);
        $heading = 'Potential Leads';
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
                            <button id="showFiltersBtn" class="btn mx-1 btn-sm btn-purple float-right" data-toggle="tooltip"
                                title="Advance Filters"><i class="fa fa-filter"></i></button>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div id="filtersDiv">
                                <div class="row">
                                    <div class="mb-3 col-3">
                                        <input type="text" name="client" class="form-control form-control-sm"
                                            placeholder="Search Lead">
                                    </div>
                                    <div class="mb-3 col-3">
                                        <select name="member" class="form-control form-control-sm">
                                            <option value="">All Members</option>
                                            {{ App\Helpers\Helper::getOptions([
                                                'table' => 'team',
                                                'value' => 'name',
                                                'key' => 'id',
                                            ]) }}
                                        </select>
                                    </div>
                                    <div class="mb-3 col-3">
                                        <select name="service" class="form-control form-control-sm">
                                            <option value="">All Services</option>
                                            <option value="ui_ux_design">UI/UX Design</option>
                                            <option value="web_development">Web Development</option>
                                            <option value="mobile_development">Mobile Development</option>
                                            <option value="software_project_management">Software Project Management
                                            </option>
                                            <option value="software_business_analysis">Software Business Analysis
                                            </option>
                                            <option value="software_quality_assurance">Software Quality Assurance
                                            </option>
                                        </select>
                                    </div>
                                    <div class="mb-3 col-3">
                                        <select name="technology" class="form-control form-control-sm">
                                            <option value="">All Technologies</option>
                                            <optgroup id="ui_ux_design" label="UI/UX Design">
                                                <option value="figma">Figma</option>
                                                <option value="adobe">Adobe XD</option>
                                                <option value="adobe-illustrator">Adobe Illustrator</option>
                                                <option value="invision">InVision</option>
                                                <option value="photoshop">Photoshop</option>
                                            </optgroup>
                                            <optgroup id="web_development" label="Web Development">
                                                <option value="javascript">JavaScript</option>
                                                <option value="java">Java</option>
                                                <option value="vuejs">Vue.js</option>
                                                <option value="reactjs">React.js</option>
                                                <option value="nodejs">Node.js</option>
                                                <option value="mongodb">MongoDB</option>
                                                <option value="mysql">MySQL</option>
                                                <option value="firebase">Firebase</option>
                                                <option value="postgress">PostgreSQL</option>
                                                <option value="aws">AWS</option>
                                            </optgroup>
                                            <optgroup id="mobile_development" label="Mobile App Development">
                                                <option value="flutter">Flutter</option>
                                                <option value="react-native">React Native</option>
                                                <option value="kotlin">Kotlin</option>
                                                <option value="swift">Swift</option>
                                            </optgroup>
                                            <optgroup id="software_project_management" label="Software Project Management">
                                                <option value="click_up">Click Up</option>
                                                <option value="jira">Jira</option>
                                                <option value="monday_com">Monday.com</option>
                                                <option value="assana">Asana</option>
                                                <option value="trello">Trello</option>
                                                <option value="notion">Notion</option>
                                                <option value="ms_project">MS Project</option>
                                                <option value="zapier">Zapier</option>
                                                <option value="zoho">Zoho</option>
                                                <option value="smart_sheet">Smart Sheet</option>
                                            </optgroup>
                                            <optgroup id="software_busines_analysis" label="Software Business Analysis">
                                                <option value="ms_word">MS Word</option>
                                                <option value="ms_excel">MS Excel</option>
                                                <option value="confluence">Confluence</option>
                                                <option value="figma">Figma</option>
                                                <option value="pencil_tool">Pencil Tool</option>
                                                <option value="mockitt">Mockitt</option>
                                                <option value="balsamiq">Balsamiq</option>
                                                <option value="draw_io">Draw.io</option>
                                            </optgroup>
                                            <optgroup id="software_quality_assurance" label="Software Quality Assurance">
                                                <option value="selenium">Selenium</option>
                                                <option value="cypress">Cypress</option>
                                                <option value="playwright">Postman</option>
                                                <option value="playwright">Jmeter</option>
                                                <option value="playwright">MS Excel</option>
                                                <option value="playwright">MS Word</option>
                                                <option value="playwright">Confluence</option>
                                            </optgroup>
                                        </select>
                                    </div>
                                </div>
                            </div>
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

        {{-- <form style="display: none;" id="delete_form" method="POST" action="{{ $destroy_url }}">
            <input type="hidden" name="id" id="delete_key">
            @method('DELETE')
            @csrf
        </form> --}}
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
    <script>
        $(document).ready(function() {
            var filtersShown = localStorage.getItem('filtersShown');
            if (filtersShown === 'true') {
                $("#filtersDiv").show();
            } else {
                $("#filtersDiv").hide();
            }
            $('#showFiltersBtn').on('click', function() {
                $("#filtersDiv").slideToggle(500, function() {
                    var isVisible = $("#filtersDiv").is(":visible");
                    localStorage.setItem('filtersShown', isVisible ? 'true' : 'false');
                });
            });
        });
    </script>
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
                data: function(d) {
                    d.client = $('input[name=client]').val();
                    d.member = $('select[name=member]').val();
                    d.service = $('select[name=service]').val();
                    d.technology = $('select[name=technology]').val();
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
                    data: 'team_id',
                    name: 'team_id'
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


        $('input[name=client]').keyup(oTable.draw);
        $('select[name=member],select[name=technology],select[name=service]').change(oTable.draw);

        function delete_record(recordID) {
            swal({
                title: "Are you sure?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete it!",
                closeOnConfirm: false
            }, function() {
                $.ajax({
                    type: 'DELETE',
                    url: '{{ $destroy_url }}',
                    data: {
                        _token: "{{ csrf_token() }}",
                        id: recordID
                    },
                    success: function(response) {
                        if (response.success) {
                            swal("Deleted!", response.message, "success");
                            oTable.draw();
                        } else {
                            swal("Error!", response.message, "error");
                        }
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        swal("Error!", "An error occurred while deleting the record.", "error");
                    }
                });
            });
        }




        function updateRecord(id) {
            url = "{{ $update_url }}";
            url = url.replace('11', id);
            $(".extraModal").modal();
            $(".extraModalTitle").html("{{ __('View Application') }}");
            $(".extraModalBody").html("<i class='fa fa-spin fa-spinner'></i> {{ __('Loading...') }}");
            $.get(url, function(res) {
                $(".extraModalBody").html(res);
            })
        }
    </script>
@endsection
