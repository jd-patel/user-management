<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, maximum-scale=1.0, user-scalable=no">
	<title>@hasSection('htmlheader_title')@yield('htmlheader_title') - @endif {{config('app.name')}} Admin</title>
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="">

	<!-- Favicons -->
    <link rel="shortcut icon" href="{{asset('/public/img/icon.png')}}" type="image/x-icon"/>
    <link rel="icon" href="{{asset('/public/img/icon.png')}}" type="image/x-icon"/>
	<!-- Bootstrap CSS -->

	<!-- Google Font: Source Sans Pro -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="{{ asset('/public/vendor/fontawesome-free/css/all.min.css') }}">
	<!-- Theme style -->
	<link rel="stylesheet" href="{{ asset('/public/vendor/adminlte/dist/css/adminlte.min.css') }}">

	<link rel="stylesheet" href="{{ asset('/public/vendor/toastr/toastr.css') }}">

	<link rel="stylesheet" href="{{ asset('/public/vendor/custom.css') }}">
  
	@stack('styles')

	@if( env('APP_ENV') == 'Production' )
		<!-- Google Analytics -->
	@endif
</head>
