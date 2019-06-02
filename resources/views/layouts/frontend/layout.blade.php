<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Nhà đất Á Châu</title>
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
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
