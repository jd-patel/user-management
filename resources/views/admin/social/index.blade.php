@extends('admin.layouts.app')@section("htmlheader_title", "Social Settings")

@section('main-content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Social Settings</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Social Settings</li>
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
                <h3 class="card-title">Update Settings</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="{{URL::route('admin.socialsettings.update')}}" id="social-settings-form">
              	@csrf
                <div class="card-body">
					
					<div class="form-row row">
						<div class="form-group col-md-6">
		                    <label for="social-media-provider">Social Media Provider <span class="text-danger">*</span></label>
		                    <select name="social_provider" class="form-control social-media-provider @error('social_provider') is-invalid @enderror" id="social-media-provider">
		                      <option value="">Please Select</option>
		                      <option @if(old('social_provider') && old('social_provider') == 'google') selected="selected" @endif value="google">Google</option>
		                      <option @if(old('social_provider') && old('social_provider') == 'facebook') selected = 'selected' @endif value="facebook">Facebook</option>
		                      <option @if(old('social_provider') && old('social_provider') == 'twitter') selected = 'selected' @endif value="twitter">Twitter</option>
		                      <option @if(old('social_provider') && old('social_provider') == 'linkedin') selected = 'selected' @endif value="linkedin">LinkedIn</option>
		                      <option @if(old('social_provider') && old('social_provider') == 'github') selected = 'selected' @endif value="github">Github</option>
		                    </select>
		                    @error('social_provider')
								<span id="social_provider-error" class="error invalid-feedback"><strong>{{ $message }}</strong></span>
							@enderror
		                </div>

		                <div class="form-group col-md-6">
		                    <label for="client_secret">Client Secret <span class="text-danger">*</span></label>
		                    <input type="text" value="{{old('client_secret')}}" name="client_secret" class="form-control @error('client_secret') is-invalid @enderror" id="client_secret" placeholder="Client Secret">
		                    @error('client_secret')
								<span id="client_secret-error" class="error invalid-feedback"><strong>{{ $message }}</strong></span>
							@enderror
		                </div>
					</div>

					<div class="form-row row">
						<div class="form-group col-md-6">
		                    <label for="client_id">Client ID <span class="text-danger">*</span></label>
		                    <input type="text" name="client_id" value="{{ old('client_id') }}" class="form-control @error('client_id') is-invalid @enderror" id="client_id" placeholder="Client ID">
		                    @error('client_id')
								<span id="client_id-error" class="error invalid-feedback"><strong>{{ $message }}</strong></span>
							@enderror
		                </div>
		                
		                <div class="form-group col-md-6">
		                    <label for="redirect_url">Redirect URL <span class="text-danger">*</span></label>
		                    <input type="text" value="{{old('redirect_url')}}" name="redirect_url" class="form-control @error('redirect_url') is-invalid @enderror" id="redirect_url" placeholder="https://example.com/">
		                    @error('redirect_url')
								<span id="redirect_url-error" class="error invalid-feedback"><strong>{{ $message }}</strong></span>
							@enderror
		                </div>

		                <div class="form-group col-md-6">
		                    <label for="display_order">Display Order</label>
		                    <input type="text" value="{{old('display_order')}}" name="display_order" class="form-control @error('display_order') is-invalid @enderror" id="display_order" placeholder="Display Order">

		                    @error('display_order')
								<span id="display_order-error" class="error invalid-feedback"><strong>{{ $message }}</strong></span>
							@enderror
		                </div>
					</div>

		            <div class="form-group">
	                    <div class="custom-control custom-switch custom-switch-off-gray custom-switch-on-success">
	                      <input type="checkbox" @if(old('is_active')) checked = 'checked' @endif class="custom-control-input" id="is_active" name="is_active" value="1">
	                      <label class="custom-control-label" for="is_active">Is Active?</label>
	                    </div>
                  	</div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Save</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">
          	<div class="card card-info card-outline">
              <div class="card-header">
                <h3 class="card-title">Important Information</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
                <div class="card-body">
                	<p>Use below developer console url to get your <strong>CLIENT ID & CLIENT SECRET</strong>.</p>
                	<ul class="list-unstyled">
	                	<li><strong>Google: </strong> <a target="_blank" href="https://console.developers.google.com">https://console.developers.google.com</a></li>
						<li><strong>Facebook: </strong> <a target="_blank" href="https://developers.facebook.com/apps">https://developers.facebook.com/apps</a></li>
						<li><strong>Twitter: </strong> <a target="_blank" href="https://developer.twitter.com/en/apps">https://developer.twitter.com/en/apps</a></li>
						<li><strong>LinkedIn: </strong> <a target="_blank" href="https://www.linkedin.com/developers/apps">https://www.linkedin.com/developers/apps</a></li>
						<li><strong>GitHub: </strong> <a target="_blank" href="https://github.com/settings/developers">https://github.com/settings/developers</a></li>
						<p></p>
						<li><strong>Callback URL: </strong> <span class="text-primary">https://example.com/auth/{{__('[SOCIAL MEDIA NAME]')}}/callback</span></li>
					</ul>
                </div>
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

@endpush
@push('scripts')
<script type="text/javascript">
$( document ).ready(function() {

	$(".social-media-provider").on("change", function () {

		var provider = $(this).val();
		
		if( provider != '' && provider != null){

			$.ajax({
				url: "{{ URL::Route('admin.socialsettings.get') }}",
				data: {"provider": provider},
				type: 'GET',
				success: function (response) {
					
					var resultdata = JSON.parse(JSON.stringify(response));
					$('#client_id').val(resultdata.client_id);
					$('#client_secret').val(resultdata.client_secret);
					$('#redirect_url').val(resultdata.redirect);
					$('#display_order').val(resultdata.display_order);
					$('#is_active').prop('checked', resultdata.is_active);
				}
			},'json');
		}
    });
});
</script>
@endpush