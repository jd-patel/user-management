
<!-- jQuery -->
<script src="{{ asset('/public/vendor/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('/public/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('/public/vendor/adminlte/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('/public/vendor/adminlte/dist/js/demo.js')}}"></script>

<script src="{{ asset('/public/vendor/toastr/toastr.min.js')}}"></script>

<script type="text/javascript">
	@if(session()->has('success'))
		toastr["success"]("{{ session()->get('success') }}");
	@endif

	@if(session()->has('error'))
		toastr["error"]("{{ session()->get('error') }}");
	@endif

	@if(session()->has('warning'))
		toastr["warning"]("{{ session()->get('warning') }}");
	@endif

	@if(session()->has('info'))
		toastr["info"]("{{ session()->get('info') }}");
	@endif
</script>
@stack('scripts')