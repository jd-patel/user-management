@extends('admin.layouts.app')@section("htmlheader_title", "Email Settings")

@section('main-content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Settings</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Email Settings</li>
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
                <h3 class="card-title">Email Settings</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="{{URL::route('admin.email.settings.update')}}" id="social-settings-form">
              	@csrf
                <div class="card-body">
                	
					<div class="form-row row">
		                <div class="form-group col-md-6">
		                    <label for="mail_host">Host Name <span class="text-danger">*</span></label>
		                    <input type="text" value="{{old('mail_host', @$settings->mail_host) }}" name="mail_host" class="form-control @error('mail_host') is-invalid @enderror" id="mail_host" placeholder="Host Name">
		                    @error('mail_host')
								<span id="mail_host-error" class="error invalid-feedback"><strong>{{ $message }}</strong></span>
							@enderror
		                </div>
					
		                <div class="form-group col-md-6">
		                    <label for="mail_port">Port <span class="text-danger">*</span></label>
		                    <input type="text" value="{{old('mail_port', @$settings->mail_port) }}" name="mail_port" class="form-control @error('mail_port') is-invalid @enderror" id="mail_port" placeholder="Port">
		                    @error('mail_port')
								<span id="mail_port-error" class="error invalid-feedback"><strong>{{ $message }}</strong></span>
							@enderror
		                </div>
					</div>

					<div class="form-row row">
		                <div class="form-group col-md-6">
		                    <label for="mail_username">Username <span class="text-danger">*</span></label>
		                    <input type="text" value="{{old('mail_username', @$settings->mail_username) }}" name="mail_username" class="form-control @error('mail_username') is-invalid @enderror" id="mail_username" placeholder="Username">
		                    @error('mail_username')
								<span id="mail_username-error" class="error invalid-feedback"><strong>{{ $message }}</strong></span>
							@enderror
		                </div>
					
		                <div class="form-group col-md-6">
		                    <label for="mail_password">Password <span class="text-danger">*</span></label>
		                    <small> (Your password will be encrypted)</small>
		                    <input type="password" value="{{old('mail_password', empty($settings->mail_password) ? '' : Crypt::decryptString($settings->mail_password) ) }}" name="mail_password" class="form-control @error('mail_password') is-invalid @enderror" id="mail_password" placeholder="Password">
		                    @error('mail_password')
								<span id="mail_password-error" class="error invalid-feedback"><strong>{{ $message }}</strong></span>
							@enderror
		                </div>
					</div>

					<div class="form-row row">

		                <div class="form-group col-md-6">
		                    <label for="mail_from_name">From Name <span class="text-danger">*</span></label>
		                    <input type="text" value="{{old('mail_from_name', @$settings->mail_from_name) }}" name="mail_from_name" class="form-control @error('mail_from_name') is-invalid @enderror" id="mail_from_name" placeholder="From Name">
		                    @error('mail_from_name')
								<span id="mail_from_name-error" class="error invalid-feedback"><strong>{{ $message }}</strong></span>
							@enderror
		                </div>

		                <div class="form-group col-md-6">
		                    <label for="mail_encryption">Encryption Type <span class="text-danger">*</span></label>
		                    <select name="mail_encryption" class="form-control @error('mail_encryption') is-invalid @enderror" id="mail_encryption">
		                      <option value="">Please Select</option>
		                      <option @if(old('mail_encryption') == 'tls' || @$settings->mail_encryption == 'tls') selected="selected" @endif value="tls">TLS</option>
		                      <option @if(old('mail_encryption') == 'ssl' || @$settings->mail_encryption == 'ssl') selected="selected" @endif value="ssl">SSL</option>
		                    </select>

		                    @error('mail_encryption')
								<span id="mail_encryption-error" class="error invalid-feedback"><strong>{{ $message }}</strong></span>
							@enderror
		                </div>
					</div>

                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">

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