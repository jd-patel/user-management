@extends('layouts.app')@section("htmlheader_title", "Reset Password")

@section('content')
<div class="container pt-3">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6 mx-auto">
            <div class="card shadow border-0">
                <h4 class="card-title text-white card-header text-center text-uppercase bg-primary p-3">{{ __('Reset Password') }}</h4>

                <div class="card-body">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">
                        <div class="form-group row">
                            <div class="col-md-8 offset-md-2">
                                <label for="email" class="control-label">{{ __('Email Address') }} <span class="text-danger">*</span></label>
                                <input id="email" type="email" placeholder="{{ __('Email Address') }}" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" autofocus>
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

                        <div class="form-group row">
                            <div class="col-md-8 offset-md-2">
                                <label for="password-confirm" class="control-label">{{ __('Confirm Password') }} <span class="text-danger">*</span></label>
                                <input id="password-confirm" type="password" placeholder="{{ __('Confirm Password') }}" class="form-control" name="password_confirmation">
                            </div>
                        </div>

                        <div class="form-group row justify-content-center mb-0">
                            <div class="col-xl-4 col-md-6 col-8">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Reset Password') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
