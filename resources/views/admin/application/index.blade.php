@extends('admin.layout.main-layout')

@section('content')

@php
  $columns = [
      'ID',
      'name',
      'email',
      'contact No.',
      'CV',
      'Job Title',
      'date'
    ];
  $data_route = route('application.datatable');
  $update_url = route('application.show',11);
  $destroy_url = route('application.destroy',11);

  $heading = 'Application';
@endphp
	<div class="content-wrapper">
    <section class="content-header">

      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> {{ __('Dashboard') }}</a></li>

        <li class="breadcrumb-item active">{{ __($heading) }}</li>
      </ol>
    </section>


<section class="content">
	<div class="row">
        <div class="col-12">
        	<div class="box">
            <div class="box-header">
              <h3 class="box-title">{{ __($heading.' List') }}</h3>

            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive" >
                <table id="dTable" class="table table-bordered table-striped spTable" >
                <thead>
                  <tr>
                    @foreach ($columns as $item)
                        <th>{{ ucfirst($item) }}</th>
                    @endforeach
                    <th class="notexport" >{{ __('Action') }}</th>
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

<div class="modal fade extraModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
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

  <form style="display: none;" id="delete_form" method="POST"
  action="{{ $destroy_url }}" >
    <input type="hidden" name="id" id="delete_key">
    @method('DELETE')
    @csrf
  </form>
</div>


@endsection
@section('custom-css')

 <style type="text/css">
   .form-control{
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

        dom: "<'row'<'col-md-12 'f>r>"+
            "<'row'<'col-md-12't>>"+
            "<'row'<'col-md-12'ip>>",
        buttons:[{
          extend:'colvis',
          className:'btn btn-sm btn-dark'
        },{
          extend:'excel',
          title:'Blogs',
          className:'btn btn-sm btn-dark mr-2',
          exportOptions: {
            columns: ':not(.notexport)'
          }
        }],
          "pageLength": 100,
        processing: false,
        serverSide: true,
        responsive:true,
        ajax: {
            url: '{{ $data_route }}',

        },
        columns: [

            { data: 'id', name: 'id' },
            { data: 'name', name: 'name' },
            { data: 'email', name: 'email' },
            { data: 'contact_no', name: 'contact_no' },
            { data: 'file', name: 'file' },
            { data: 'job_id', name: 'job_id' },
            { data: 'created_at', name: 'created_at' },
            {data: 'action', name: 'action', orderable: false, searchable: false}
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
        }, function(){
            swal("Deleted!", "Record has been deleted.", "success");
            $("#delete_key").val(recordID);
          $('#delete_form').submit();
        });
    }
    function updateRecord(id) {
      url = "{{ $update_url }}";
      url = url.replace('11', id);
      $(".extraModal").modal();
      $(".extraModalTitle").html("{{ __('View Record') }}");
      $(".extraModalBody").html("<i class='fa fa-spin fa-spinner'></i> {{ __('Loading...') }}");
      $.get(url,function(res){
        $(".extraModalBody").html(res);
      })
    }

</script>

@endsection
