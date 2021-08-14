<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
   <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Repairworker SignUp Page</title>

    @csrf @method('POST')

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="http://metrorail.local:8000/css/app.css" rel="stylesheet">
</head>

    <body>
      <div class="card-header">Repairworker SignUp Page</div>
     <div class="card-body">
      <form method="POST" action="http://metrorail.local:8000/register/repairworker">
          @csrf @method('POST')
        <input type="hidden" name="_token" value = "<?php echo csrf_token(); ?>"> 
         @if($value!='')
            <p> <h4  class="animated infinite bounce" style="margin-left:600px;margin-top:50px"> {{$value}} </h4> </p>
           @endif
          
          <div class="form-group row">
            <label for="working_area" class="col-md-4 col-form-label text-md-right">Working Area</label> 
            <div class="col-md-6">
              <input type="text" name="working_area">
            </div>
          </div> 
          
          <div class="form-group row">
            <label for="speciality" class="col-md-4 col-form-label text-md-right">Speciality</label> 
            <div class="col-md-6">
              <input type="text" name="speciality">
            </div>
          </div> 
          
           <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </div>
        </form>
        <div id="button"><a href="/contact">Log In</a></div>
      </div>
    </body>
</html>

