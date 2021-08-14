<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
   <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="iTW6U4SuI1leJ74Ze1T2BVP2HjeawlfpQyU9PeZQ">

    <title>SignUp Page</title>

    <!-- Scripts -->
    <script src="http://metrorail.local:8000/js/app.js" defer=""></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="http://metrorail.local:8000/css/app.css" rel="stylesheet">
</head>

    <body>
      <div class="card-header">SignUp Page</div>
     <div class="card-body">
      <form method="POST" action="http://metrorail.local:8000/register">
        <input type="hidden" name="_token" value="iTW6U4SuI1leJ74Ze1T2BVP2HjeawlfpQyU9PeZQ"> 
        <div class="form-group row">
          <label for="name" class="col-md-4 col-form-label text-md-right">Name</label> 
          <div class="col-md-6">
            <input id="name" type="text" name="name" value="" required="required" autocomplete="name" autofocus="autofocus" class="form-control ">
          </div>
        </div> 
        <div class="form-group row">
          <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
           <div class="col-md-6">
            <input id="email" type="email" name="email" value="" required="required" autocomplete="email" class="form-control "></div>
          </div> 
          <div class="form-group row">
            <label for="password" class="col-md-4 col-form-label text-md-right">Password</label> 
            <div class="col-md-6">
              <input id="password" type="password" name="password" required="required" autocomplete="new-password" class="form-control ">
            </div>
          </div> 
           <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
              <button type="submit" class="btn btn-primary"> Register </button>
            </div>
          </div>
        </form>
      </div>
    </body>
</html>

