<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>@yield('title') AT Exams Toeic</title>
    <link href="{{asset('/bower_components/AdminLTE/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{asset('/frontend/css/master.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
    <script src="{{ asset('bower_components/AdminLTE/plugins/jQuery/jquery-2.2.3.min.js') }}"></script>
      <script type="text/javascript"> 
        $(document).ready( function() {
          $('#update').delay(3000).fadeOut();
        });
      </script>
      <script>
          window.Laravel = {!! json_encode([
              'csrfToken' => csrf_token(),
          ]) !!};
      </script>
  </head>
  <body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
    @include('frontend.layouts.partials.header')
    @if(Session::has('success'))
        <div class="alert alert-success text-center" id="update">
            {{ Session::get('success') }}
        </div>
    @endif
    @if(Session::has('failure'))
        <div class="alert alert-danger text-center" id="update">
            {{ Session::get('failure') }}
        </div>
    @endif
    @yield('content')
    @include('frontend.layouts.partials.footer')
    @yield('script')
    <!-- jQuery 2.2.3 -->
    <!-- Bootstrap 3.3.6 -->
    <script src="{{ asset('bower_components/AdminLTE/bootstrap/js/bootstrap.min.js') }}"></script>
  </body>
</html>
