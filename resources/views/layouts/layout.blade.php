<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" name="viewport">
  <title>@yield('title') - Nhà đất Á Châu</title>

  <link rel="stylesheet" href="{{asset('../dist/modules/bootstrap/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('../dist/modules/ionicons/css/ionicons.min.css')}}">
  <link rel="stylesheet" href="{{asset('../dist/css/demo.css')}}">
  <link rel="stylesheet" href="{{asset('../dist/css/style.css')}}">
  <style>
    .main-sidebar .sidebar-menu li#{{$id}} a{
      color: #574B90;
      background-color: #f6f6f6;
    }
    .pagination{
      float:right;
    }
  </style>
   @yield('css')
</head>
<body>
    <?php
        $user = $_COOKIE['user'];
        $user = json_decode($user);
    ?>
  <div id="app">
       <div class="main-wrapper">

        @include('blocks.header')
        @include('blocks.left')
           <div class="main-content">
              @yield('content')
            </div>
      </div>
  </div>
  <script src="{{asset('../dist/modules/jquery.min.js')}}"></script>
  <script src="{{asset('../dist/modules/bootstrap/js/bootstrap.min.js')}}"></script>
  <script src = "{{asset('../dist/js/backend/cookie.min.js')}}"></script>
  <script src="{{asset('../dist/js/checktoken.js')}}"></script>
  @yield('js')
</body>
</html>
