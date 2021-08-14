<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<style>
#tt table {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 500px;
}

#tt td,#tt th {
    border: 1px solid #ddd;
    padding: 8px;
}

#tt tr:nth-child(even){background-color: #f2f2f2;}

#tt tr:hover {background-color: #ddd;}

#tt th {
    padding-top: 10px;
    padding-bottom: 10px;
    text-align: center;
    background-color: #4CAF50;
    color: white;
}
#tt tbody{
  overflow-y: scroll;
  overflow-x: scroll;
  height: 150px;
  width: 1000px;
}
</style>

   <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Permission Page</title>

    @csrf @method('POST')

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="http://metrorail.local:8000/css/app.css" rel="stylesheet">
</head>

    <body>
      <div class="card-header">administrative permission</div>
     <div class="card-body">
      <form method="POST" action="http://metrorail.local:8000/permit/user">
        <input type="hidden" name="_token" value = "<?php echo csrf_token(); ?>"> 
        @if($value!='show_info')
          <p> <h4  class="animated infinite bounce" style="margin-left:600px;margin-top:50px"> {{$value}} </h4> </p>
           @endif
        <div class="form-group row">
          <label for="User_id" class="col-md-4 col-form-label text-md-right">User id</label> 
          <div class="col-md-6">
          
           <select name = "selected_uname" class="col-md-3 col-form-label text-md-right">
            @foreach($data as $temp)
            <option value = {{$temp->user_id}}>{{$temp->user_id}}</option>
            @endforeach
          </select>

            <div class="col-form-label" >
               <div id="button" class="col-md-5 col-form-label text-md-left" ><a href="/user_view">view user info</a></div>
            </div>
          </div>
        </div> 
          
          <div class="form-group row">
            <label for="User_pwd" class="col-md-4 col-form-label text-md-right">Status</label> 
            <div class="col-md-6">
            <select name = "selected_name" class="col-md-3 col-form-label text-md-right">
            <option value="granted">granted</option>
            <option value="pending">pending</option>
            </select>
            </div>
          </div> 


           <div class="form-group row">
            <label for="User_role" class="col-md-4 col-form-label text-md-right">Role</label> 
            <div class="col-md-6">
            <select name = "selected_rname" class="col-md-3 col-form-label text-md-right">
            <option value="metrocard">MetroCard</option>
            <option value="normal_user">Normal User</option>
            </select>
            </div>
          </div> 

           
           <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </div>

           @if($value=='show_info')
           <p> <h4  class="animated infinite bounce" style="margin-left:600px;margin-top:50px"> </h4> </p>

           <div class="form-group row mb-0">
        <table id="tt" style="margin-left:450px">
          <tr>
                <td>user id</td>
                <td>first name</td>
                <td>last name</td>
                <td>occupation</td>
                <td>contact_no</td>
                <td>request</td>
                <td>status</td>              
            </tr>
            @foreach($data as $emp)
              <tr>
                <td>{{ $emp->user_id}}</td>
                <td>{{ $emp->first_name}}</td>
                <td>{{ $emp->last_name}}</td>
                <td>{{ $emp->occupation}}</td>
                <td>{{ $emp->contact_number}}</td>
                <td>{{ $emp->request}}</td> 
                <td>{{ $emp->status}}</td>             
              </tr>
            @endforeach
        </table>
      </div>
          @endif
        </form>
    </body>
</html>

