@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Landing Page') }}</div>
                <div class="card-body">
                    <p>
                        Hey
                        @guest There, @else {{Auth::user()->first_name}}, @endguest
                    </p>
                    <p>You are on the landing page!</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection