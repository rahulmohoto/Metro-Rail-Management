<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
   <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login Page</title>

    @csrf @method('POST')

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="http://metrorail.local:8000/css/app.css" rel="stylesheet">
</head>

    <body>
      <div class="card-header">Login Page</div>
     <div class="card-body">
      <form method="POST" action="http://metrorail.local:8000/authenticate/user">
          @csrf @method('POST')
        <input type="hidden" name="_token" value = "<?php echo csrf_token(); ?>"> 
         @if($value!='')
            <p> <h4  class="animated infinite bounce" style="margin-left:600px;margin-top:50px"> {{$value}} </h4> </p>
           @endif
        <div class="form-group row">
          <label for="User_id" class="col-md-4 col-form-label text-md-right">User Mail id</label> 
          <div class="col-md-6">
            <input required type="email" name="user_id" >
          </div>
        </div> 
          
          <div class="form-group row">
            <label for="User_pwd" class="col-md-4 col-form-label text-md-right">Password</label> 
            <div class="col-md-6">
              <input required type="text" name="user_pwd">
            </div>
          </div> 
           
           <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
              <button type="submit" class="btn btn-primary">Log In</button>
            </div>
          </div>
        </form>
       <label for="auth" class="col-md-4 col-form-label text-md-right">Not a User ?</label>
        <div id="button" class="col-md-5 col-form-label text-md-right" ><a href="/signup">User SignUp</a></div>
      <label for="auth" class="col-md-4 col-form-label text-md-right">Be a MetroCard User ?</label>
     <div id="button" class="col-md-5 col-form-label text-md-right" ><a href="/metrocardsignup">Metrocard User SignUp</a></div>
     <label for="auth" class="col-md-4 col-form-label text-md-right">Staff Registration?</label>
     <div id="button" class="col-md-5 col-form-label text-md-right" ><a href="/staffsignup">Staff SignUp</a></div>
      </div>
    </body>
</html>

