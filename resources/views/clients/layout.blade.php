<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" >
<head>
<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>@yield('title','') | Radmin - Laravel Admin Starter</title>
	<!-- initiate head with meta tags, css and script -->
	@include('include.head')
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


	<script>
		toastr.options = {
			"closeButton": true,
			"progressBar": true,
			// Add any additional options as per your requirements
		};
	</script>

</head> 
<body id="app" >
    <div class="wrapper">
    	<!-- initiate header-->
    	@include('clients.header')
    	<div class="page-wrap">
	    	<!-- initiate sidebar-->
	    	@include('clients.client_sidebar')

	    	<div class="main-content">
	    		<!-- yeild contents here -->
	    		@yield('content')
	    	</div>

	    	<!-- initiate chat section-->
	    	@include('include.chat')


	    	<!-- initiate footer section-->
	    	@include('include.footer')

    	</div>
    </div>
    
	<!-- initiate modal menu section-->
	@include('include.modalmenu')

	<!-- initiate scripts-->
	@include('include.script')	


	<div class="col-xl-12">
		@if ($message = Session::get('danger'))
		<script>
			toastr.error('{{ $message }}');
		</script>
		@endif

		@if ($message = Session::get('success'))
		<script>
			toastr.success('{{ $message }}');
		</script>
		@endif

	</div>
</body>
</html>