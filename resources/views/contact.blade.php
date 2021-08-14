<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->

        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <!-- Styles -->
        <style>
            * {
                box-sizing: border-box;
            }

            body {
              margin: 0px;
            }

            .navbar {
              overflow: hidden;
              background-color: black;
              font-family: Arial, Helvetica, sans-serif;
            }

            .navbar a {
              float: left;
              font-size: 16px;
              color: white;
              text-align: center;
              padding: 14px 16px;
              text-decoration: none;
            }

            .dropdown {
              float: left;
              overflow: hidden;
            }

            .dropdown .dropbtn {
              font-size: 16px;  
              border: none;
              outline: none;
              color: white;
              padding: 14px 16px;
              background-color: inherit;
              font: inherit;
              margin: 0;
            }

            .navbar a:hover, .dropdown:hover .dropbtn {
              background-color: black;
            }

            .dropdown-content {
              display: none;
              position: absolute;
              background-color: #f9f9f9;
              width: 50%;
              left: 0;
              box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);              
            }

            .dropdown-content .header {
              background: black;
              padding: 16px;
              color: white;
            }

            .dropdown:hover .dropdown-content {
              display: block;
            }

            /* Create three equal columns that floats next to each other */
            .column {
              float: left;
              width: 33.33%;
              padding: 10px;
              background-color: white;
              color: white
              height: 20px;
              font-family: 'Nunito', sans-serif;
              font-weight: 20;
            }

            .column a {
              float: none;
              color: black;
              padding: 0px;
              text-decoration: none;
              display: block;
              text-align: left;              
            }

            .column a:hover {
              background-color: #ddd;
            }

            /* Clear floats after the columns */
            .row:after {
              content: "";
              display: table;
              clear: both;
            }

            /* Responsive layout - makes the three columns stack on top of each other instead of next to each other */
            @media screen and (max-width: 600px) {
              .column {
                width: 100%;
                height: auto;
              }
            }
            html{
                background-color: #000;
                color: #fff;
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
                margin-left:0px;
                margin-top:300px             
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
        </style>
    </head>
    <body>   
        <div class="navbar">
          <a href="#home">Home</a>
          <a href="#news">News</a>
          <a href="/views">data views</a> 
          <a href="/login">Log In</a>  
              <div class="dropdown">
                <button class="dropbtn">Dropdown 
                  <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-content">              
                    <div class="column">                      
                      <a href="http://localhost/project/public/insert/train">show my salary</a> 
                      <a href="/insert/train_scheduler">show task</a>                   
                    </div>
              </div>               
        </div>
        <div class="content">
                <div class="title m-b-md">
                    Metro Rail Managment System
                </div>
            </div>
    </body>
</html>
