<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Parent Layout</title>

    <script src="https://kit.fontawesome.com/23c9455052.js" crossorigin="anonymous"></script>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Shizuru&display=swap" rel="stylesheet">
    

    <style>

        @media(max-width: 1600px){
            .row{
                --bs-gutter-x: 0rem;
            }

            body{
                font-family: "century gothic";
                background-color: rgb(31, 27, 27);
            }

            .navbar{
                background-color: rgb(233, 20, 20);
                opacity: 0.75;
                padding-left: .5%;
                padding-top: 1%;
            }

            nav .navbar-nav li a{
                color: white;
            }

            nav .navbar-nav li{
                padding-top: 1%;
            }

            .navbar-dark .nav-link:hover{
                background-color: rgba(255, 255, 255, 0.705) !important;
                color: black !important;

            }

            .logo{
                font-weight: bold;
                font-size: 30px;
                color: wheat !important;
                padding-top: 0; 
                font-family: 'Shizuru', cursive;      
            }

            .nav-link{
                color: white !important;
            }

            footer{
                border-top: 1px solid wheat;
                color: white;
                background-color: rgb(53, 48, 48);
                /* background-color: rgba(161, 33, 33, 0.76); */
                padding-top: 1%;
                padding-bottom: 1%;
                margin-bottom: 0;
            }

            .navbar div .dropdown-menu{
                background-color: rgb(233, 20, 20);
            }

            footer a:hover{
                text-decoration: underline;
            }

            button {
                border: 1px solid white;
            }
        }

        @media(max-width: 1079px){

            footer > .about{
                text-align: center;
            }

            button {
                color: white;
            }

            .navbar-dark .navbar-toggler-icon{
                color: white;
            }
        }        
    </style>

@yield('style')

</head>
<body>

    <!-- ----------------------------------- NAVBAR ----------------------------------- -->

    <nav class="navbar navbar-expand-md shadow-sm navbar-dark">
        <div class="container">
            <a class="navbar-brand logo" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-dark navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav me-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto">

                    <li class="nav-item"><a class="nav-link" href="/home">Home</a></li>

                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            Movies
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="/admin/viewMovies">View Movies</a>
                            <a class="dropdown-item" href="/admin/addMovies">Add Movies</a>
                        </div>
                    </li>

                    <li class="nav-item"><a class="nav-link" href="/aboutUs">About Us</a></li>
                    <li class="nav-item"><a class="nav-link" href="/contactUs">Contact Us</a></li>

                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="/veiwProfile">Profile</a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>




    <div id="child_content">
        @yield('content')
    </div>


    <footer>

        <div class="row">
            <div class="col-lg-6 offset-lg-1 col-12">
                <span>Copyrigths <i class="far fa-copyright"></i> 2021-- <a href="{{ url('/') }}">Cineplex.com</a> --- All Rights Reserved.</span>
            </div>

            <div class="col-lg-2 offset-lg-2 col-4 offset-4 about">
                <a href="/home">FAQs</a>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-2 offset-lg-9 col-4 offset-4 about">
                <a href="https://github.com/Faiq-Shahzad">GitHub</a>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-2 offset-lg-9 col-4 offset-4 about">
                <a href="https://www.linkedin.com/in/faiqshahzad993/">Linkedin</a>
            </div>
        </div>
        
    </footer>

{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> --}}
<!-- Scripts -->
<script src="{{ asset('frontend/bootstrap.bundle.min.js') }}" defer></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    
</body>
</html>