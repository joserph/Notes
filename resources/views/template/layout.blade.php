<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<title>@yield('title', 'App Notes')</title>

    <link rel="stylesheet" href="{{ asset('css/materialize.css') }}">
    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('font-awesome/css/font-awesome.min.css') }}">


	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<div id="wrapper">
		<div class="container">
			@include('template.nav')
			
			@yield('content')
		</div>		
	</div>
	<!-- Scripts -->
	<script src="{{ asset('js/jquery.min.js') }}"></script>
	<script src="{{ asset('js/materialize.min.js') }}"></script>
	<script>
		$( document ).ready(function(){
			$(".button-collapse").sideNav();
		})
	</script>
	@yield('scripts')
</body>
</html>