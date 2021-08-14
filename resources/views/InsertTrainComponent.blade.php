<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Insert Train Component| Add</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.css" />

        <!-- Styles -->
        <style>
            html, body {
                background-color: white;
                color: black;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;            
                background-image: url("MetroRail.jpg"); 
                background-size: 100% 100%;                
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
   </head>
   <body>
      <form action = "/create/train_component" method = "post">
         <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
         <h1  style="margin-left:300px">Insert Train Component</h1>
         <table id="tt" style="margin-left:300px" >
            <tr>
               <td>Train_id</td>
               <td><input type='text' name='Train_id' /></td>
            </tr>
            <tr>
               <td>Component_id</td>
               <td><input type='text' name='Component_id' /></td>
            </tr>
            <tr>
               <td>Status</td>
               <td><input type='text' name='Status' /></td>
            </tr>
            <tr>
               <td>Cost</td>
               <td><input type='text' name='Cost' /></td>
            </tr>
            <tr>
               <td>Installation_date</td>
               <td><input type='text' name='Installation_date' /></td>
            </tr>
            <tr>
               <td>Manufacture_date</td>
               <td><input type='text' name='Manufacture_date' /></td>
            </tr>
            <tr>
               <td>Next_checkup</td>
               <td><input type='text' name='Next_checkup' /></td>
            </tr>
            <tr>
               <td>Component_type</td>
               <td><input type='text' name='Component_type' /></td>
            </tr>
            <tr>
               <td>Menufacturer</td>
               <td><input type='text' name='Menufacturer' /></td>
            </tr>                                                                                  
            <tr>
               <td colspan = '2'>
                  <input type = 'submit' value = "Add Train Component"/>
               </td>
            </tr>
         </table>
      </form>    
   </body>
</html>