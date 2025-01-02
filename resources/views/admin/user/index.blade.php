@extends('admin.layout.main-layout')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i>
                        {{ __('Dashboard') }}</a></li>
                <li class="breadcrumb-item active">{{ __('Users') }}</li>
            </ol>
        </section>


        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="box round-shadow-box">
                        <div class="box-header">
                            <h3 class="box-title">{{ __('Users') }}</h3>
                            @can('user.create')
                                <a href="{{ route('user.create') }}"
                                    class="btn ml-1 mr-3 btn-sm btn-dark float-right">{{ __('Add User') }}</a>
                            @endcan
                            <button id="showFiltersBtn" class="btn mx-1 btn-sm btn-purple float-right" data-toggle="tooltip"
                                title="Advance Filters"><i class="fa fa-filter"></i></button>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div id="filtersDiv">
                                <form method="POST" id="search-form" class="form-inline" role="form">
                                    <div class="mb-3 mr-2">
                                        <select class="form-control form-control-sm filter-form-fields"
                                            name="filter_status">
                                            <option value="">Status</option>
                                            <option selected value="active">Active</option>
                                            <option value="in-active">In-active</option>
                                        </select>
                                    </div>
                                </form>
                            </div>
                            <div class="table-responsive">
                                <table id="dTable" class="table table-bordered table-striped spTable">
                                    <thead>
                                        <tr>
                                            <th>{{ __('ID') }}</th>
                                            <th>{{ __('Name') }}</th>
                                            <th>{{ __('Email') }}</th>
                                            <th>{{ __('Username') }}</th>
                                            <th>{{ __('Role') }}</th>
                                            <th>{{ __('Status') }}</th>
                                            <th>{{ __('Image') }}</th>
                                            <th>{{ __('Action') }}</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                </div>
            </div>
            @can('user.edit')
                <div class="modal fade extraModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
                    aria-hidden="true" style="display: none;">
                    <div class="modal-dialog modal-md">
                        <div class="modal-content brad0">
                            <div class="modal-header text-center">
                                <h3>Assign Role</h3>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>

                            </div>
                            <div class="modal-body extraModalBody">
                                <form method="POST" id="addForm" onsubmit="return form_validation()">
                                    @csrf
                                    <input type="hidden" name="user_id">
                                    <div class="alert alert-danger addFormError" style="display: none;"></div>
                                    <div class="row">
                                        <div class="col-md-3 col-sm-2"></div>
                                        <div class="col-md-6 col-sm-8 form-group">
                                            <label>Select Role</label>
                                            <select required class="form-control form-control-sm" name='role_id'>
                                                {!! App\Helpers\Helper::getRoles([
                                                    'key' => 'id',
                                                    'value' => 'name',
                                                    'selectOption' => true,
                                                ]) !!}
                                            </select>
                                            <button class="btn my-2 btn-sm btn-purple btn-block">Save</button>

                                        </div>

                                    </div>
                                </form>
                                <br>
                            </div>
                        </div>
                    </div>
                </div>
            @endcan
        </section>
    </div>
@endsection

@section('custom-scripts')
    <script>
        $(document).ready(function() {
            var filtersShown = localStorage.getItem('usersFiltersShown');
            if (filtersShown === 'true') {
                $("#filtersDiv").show();
            } else {
                $("#filtersDiv").hide();
            }
            $('#showFiltersBtn').on('click', function() {
                $("#filtersDiv").slideToggle(500, function() {
                    var isVisible = $("#filtersDiv").is(":visible");
                    localStorage.setItem('usersFiltersShown', isVisible ? 'true' : 'false');
                });
            });
        });
    </script>
    <script type="text/javascript">
        var oTable = $('#dTable').DataTable({
            "order": [
                [0, "asc"]
            ],
            fixedHeader: true,

            dom: "<'row'<'col-md-12 'f>r>" +
                "<'row'<'col-md-12't>>" +
                "<'row'<'col-md-12'ip>>",
            stateSave: true,
            buttons: [{
                    extend: 'colvis',
                    className: 'btn btn-sm btn-purple'
                },
                {
                    extend: 'pageLength',
                    className: 'btn btn-sm btn-purple mr-1 '
                }
            ],
            "pageLength": 100,
            processing: true,
            serverSide: true,
            responsive: true,
            ajax: {
                url: '{!! route('user.datatable') !!}',
                data: function(d) {
                    d.status = $('select[name=filter_status]').val();
                },
            },
            columns: [{
                    data: 'user_id',
                    name: 'user_id'
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
                    data: 'username',
                    name: 'username'
                },
                {
                    data: 'role',
                    name: 'role'
                },
                {
                    data: 'status',
                    name: 'status'
                },
                {
                    data: 'image',
                    name: 'image',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                }
            ]
        });
        $('select[name=filter_status]').change(oTable.draw);

        function assignRole(user_id) {
            $(".extraModal").modal();
            $("input[name=user_id]").val(user_id);
            $('#element option[value="no"]').attr("selected", "selected");

        }

        function form_validation() {

            $(".addFormError").show();
            $(".addFormError").html("<strong><i class='fa fa-spin fa-spinner fa-2x fa-fw'></i> Loading....</strong>");
            var form = new FormData($('#addForm')[0]);
            form.append('type', 'assign_role');
            $.ajax({
                type: "POST",
                url: "{{ route('data.index') }}",
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
                        $(".addFormError").delay(1000).hide();
                        $("#addForm")[0].reset();
                        toastInfo('Record Updated');
                        $(".extraModal").modal('hide');
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
    </script>
@endsection
