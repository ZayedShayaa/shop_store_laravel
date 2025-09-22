<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="Description" content="Bootstrap Responsive Admin Web Dashboard HTML5 Template">
	<meta name="Author" content="Spruko Technologies Private Limited">

	<meta name="Keywords" content="" />
	{{-- @include('layouts.head') --}}
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
	@yield('title')
	@yield('css')
</head>

<body class="main-body bg-primary-transparent">
	<!-- Loader -->
	<div id="global-loader">
		{{-- <img src="{{URL::asset('assets/img/loader.svg')}}" class="loader-img" alt="Loader"> --}}
	</div>
	<!-- /Loader -->
	@yield('content')
	{{-- @include('layouts.footer-scripts') --}}
</body>

</html>