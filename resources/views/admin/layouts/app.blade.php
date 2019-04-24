
<!DOCTYPE html>
<html>
	@include('admin.parts.head')
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
	@include('admin/parts/nav')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->   
	@include('admin/parts/sidebar')
  <!-- Content Wrapper. Contains page content -->
  {{-- 	@include('admin.parts.content') --}}
  @yield('content')
  <!-- /.content-wrapper -->
  

 	@include('admin/parts/footer')
</div>
<!-- ./wrapper -->

		<!-- jQuery -->
		<script src=" {{ asset('vendor/adminlte') }}/plugins/jquery/jquery.min.js"></script>
		<!-- Bootstrap 4 -->
		<script src=" {{ asset('vendor/adminlte') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
		<!-- SlimScroll -->
		<script src=" {{ asset('vendor/adminlte') }}/plugins/slimScroll/jquery.slimscroll.min.js"></script>
		<!-- FastClick -->
		<script src=" {{ asset('vendor/adminlte') }}/plugins/fastclick/fastclick.js"></script>
		<!-- AdminLTE App -->
		<script src=" {{ asset('vendor/adminlte') }}/dist/js/adminlte.min.js"></script>
		<!-- AdminLTE for demo purposes -->
		{{-- <script src=" {{ asset('vendor/adminlte') }}/dist/js/demo.js"></script> --}}
		 <!-- Custom script for laravel -->
    	<script src="{{ asset('js/app.js') }}"></script>
		@stack('scripts')
	</body>
</html>
