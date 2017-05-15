<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>AT Exams Toeic</title>
  <link href="{{asset('/bower_components/AdminLTE/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('/frontend/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href="{{asset('/frontend/css/master.css')}}" rel="stylesheet">
</head>
<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
  @include('frontend.layouts.header')
  <!-- News Section -->
  @yield('content')
  @include('frontend.layouts.footer')
  <script src="{{asset('/frontend/jquery/jquery.js')}}"></script>
  <script src="{{asset('/bower_components/AdminLTE/plugins/jQueryUI/jquery-ui.js')}}"></script>
  <script src="{{asset('/bower_components/AdminLTE/bootstrap/js/bootstrap.min.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
  <script type="text/javascript" src="{{asset('/frontend/js/main.js')}}"></script>
</body>

</html>
