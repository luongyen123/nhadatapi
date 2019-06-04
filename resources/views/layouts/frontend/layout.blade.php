<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Nhà đất Á Châu</title>
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="{{asset('../dist/css/boostrap3_6.min.css')}}">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" >
        <link rel="stylesheet" type="text/css" href="{{asset('../frontend/nhdat.css')}}">
        @yield('css')
	</head>
	<body>
		<div class="container">
            @include('blocks.frontend.header')
			@yield('content')
            @include('blocks.frontend.footer')
		</div>

		<!-- jQuery -->
        <script src="{{asset('../dist/modules/jquery.min.js')}}"></script>
		<!-- Bootstrap JavaScript -->
        <script src="{{asset('../dist/modules/bootstrap/js/bootstrap.min.js')}}"></script>	</body>
        @yield('js')
</html>
