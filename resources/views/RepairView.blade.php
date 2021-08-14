<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Repair View | Add</title>
 
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
        <h1  class="animated zoomIn" style="margin-left:300px">Repair View</h1>
        <table id="tt" style="margin-left:300px" >
          <tr>
                <td class="animated zoomIn">Train_id </td>
                <td class="animated zoomIn">Train_name</td>
                <td class="animated zoomIn">Component Id</td>
                <td class="animated zoomIn">Component Type</td>
                <td class="animated zoomIn">Manufacturer</td>                   
                <td class="animated zoomIn">Date of Installation</td>                
                <td class="animated zoomIn">Status</td>
                <td class="animated zoomIn">Sent to Repair</td>
                <td class="animated zoomIn">Cost</td> 
                <td class="animated zoomIn">Worker Name</td>   
            </tr>
            @foreach($data as $temp)
              <tr class="animated zoomIn">
                <td>{{ $temp->trainid}}</td>
                <td>{{ $temp->trainname}}</td>
                <td>{{ $temp->componentid}}</td>
                <td>{{ $temp->componenttype}}</td>
                <td>{{ $temp->manufacturer}}</td>                
                <td>{{ $temp->dateofinstallation}}</td>
                <td>{{ $temp->status}}</td>
                <td>{{ $temp->senttorepair}}</td>
                <td>{{ $temp->cost}}</td>
                <td>{{ $temp->workername}}</td>
              </tr>
            @endforeach
        </table>
  @else
    <h5  style="margin-left:300px">You Have No Train</h5>
  @endif
</table>
</body>
</html>


