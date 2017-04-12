<!DOCTYPE html> 
<html lang="en"> 
<head> 
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> 
  <!-- Meta, title, CSS, favicons, etc. --> 
  <meta charset="utf-8"> 
  <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
  <meta name="viewport" content="width=device-width, initial-scale=1"> 

  <title>{!! trans('labels.exam_login') !!}</title> 

  <!-- CSS --> 

  <!-- Font Awesome --> 
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css"> 

  <!-- Ionicons --> 
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"> 

</head> 

<body class="login"> 
  <div> 
    <div class="login_wrapper"> 
      <div class="animate form login_form"> 
        <section class="login_content"> 
        <form method="POST" role="form" id="form-login" action="{{ url('admin\login') }}">
        {{ csrf_field() }}

        <h1>{!! trans('labels.login_form') !!}</h1> 
            
        <!-- Email -->
          <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
           <div class="form-group"> 
             <input type="email" class="form-control" id="email" placeholder="Email" name="email"> 
             @if ($errors->has('email'))
                  <span class="help-block">
                      <strong>{{ $errors->first('email') }}</strong>
                  </span>
              @endif
           </div>
          </div>
        
        <!-- Password -->
          <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
           <div class="form-group"> 
             <input type="password" class="form-control" id="password" placeholder="Password" name="password"> 
              @if ($errors->has('password'))
                  <span class="help-block">
                      <strong>{{ $errors->first('password') }}</strong>
                  </span>
              @endif 
           </div> 
          </div>

           <div> 
             <button type="submit" id="login" class="btn btn-default submit">{!! trans('labels.login_button') !!}</button> 
           </div> 

           <div class="separator"> 

            <div> 
              <h1><i class="fa fa-cogs"></i> {!! trans('labels.my_promotion') !!}</h1>
            </div> 
          </div> 
        </form> 
      </section> 
    </div> 
  </div> 
</div> 

<!-- Javascript --> 

</body> 
</html> 
