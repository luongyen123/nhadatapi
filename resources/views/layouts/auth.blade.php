<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" name="viewport">
  <title>Nhà đất Á Châu - Admin</title>

  <link rel="stylesheet" href="{{asset('../dist/modules/bootstrap/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('../dist/modules/ionicons/css/ionicons.min.css')}}">

  <link rel="stylesheet" href="{{asset('../dist/css/demo.css')}}">
  <link rel="stylesheet" href="{{asset('../dist/css/style.css')}}">
  @yield('css')
</head>

<body>
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                @yield('content')
            </div>
        </section>
    </div>
    <script src="{{asset('../dist/modules/jquery.min.js')}}"></script>
  <script src="{{asset('../dist/modules/bootstrap/js/bootstrap.min.js')}}"></script>
  <script src = "{{asset('../dist/js/backend/cookie.min.js')}}"></script>
  @yield('js')
</body>
</html>
