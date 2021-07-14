@extends('admin.layouts.app')@section("htmlheader_title", "Edit User")

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
			  <li class="breadcrumb-item"><a href="{{URL::route('admin.users')}}">List Users</a></li>
			  <li class="breadcrumb-item active">Edit User</li>
			</ol>
		  </div>
		</div>
	  </div><!-- /.container-fluid -->
	</section>

	<!-- Main content -->
	<section class="content">
	  <div class="container-fluid">
		<div class="row">
		  <!-- left column -->
		  <div class="col-md-8">
			<!-- jquery validation -->
			<div class="card card-primary">
			  <div class="card-header">
				<h3 class="card-title">Edit Detail</h3>
			  </div>
			  <!-- /.card-header -->
			  <!-- form start -->
			  <form method="post" action="{{URL::route('admin.update.user')}}" id="social-settings-form">
				@csrf
				<input type="hidden" value="{{$userID}}" name="userID">
				<div class="card-body">
					<div class="form-row row">
						<div class="col-md-6 form-group">
							<label for="first_name">{{ __('First Name') }} <span class="text-danger">*</span></label>
							<input id="first_name" type="text" placeholder="{{ __('First Name') }}" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{old('first_name', $userDetails->first_name) }}" >

							@error('first_name')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
						</div>

						<div class="col-md-6 form-group">
							<label for="last_name">{{ __('Last Name') }}</label>
							<input id="last_name" type="text" placeholder="{{ __('Last Name') }}" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{old('last_name', $userDetails->last_name) }}" >
							@error('last_name')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
						</div>
					</div>

					<div class="form-row row">
						<div class="col-md-6 form-group">
							<label for="email">{{ __('Email Address') }} <span class="text-danger">*</span></label>
							<input id="email" type="email" placeholder="{{ __('Email Address') }}" class="form-control @error('email') is-invalid @enderror" name="email" value="{{old('email', $userDetails->email) }}">
							@error('email')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
						</div>

						<div class="col-md-6 form-group">
							<label for="phone_number">{{ __('Phone Number') }}</label>
							<input id="phone_number" title="Phone number with your Country Code e.g. +91" type="tel" placeholder="{{ __('Phone Number') }}" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{old('phone_number', $userDetails->phone_number) }}" >
							@error('phone_number')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
						</div>

						
					</div>

					<div class="form-row">
						<div class="col-md-6 form-group">
							<label for="date_of_birth_text">{{ __('Date Of Birth') }}</label>
							<div class="input-group date" id="date_of_birth" data-target-input="nearest">
								<input id="date_of_birth_text" type="text" placeholder="{{ __('Date Of Birth') }}" class="date_of_birth datetimepicker-input form-control" name="date_of_birth" value="{{old('date_of_birth', $userDetails->date_of_birth) }}" >
								<span class="input-group-prepend" for="date_of_birth_text">
									<label class="input-group-text" for="date_of_birth_text">
										<i class="fa fa-calendar-alt">
										</i>
									</label>
								</span>
							</div>
						</div>

						<div class="col-md-6 form-group">
							<label for="gender_male">Gender</label>
							<div></div>
							<label class="form-check form-check-inline">
								<input id="gender_male" @if($userDetails->gender == 'Male') checked @endif type="radio" value="Male" class="form-check-input" name="gender">
								<span class="form-check-label"> Male </span>
							</label>

							<label class="form-check form-check-inline">
								<input id="gender_female" @if($userDetails->gender == 'Female') checked @endif type="radio" value="Female" class="form-check-input" name="gender">
								<span class="form-check-label"> Female </span>
							</label>
						</div>
					</div>

					<div class="form-row">
						<div class="col-md-6 form-group">
							<div class="custom-control custom-checkbox">
								<input class="custom-control-input" @if(old('is_active') || $userDetails->is_active == 1) checked = 'checked' @endif name="is_active" type="checkbox" id="is_active" value="1">
								<label for="is_active" class="custom-control-label">Is Active?</label>
							</div>
						</div>
					</div>

				</div>
				<!-- /.card-body -->
				<div class="card-footer">
				  <button type="submit" class="btn btn-primary">Update</button>
				  <a href="{{URL::route('admin.users')}}" class="btn btn-primary">Cancel</a>
				</div>
			  </form>
			</div>
			<!-- /.card -->
			</div>
		  <!--/.col (left) -->
		  <!-- right column -->
			<div class="col-md-4">
			<!-- jquery validation -->
				<div class="card card-primary card-outline">
				  <div class="card-body box-profile">
					<ul class="list-group list-group-unbordered mb-3">
						<h3 class="profile-username text-center">Other Information</h3>
						<li class="list-group-item">
							<b>Registered On</b> <a class="float-right">{{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $userDetails->created_at)->format('d M, Y h:i A')}}</a>
						</li>
						@if( !empty($userDetails->UserInfo) )
							@foreach($userDetails->UserInfo as $key => $value)
								@if($value)
									<li class="list-group-item">
										<b>{{ucFirst(str_replace('_', ' ', $key))}}</b> <a class="float-right">{{$value}}</a>
									</li>
								@endif
							@endforeach
						@endif
						<li class="list-group-item">
							<b>Last Login On</b> <a class="float-right">@if( $userDetails->last_login ) {{$userDetails->last_login}} @else {{__('Never logged in')}} @endif</a>
						</li>

						<li class="list-group-item">
							<b>Last Login Type</b> <a class="float-right">
								@if( $userDetails->last_login ) {{$userDetails->last_login_type}} @else - @endif</a>
						</li>
					</ul>
				  </div>
				  <!-- /.card-body -->
				</div>
			</div>
		  <!--/.col (right) -->
		</div>
		<!-- /.row -->
	  </div><!-- /.container-fluid -->
	</section>
	<!-- /.content -->
  </div>
@endsection
@push('styles')

<link href="{{ asset('/public/css/bootstrap-datepicker.min.css') }}" rel="stylesheet">  
@endpush
@push('scripts')
<script src="{{ asset('/public/js/bootstrap-datepicker.min.js') }}"></script>
<script type="text/javascript">

$( document ).ready(function() {

	$('.date_of_birth').datepicker({
		format: "dd-mm-yyyy",
		autoclose: true,
		startView: 'decade'
	});
});
</script>
@endpush