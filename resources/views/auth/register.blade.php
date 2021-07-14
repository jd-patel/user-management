@extends('layouts.app')@section("htmlheader_title", "Register")

@section('content')
<div class="container pt-3">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-8 mx-auto">
            <div class="card shadow border-0">
                <h4 class="card-title text-white card-header text-center text-uppercase bg-primary p-3">{{ __('Create Your Account') }}</h4>
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-row row mt-md-2">
                            <div class="col-md-6 form-group">
                                <label for="first_name" class="control-label">{{ __('First Name') }} <span class="text-danger">*</span></label>
                                <input id="first_name" type="text" placeholder="{{ __('First Name') }}" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" autofocus>

                                @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-6 form-group">
                                <label for="last_name" class="control-label">{{ __('Last Name') }}</label>
                                <input id="last_name" type="text" placeholder="{{ __('Last Name') }}" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" autofocus>

                                @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-row row mt-md-2">
                            <div class="col-md-6 form-group">
                                <label for="email" class="control-label">{{ __('Email Address') }} <span class="text-danger">*</span></label>
                                <input id="email" type="email" placeholder="{{ __('Email Address') }}" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-6 form-group">
                                <label for="phone_number" class="control-label">{{ __('Phone Number') }} <small>(e.g +91 XXX XXX XXXX)</small> <span class="text-danger">*</span></label>
                                <input id="phone_number" type="digit" placeholder="{{ __('Phone Number') }}" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ old('phone_number') }}" autofocus>
                                @error('phone_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-row mt-md-2">
                            <div class="col-md-6 form-group">
                                <label for="date_of_birth" class="control-label">{{ __('Date Of Birth') }} <span class="text-danger">*</span></label>
                                <div class="input-group">
                                <input id="date_of_birth" type="text" placeholder="{{ __('Date Of Birth') }}" class="datepicker form-control @error('date_of_birth') is-invalid @enderror p-2" name="date_of_birth" value="{{ old('date_of_birth') }}" autofocus>
                                <span class="input-group-prepend" for="date_of_birth">
                                    <label class="input-group-text" for="date_of_birth">
                                        <i class="fa fa-calendar">
                                        </i>
                                    </label>
                                </span>
                                </div>
                                @error('date_of_birth')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6 form-check custom-radio">
                                <label for="gender_male" class="control-label clear">{{ __('Gender') }} <span class="text-danger">*</span></label>
                                <div class="input-group">
                                <label class="form-check form-check-inline ml-2">
                                    <input id="gender_male" @if(old('gender') == 'Male') checked @endif type="radio" value="Male" class="form-check-input custom-control-input @error('gender') is-invalid @enderror" name="gender">
                                    <span class="custom-control-label"> Male </span>
                                </label>

                                <label class="form-check form-check-inline">
                                    <input id="gender_female" @if(old('gender') == 'Female') checked @endif type="radio" value="Female" class="form-check-input custom-control-input @error('gender') is-invalid @enderror" name="gender">
                                    <span class="custom-control-label"> Female </span>
                                </label>
                            </div>

                                @error('gender')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-row mt-md-2">
                            <label for="password" class="control-label">{{ __('Password') }} <span class="text-danger">*</span></label>

                            <div class="col-md-12 form-group">
                                <input id="password" type="password" placeholder="{{ __('Password') }}" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-row mt-md-2">
                            <div class="col-md-12 form-group">
                                <label for="password-confirm" class="control-label">{{ __('Confirm Password') }} <span class="text-danger">*</span></label>
                                <input id="password-confirm" type="password" placeholder="{{ __('Confirm Password') }}" class="form-control" name="password_confirmation" autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row justify-content-center mt-md-2">
                            <div class="col-xl-4 col-md-6 col-8"> 
                                <button type="submit" class="btn btn-block btn-primary text-uppercase">
                                    {{ __('Sign Up') }}
                                </button>
                            </div>
                        </div>

                        @if(!$socialSettings->isEmpty())
                            <div class="row px-3 mb-4">
                                <div class="line"></div> <small class="or text-center">OR</small>
                                <div class="line"></div>
                            </div>

                            <div class="form-group row justify-content-center">
                                <div class="col-xl-6 col-md-8 col-10 text-center">
                                    @foreach($socialSettings as $key => $value)
                                        
                                        <a title="Sign Up With {{ucfirst($value->provider)}}" href="{{URL::route('social.redirect',$value->provider)}}" class="btn btn-inline btn-social btn-{{$value->provider}} btn-social-mobile">
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
                    <p>Already have an account? <span><a href="{{URL::route('login')}}"><strong>Sign In!</strong></a></span></p>
                </div>
            </div>
        </div>
    </div>
</div>
<link href="{{ asset('/public/css/bootstrap-datepicker.min.css') }}" rel="stylesheet">  
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
<script src="{{ asset('/public/js/bootstrap-datepicker.min.js') }}"></script>
<script type="text/javascript">

$( document ).ready(function() {

    $('.datepicker').datepicker({
      format: "dd-mm-yyyy",
      autoclose: true,
      startView: 'decade',
      maxViewMode: 2,
      endDate: '-0d',
    });
});
</script>
@endsection