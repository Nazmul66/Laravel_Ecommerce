<!-- latest jquery-->
<script src="{{ asset('frontend/assets/js/jquery-3.3.1.min.js') }}"></script>

<!-- portfolio js -->
<script src="{{ asset('frontend/assets/js/isotope.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/main.js') }}"></script>

<!-- menu js-->
<script src="{{ asset('frontend/assets/js/menu.js') }}"></script>
<script src="{{ asset('frontend/assets/js/sticky-menu.js') }}"></script>

<!-- feather icon js-->
<script src="{{ asset('frontend/assets/js/feather.min.js') }}"></script>

<!-- lazyload js-->
<script src="{{ asset('frontend/assets/js/lazysizes.min.js') }}"></script>

<!-- slick js-->
<script src="{{ asset('frontend/assets/js/slick.js') }}"></script>
<script src="{{ asset('frontend/assets/js/slick-animation.min.js') }}"></script>

<!-- Bootstrap js-->
<script src="{{ asset('frontend/assets/js/bootstrap.bundle.min.js') }}"></script>

<!-- Bootstrap Notification js-->
<script src="{{ asset('frontend/assets/js/bootstrap-notify.min.js') }}"></script>

<!-- Theme js-->
<script src="{{ asset('frontend/assets/js/theme-setting.js') }}"></script>
<script src="{{ asset('frontend/assets/js/color-setting.js') }}"></script>
<script src="{{ asset('frontend/assets/js/script.js') }}"></script>
<script src="{{ asset('frontend/assets/js/custom-slick-animated.js') }}"></script>


<script>
    $(window).on('load', function () {
        setTimeout(function () {
            $('#exampleModal').modal('show');
        }, 2500);
    });

    function openSearch() {
        document.getElementById("search-overlay").style.display = "block";
    }

    function closeSearch() {
        document.getElementById("search-overlay").style.display = "none";
    }
    feather.replace();
</script>

	<!-- toaster Js plugins  -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

	<script type="text/javascript">
		toastr.options = {
			"closeButton": true,
			"debug": false,
			"newestOnTop": false,
			"progressBar": true,
			"positionClass": "toast-top-right",
			"preventDuplicates": false,
			"onclick": null,
			"showDuration": "300",
			"hideDuration": "1000",
			"timeOut": "5000",
			"extendedTimeOut": "1000",
			"showEasing": "swing",
			"hideEasing": "linear",
			"showMethod": "fadeIn",
			"hideMethod": "fadeOut"
		}
	</script>

	<script type="text/javascript">	
	   @if ( Session::has( 'message' ) )

		  var type = "{{ Session::get('alert-type', 'info') }}";

		  switch( type ){
			  case 'info':
			     toastr.info("{{ Session::get('message') }}");
                break;

			  case 'success':
			      toastr.success("{{ Session::get('message') }}");
                break;

			  case 'warning':
			      toastr.warning("{{ Session::get('message') }}");
                break;

			  case 'error':
			      toastr.error("{{ Session::get('message') }}");
				break;
		  }

	   @endif
	</script>

	<script>
    (function (window, document) {
        var loader = function () {
            var script = document.createElement("script"), tag = document.getElementsByTagName("script")[0];
            script.src = "https://seamless-epay.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(7);
            tag.parentNode.insertBefore(script, tag);
        };
    
        window.addEventListener ? window.addEventListener("load", loader, false) : window.attachEvent("onload", loader);
    })(window, document);
</script>

 @yield('script')