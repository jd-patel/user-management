@extends('layouts.app')@section("htmlheader_title", "Login")

@section('content')
<div class="container pt-3">
	<div class="row justify-content-center">
		<div class="col-md-8 col-lg-6 mx-auto">
			<div class="card shadow border-0">
				<h4 class="card-title text-white card-header text-center text-uppercase bg-primary p-3">{{ __('Sign In') }}</h4>

				<div class="card-body">
					<form method="POST" action="{{ route('login') }}">
						@csrf

						<div class="form-group row">
							<div class="col-md-8 offset-md-2">
								@if(Session::has('success'))
								<div class="alert alert-success" role="alert">
								  {{ Session::get('success') }}
								</div>
								@endif

								@if(Session::has('incorrect'))
								<div class="alert alert-danger" role="alert">
								  {{ Session::get('incorrect') }}
								</div>
								@endif
							</div>
						</div>

						<div class="form-group row">
							<div class="col-md-8 offset-md-2">
								<label for="email" class="control-label">{{ __('Email Address') }} <span class="text-danger">*</span></label>
								<input id="email" type="email" placeholder="{{ __('Email Address') }}" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autofocus>

								@error('email')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
							</div>
						</div>

						<div class="form-group row">
							<div class="col-md-8 offset-md-2">
								<label for="password" class="control-label">{{ __('Password') }} <span class="text-danger">*</span></label>
								<input id="password" type="password" placeholder="{{ __('Password') }}" class="form-control @error('password') is-invalid @enderror" name="password">

								@error('password')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
							</div>
						</div>

						<div class="form-group row justify-content-center px-3">
							<div class="col-xl-8 col-md-8 col-12">
								<div class="row">
									<div class="col-6 px-0">
										<div class="custom-control custom-checkbox mb-3"> 
										<input {{ old('remember') ? 'checked' : '' }} id="remember" name="remember" id="remember" value="1" type="checkbox" class="custom-control-input checkbox-muted"> 
										<label for="remember" class="custom-control-label text-muted">Remember Me</label> </div>
									</div> <!-- Forgot Password Link -->
									<div class="col-6 px-0 text-right"> 
										<span><a href="{{ route('password.request') }}"><b>Forgot Password?</b></a></span> 
									</div>
								</div>
							</div>
						</div> <!-- Log in Button -->
						
						<div class="form-group row justify-content-center">
							<div class="col-xl-4 col-md-6 col-8"> 
								<button type="submit" class="btn btn-block btn-primary text-uppercase">
									{{ __('Sign In') }}
								</button>
							</div>
						</div>

						@if(!$socialSettings->isEmpty())
							<div class="row px-3 mb-4">
								<div class="line"></div> <small class="or text-center">OR</small>
								<div class="line"></div>
							</div>

							<div class="form-group row justify-content-center">
								<div class="col-xl-8 col-md-8 col-10 text-center text-md-left">
									@foreach($socialSettings as $key => $value)
										
										<a href="{{URL::route('social.redirect',$value->provider)}}" class="d-none d-lg-block btn btn-block btn-social btn-{{$value->provider}} text-uppercase"> 
											<span class="ffa ffa-{{$value->provider}} icon-{{$value->provider}}"></span> Sign in with {{ucfirst($value->provider)}} </a>
										
										<a href="{{URL::route('social.redirect',$value->provider)}}" class="d-lg-none btn btn-inline btn-social btn-{{$value->provider}} btn-social-mobile">
											<span class="icon-{{$value->provider}}"></span>
										</a>
									@endforeach
								</div>
							</div>
						@endif
					</form>
				</div>
			</div>
			<div class="pt-2">
				<div class="row justify-content-center">
					<p>Don't have an account? <span><a href="{{url('register')}}"><strong>Register Now!</strong></a></span></p>
				</div>
			</div>
		</div>
	</div>
</div>

<style type="text/css">
	.line {
	height: 1px;
	width: 45%;
	background-color: #E0E0E0;
	margin-top: 10px
}

.or {
	width: 10%;
	font-weight: bold
}
</style>
@endsection