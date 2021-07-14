@extends('admin.layouts.app')@section("htmlheader_title", "Admin Users")

@section('main-content')
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
	  <div class="container-fluid">
		<div class="row mb-2">
		  <div class="col-sm-6">
			<h1>Manage Admin Users</h1>
		  </div>
		  <div class="col-sm-6">
			<ol class="breadcrumb float-sm-right">
			  <li class="breadcrumb-item"><a href="{{URL::route('admin.dashboard')}}">Home</a></li>
			  <li class="breadcrumb-item active">Admin User List</li>
			</ol>
		  </div>
		</div>
	  </div><!-- /.container-fluid -->
	</section>

	<!-- Main content -->
	<section class="content">
	  <div class="container-fluid">
		<div class="row">
		  <div class="col-12">
			<div class="card card-primary">
			  <div class="card-header">
                <h3 class="card-title">Admin User List</h3>
              </div>
			  <!-- /.card-header -->
			  <div class="card-body">
				<table id="users-list" class="table table-bordered table-hover">
					<thead>
						<tr>
							<!-- <th>No</th> -->
							<th>First Name</th>
							<th>Last Name</th>
							<th>Email</th>
							<th width="220px">Action</th>
						</tr>
					</thead>
					<tbody>
					</tbody>
				</table>
			  </div>
			  <!-- /.card-body -->
			</div>
			<!-- /.card -->
			<!-- /.card -->
		  </div>
		  <!-- /.col -->
		</div>
		<!-- /.row -->
	  </div>
	  <!-- /.container-fluid -->
	</section>
	<!-- /.content -->
  </div>

<!-- Modal HTML -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Do you really want to delete this record? This process cannot be undone.
      </div>
      <div class="modal-footer">
        <button type="button" id="cancel" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="button" id="delete" class="btn btn-danger">Delete</button>
      </div>
    </div>
  </div>
</div>
@endsection
@push('styles')
<link rel="stylesheet" href="{{ asset('/public/vendor/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('/public/vendor/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
@endpush
@push('scripts')
<script src="{{ asset('/public/vendor/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('/public/vendor/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>

<script type="text/javascript">
  $(function () {

  	function confirmDelete() {
  		var id = $('#deleteModal').data('id');
  		var token = "{{ csrf_token() }}";
        $.ajax({
	      type: "POST",
	      url: "{{URL::route('admin.delete.backend.user')}}",
	      data: { id: id, _token:token },
	      dataType: "json",
	      encode: true,
	    }).done(function (data) {
			
			if( data == 1 ){

				$('#deleteModal').data('id', '').modal('hide');
				toastr.success('Record has been deleted successfully!');
				loadUserData();

			}else if(data == 2){
				
				$('#deleteModal').data('id', '').modal('hide');
				toastr.error('Whoops, looks like something went wrong!');

			}else{

				$('#deleteModal').data('id', '').modal('hide');
				toastr.error('Sorry! The feature is disabled for demo version.');
			}
	    });
  	}

  	$(document).on("click","#delete",function(e) {
        confirmDelete();
    });

    $(document).on("click",".delete-user",function(e) {
        var id = $(this).attr('attr-id');
        $('#deleteModal').data('id', id).modal('show');
    });

    loadUserData();
    function loadUserData() {
		var table = $('#users-list').DataTable({
			destroy: true,
			responsive: true,
			searchDelay: 350,
			ajax: "{{ route('admin.get.backend.users') }}",
			columns: [
				{data: 'first_name', name: 'first_name'},
				{data: 'last_name', name: 'last_name'},
				{data: 'email', name: 'email'},
				{data: 'action', name: 'action', orderable: false, searchable: false},
			]
		});
    }
	
  });
</script>
@endpush