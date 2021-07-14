@extends('admin.layouts.app')@section("htmlheader_title", "Create Admin User")

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
			  <li class="breadcrumb-item"><a href="{{URL::route('admin.users')}}">List Admin Users</a></li>
			  <li class="breadcrumb-item active">Create Admin User</li>
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
		  <div class="col-md-12">
			<!-- jquery validation -->
			<div class="card card-primary">
			  <div class="card-header">
				<h3 class="card-title">Create Admin User</h3>
			  </div>
			  <!-- /.card-header -->
			  <!-- form start -->
			  <form method="post" action="{{URL::route('admin.create.backend.user')}}" id="create-user-form">
				@csrf
				<div class="card-body">
					<div class="form-row row">
						<div class="col-md-6 form-group">
							<label for="first_name">{{ __('First Name') }} <span class="text-danger">*</span></label>
							<input id="first_name" type="text" placeholder="{{ __('First Name') }}" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{old('first_name') }}" >

							@error('first_name')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
						</div>
					</div>

					<div class="form-row row">
						<div class="col-md-6 form-group">
							<label for="last_name">{{ __('Last Name') }}</label>
							<input id="last_name" type="text" placeholder="{{ __('Last Name') }}" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{old('last_name') }}" >
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
							<input id="email" type="email" placeholder="{{ __('Email Address') }}" class="form-control @error('email') is-invalid @enderror" name="email" value="{{old('email') }}">
							@error('email')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
						</div>
					</div>

					<div class="form-row row">
                        <div class="col-md-6 form-group">
						<label for="password">{{ __('Password') }} <span class="text-danger">*</span></label>
                            <input id="password" type="password" placeholder="{{ __('Password') }}" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-6 form-group">
							<label for="password-confirm">{{ __('Confirm Password') }} <span class="text-danger">*</span></label>
                            <input id="password-confirm" type="password" placeholder="{{ __('Confirm Password') }}" class="form-control" name="password_confirmation" autocomplete="new-password">
                        </div>
                    </div>
				</div>
				<!-- /.card-body -->
				<div class="card-footer">
				  <button type="submit" class="btn btn-primary">Create</button>
				  <a href="{{URL::route('admin.backend.users')}}" class="btn btn-primary">Cancel</a>
				</div>
			  </form>
			</div>
			<!-- /.card -->
			</div>
		  <!--/.col (left) -->
		  <!-- right column -->
			<div class="col-md-4">
			<!-- jquery validation -->
				
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

@endpush
@push('scripts')

@endpush