<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
   <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SignUp Page</title>

    @csrf @method('POST')

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="http://metrorail.local:8000/css/app.css" rel="stylesheet">
</head>

    <body>
      <div class="card-header">SignUp Page</div>
     <div class="card-body">
      <form method="POST" action="http://metrorail.local:8000/create/user">
          @csrf @method('POST')
        <input type="hidden" name="_token" value = "<?php echo csrf_token(); ?>"> 
         @if($value!='')
            <p> <h4  class="animated infinite bounce" style="margin-left:600px;margin-top:50px"> {{$value}} </h4> </p>
           @endif
        <div class="form-group row">
          <label for="User_email" class="col-md-4 col-form-label text-md-right">Email id</label> 
          <div class="col-md-6">
            <input required type="email" name="user_email" >
          </div>
        </div> 
        
        <div class="form-group row">
          <label for="first_name" class="col-md-4 col-form-label text-md-right">First Name</label> 
          <div class="col-md-6">
            <input required type="text" name="first_name" >
          </div>
        </div> 
        
        <div class="form-group row">
          <label for="last_name" class="col-md-4 col-form-label text-md-right">Last Name</label> 
          <div class="col-md-6">
            <input required type="text" name="last_name" >
          </div>
        </div> 
        
        <div class="form-group row">
          <label for="occupation" class="col-md-4 col-form-label text-md-right">Occupation</label> 
          <div class="col-md-6">
            <input type="text" name="occupation" >
          </div>
        </div> 
          
          <div class="form-group row">
            <label for="User_pwd" class="col-md-4 col-form-label text-md-right">Password</label> 
            <div class="col-md-6">
              <input required type="text" name="user_pwd">
            </div>
          </div> 
          
          <div class="form-group row">
            <label for="house_no" class="col-md-4 col-form-label text-md-right">House No</label> 
            <div class="col-md-6">
              <input type="text" name="house_number">
            </div>
          </div> 
          
          <div class="form-group row">
            <label for="road_no" class="col-md-4 col-form-label text-md-right">Road No</label> 
            <div class="col-md-6">
              <input  type="text" name="road_number">
            </div>
          </div> 
          
          <div class="form-group row">
            <label for="block" class="col-md-4 col-form-label text-md-right">Block</label> 
            <div class="col-md-6">
              <input type="text" name="block">
            </div>
          </div> 
          
          <div class="form-group row">
            <label for="city" class="col-md-4 col-form-label text-md-right">Road No</label> 
            <div class="col-md-6">
              <input type="text" name="city">
            </div>
          </div> 
          
          <div class="form-group row">
            <label for="contact" class="col-md-4 col-form-label text-md-right">Contact No</label> 
            <div class="col-md-6">
              <input type="text" name="contact">
            </div>
          </div> 

           <div class="form-group row">
            <label for="User_role" class="col-md-4 col-form-label text-md-right">Role</label> 
            <div class="col-md-6">
            <select name = "selected_reqname" class="col-md-3 col-form-label text-md-right">
            <option value="metrocard">MetroCard</option>
            <option value="normal_user">Normal User</option>
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

