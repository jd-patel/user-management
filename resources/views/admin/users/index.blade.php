@extends('admin.layouts.app')@section("htmlheader_title", "User List")

@section('main-content')
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
	  <div class="container-fluid">
		<div class="row mb-2">
		  <div class="col-sm-6">
			<h1>Manage Users</h1>
		  </div>
		  <div class="col-sm-6">
			<ol class="breadcrumb float-sm-right">
			  <li class="breadcrumb-item"><a href="{{URL::route('admin.dashboard')}}">Home</a></li>
			  <li class="breadcrumb-item active">User List</li>
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
                <h3 class="card-title">User List</h3>
              </div>
			  <!-- /.card-header -->
			  <div class="card-body">
				<table id="users-list" class="table table-bordered table-hover">
					<thead>
						<tr>
							<!-- <th>No</th> -->
							<th>First Name</th>
							<th>Last Name</th>
							<th>Gender</th>
							<th>Date Of Birth</th>
							<th>Email</th>
							<th>Is Active?</th>
							<th>Last Login</th>
							<th width="100px">Action</th>
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
	var table = $('#users-list').DataTable({
		responsive: true,
		searchDelay: 350,
		ajax: "{{ route('admin.get.users') }}",
		columns: [
			{data: 'first_name', name: 'first_name'},
			{data: 'last_name', name: 'last_name'},
			{data: 'gender', name: 'gender'},
			{data: 'date_of_birth', name: 'date_of_birth'},
			{data: 'email', name: 'email'},
			{data: 'is_active', name: 'is_active'},
			{data: 'last_login', name: 'last_login'},
			{data: 'action', name: 'action', orderable: false, searchable: false},
		]
	});
  });
</script>
@endpush