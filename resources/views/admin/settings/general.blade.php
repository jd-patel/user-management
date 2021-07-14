@extends('admin.layouts.app')@section("htmlheader_title", "General Settings")

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
              <li class="breadcrumb-item active">General Settings</li>
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
                <h3 class="card-title">General Settings</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="{{URL::route('admin.general.settings.update')}}" id="social-settings-form">
              	@csrf
                <div class="card-body">
                	
					       <div class="form-row row">
		                <div class="form-group col-md-6">
		                    <label for="site_name">Site Name <span class="text-danger">*</span></label>
		                    <input type="text" value="{{old('site_name', @$settings->site_name) }}" name="site_name" class="form-control @error('site_name') is-invalid @enderror" id="site_name" placeholder="App Name">
		                    @error('site_name')
								          <span id="site_name-error" class="error invalid-feedback"><strong>{{ $message }}</strong></span>
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
<style type="text/css">
  .rotate {
    background-color: transparent;
    transform: rotate(342deg);
  }
  .rotate-2 {
    background-color: transparent;
    transform: rotate(50deg);
  }
</style>
@endpush
@push('scripts')

@endpush