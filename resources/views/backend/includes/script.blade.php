	<!-- Bootstrap JS -->
	<script src="{{ asset('backend/js/bootstrap.bundle.min.js') }} "></script>
	<!--plugins-->
	<script src="{{ asset('backend/js/jquery.min.js') }} "></script>
	<script src="{{ asset('backend/plugins/simplebar/js/simplebar.min.js') }} "></script>
	<script src="{{ asset('backend/plugins/metismenu/js/metisMenu.min.js') }} "></script>
	<script src="{{ asset('backend/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }} "></script>
	<script src="{{ asset('backend/plugins/chartjs/chart.min.js') }} "></script>
	<script src="{{ asset('backend/plugins/peity/jquery.peity.min.js') }} "></script>
	<script src="{{ asset('backend/plugins/datatable/js/jquery.dataTables.min.js') }} "></script>
	<script src="{{ asset('backend/plugins/datatable/js/dataTables.bootstrap5.min.js') }} "></script>
	<script src="{{ asset('backend/js/dashboard-eCommerce.js') }} "></script>
	<!--app JS-->
	<script src="{{ asset('backend/js/app.js') }}"></script>
	<script>
		new PerfectScrollbar('.product-list');
		new PerfectScrollbar('.customers-list');
	</script>
	
	@yield('script')