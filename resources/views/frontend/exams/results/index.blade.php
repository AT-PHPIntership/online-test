<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title></title>
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="{{ asset('bower_components/AdminLTE/bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
</head>
<body>
  <div class="col-md-6">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>{{trans('frontend.correctlistening')}}</th>
          <th>{{trans('frontend.point')}} </th>
          <th>{{trans('frontend.correctreading')}} </th>
          <th>{{trans('frontend.point')}}  </th>
          <th>{{trans('frontend.sumpoint')}} </th>
        </tr>
      </thead>
      <tbody>
        <tr>
        <td>{{$correctReading}}/100</td>
          <td>
            {{getReadingScore($correctReading)}}
          </td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
      </tbody>
    </table>
  </div>
</body>
<!-- jQuery 2.2.3 -->
<script src="{{ asset('bower_components/AdminLTE/plugins/jQuery/jquery-2.2.3.min.js') }}"></script>
<!-- Bootstrap 3.3.6 -->
<script src="{{ asset('bower_components/AdminLTE/bootstrap/js/bootstrap.min.js') }}"></script>
</html>