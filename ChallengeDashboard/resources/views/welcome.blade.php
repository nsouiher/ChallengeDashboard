<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
        <!-- Styles -->
        <style>
            html, body {
                background-color: #ffff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: bold;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
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
                font-weight: 200;
            }
           .links{
               background-color: #20B2AA
;
           }
            .links > a {
              
                color: white;
                padding: 0 25px;
                font-size: 13px;
                font-weight: bold;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                   
                        <a  class="nav-link" href="/guests" >
                        <i style="color:white;" class="fa fa-bell">
                            <span  class="badge badge-info">{{$newGuests}}</span>
                        </i>
                        </a>
                   
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                       
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content title m-b-md">
                

                <div class="links">
                    <a href="{{ route('createChallenge') }}">Create New Challenge</a>
                    <a href="/challenges">Challenges</a>
                    <a href="{{ route('dashboard') }}">Dashboard</a>
                    <a href="/notifications">Notifications</a>
                    <a href="/manageUsers">Manage Users</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://vapor.laravel.com">Vapor</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>
            </div>
            <img style="  display: block; 
            margin: 0 auto;  margin-top: 100px;" src="{{URL::asset('hrdblogo.png')}}"  alt="Logo">
        </div>
       
    </body>
</html>