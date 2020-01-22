<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Travel Jo</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #ffffff;
                color: #ffffff;
                background:url(https://blamethemonkey.com/wp-content/uploads/2013/06/Elia-Locardi-Travel-Photography-The-Path-Of-Ages-Petra-Jordan-1280-WM-sRGB-1280x640.jpg) no-repeat;
                background-size:100% 100%;
                background-position:0 0;
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
                font-size: 90px;
                background-color:rgb(98,24,1,0.5);
                font-weight:bold;
                margin-left:20%;
                margin-right:20%;
            }
            .sub_text{
                font-size: 20px;
                background-color:rgb(98,24,1,0.5);
                font-weight:bold;
                text-align:center;
                margin-left:20%;
                margin-right:20%;
                padding-top:3%;
                padding-bottom:3%
                /* margin:20%; */
                /* margin-top:10%; */
            }

            .links > a {
                color: #ffffff;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
                background-color:rgb(98,24,1,0.5);
            }

        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height ">
            @if (Route::has('login'))
                <div class="top-right links ">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif



            <div class="content">
            

                <div class="title m-b-md">
                   Travel Jo
                </div>

                <p class="sub_text">
                TravelJo It is a tourist site that introduces tourist sites in Jordan, helps the tourist to know the most prominent and important places and know its geographical location, a site whose main objective is to promote tourist places and highlight Jordan in the best way
                </p>


            </div>
        </div>
    </body>
</html>
