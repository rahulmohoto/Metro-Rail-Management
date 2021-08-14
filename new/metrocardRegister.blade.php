<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
   <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Metrocard SignUp Page</title>

    @csrf @method('POST')

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="http://metrorail.local:8000/css/app.css" rel="stylesheet">
</head>

    <body>
      <div class="card-header">Metrocard SignUp Page</div>
     <div class="card-body">
      <form method="POST" action="http://metrorail.local:8000/create/metrouser">
          @csrf @method('POST')
        <input type="hidden" name="_token" value = "<?php echo csrf_token(); ?>"> 
         @if($value!='')
            <p> <h4  class="animated infinite bounce" style="margin-left:600px;margin-top:50px"> {{$value}} </h4> </p>
           @endif
        <div class="form-group row">
          <label for="User_id" class="col-md-4 col-form-label text-md-right">User id</label> 
          <div class="col-md-6">
            <input required type="text" name="user_id" >
          </div>
        </div> 
        
        <div class="form-group row">
          <label for="nid" class="col-md-4 col-form-label text-md-right">NID</label> 
          <div class="col-md-6">
            <input required type="text" name="nid" >
          </div>
        </div> 
         
        <div class="form-group row">
            <label for="User_pwd" class="col-md-4 col-form-label text-md-right">Subscription Type</label> 
            <div class="col-md-6">
            <select name ="selected_name" class="col-md-3 col-form-label text-md-right">
            <option value="periodically">periodically</option>
            <option value="monthly">monthly</option>
            <option value="yearly">yearly</option>
            </select>
            </div>
        </div> 

           <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
              <button type="submit" class="btn btn-primary" >Register</button>
            </div>
          </div>
        </form>
        <div id="button"><a href="/contact">Log In</a></div>
      </div>
    </body>
</html>

