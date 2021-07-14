@section('htmlheader')
	@include('admin.layouts.partials.htmlheader')
@show
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
<!-- Navbar -->
  
@include('admin.layouts.partials.navbar')

@include('admin.layouts.partials.sidebar')

<!-- Your Page Content Here -->
@yield('main-content')


{{-- Footer --}}
@include('admin.layouts.partials.footer')


{{-- Script --}}
@include('admin.layouts.partials.scripts')

</div>
</body>
</html>