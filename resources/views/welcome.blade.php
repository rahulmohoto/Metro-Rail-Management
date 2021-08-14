<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>User Views</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: black;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .column span {
              float: left;
              color: white;
              padding: 0 25px;
              font-size: 27px;
              font-weight: 500;
              letter-spacing: .1rem;
              font-family: 'Nunito', sans-serif;
              text-align: left;
              margin-left:50px;

            }

            .column a {
              font-family: 'Nunito', sans-serif;
              color: white;
              font-size: 20px;
              padding: 10 15;
              text-decoration: none;
              display: block;
              text-align: left;
              margin-left:50px;
            }

            .column a:hover {
              background-color: #636b6f;
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

            /*
            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }
            */

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>

            <div class="content">
                <div class="title m-b-md">
                    User Data Views
                </div>

                <div class="column"> 
                      <h1>Basic Table Views</h1>
                      <a href="/views/trains">Train</a>
                      <a href="/views/train_component">Train Components</a>
                      <a href="#">Train Manufacturers</a>
                    </div>

                <div class="column"> 
                      <h1>User Views</h1>
                      <a href="#">Link1</a>
                      <a href="#">Link2</a>
                      <a href="#">Link3</a>
                    </div>

            </div>
        </div>
    </body>
</html>
