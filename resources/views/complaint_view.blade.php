<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Complaint View</title>
 
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.css" />

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;                                          
                height: 100vh;
                margin: 0;                     
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;                
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #fff;
                padding: 0 10px;
                font-size: 15px;
                font-weight: 600;
                letter-spacing: .025rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }            
            #tt table {
                font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
                border-collapse: collapse;
                width: 500px;
                align-items: center;
            }

            #tt td,#tt th {                
                color: black;
                border: 1px solid #ddd;
                padding: 8px;
            }

            #tt tr:nth-child(even) {background-color: #f2f2f2;}

            #tt tr:hover {background-color: #ddd;}

            #tt th {
                padding-top: 10px;
                padding-bottom: 10px;
                text-align: center;
                background-color: #4CAF50;
                color: black;
            }
            #tt tbody{
              overflow-y: scroll;
              overflow-x: scroll;
              height: 1500px;
              width: 1000px;
            }
        </style>
    </head>
    <body>
    @if($data)
        <h1  class="animated zoomIn" style="margin-left:300px">Complaint View</h1>
        <form method="POST" action="http://metrorail.local:8000/complaint_check">
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> 
        <table id="tt" style="margin-left:300px" >
          <tr>
                <td class="animated zoomIn">Compalint Id</td>
                <td class="animated zoomIn">User's Name</td>
                <td class="animated zoomIn">User's Contact No.</td>
				<td class="animated zoomIn">User's Email</td>
				<td class="animated zoomIn">Complaint</td>
		</tr>
            @foreach($data as $temp)
              <tr class="animated zoomIn">
                <td>{{ $temp->complaint_id}}</td>
                <td>{{ $temp->user_name}}</td>
                <td>{{ $temp->user_contact_number}}</td>
				<td>{{ $temp->user_email}}</td>
				<td>{{ $temp->complaint}}</td>
			</tr>
            @endforeach
        </table>
  @else
    <h5  style="margin-left:300px">No View</h5>
  @endif
</table>

         <h5  style="margin-left:300px"></h5>
            <div class="form-group row" style="margin-left:300px">
            <label for="staff_id" class="col-md-5 col-form-label text-md-right">Complaint Id</label> 
            <div class="col-md-7">
            <select name = "selected_cname" class="col-md-3 col-form-label text-md-right">
             @foreach($data as $temp)
               <option value={{ $temp->complaint_id}}>{{ $temp->complaint_id}}</option>
            @endforeach
            </select>
            </div>
          </div> 

           <div class="form-group row" style="margin-left:300px">
            <h5  style="margin-left:300px"></h5>
            <label for="check" class="col-md-5 col-form-label text-md-right">Review Status</label> 
            <input type="radio" name="check" value="Checked"> Checked
            <input type="radio" name="check" value="Unchecked"> Not Checked<br>
            </div>

            <div class="form-group row mb-0">
            <h4  style="margin-left:300px"></h4>
            <div class="col-md-6 offset-md-4" style="margin-left:300px">
              <button type="submit" class="btn btn-primary">Submit Status</button>
            </div>
          </div>

           @if($value)
                 <div class="form-group row" style="margin-left:300px">
                <h4  style="margin-left:300px"></h4>
                <label for="check" class="col-md-5 col-form-label text-md-right">{{$value}}</label>
                  </div>
            @endif

            @if($value=="Update Success!!!!")
                 <script type="text/javascript">alert("Notified User About Their Complain");</script>
            @endif



</body>
</html>


