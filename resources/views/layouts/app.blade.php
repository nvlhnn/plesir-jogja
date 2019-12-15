<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--===============================================================================================-->	
	    <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <!--===============================================================================================-->	
        <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <!--===============================================================================================-->	
        <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="css/util.css">
        <link rel="stylesheet" type="text/css" href="css/main.css">
    <!--===============================================================================================-->
    <!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
    <!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
    <!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
    <!--===============================================================================================-->
	<script src="js/main.js"></script>


    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('apps.name', 'PlesirJogja.com') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.13/semantic.min.js"></script>

    {{-- Script AJAX --}}
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

    {{-- Script API MapBox --}}
    <script src='https://api.mapbox.com/mapbox-gl-js/v1.4.1/mapbox-gl.js'></script>
    <link href='https://api.mapbox.com/mapbox-gl-js/v1.4.1/mapbox-gl.css' rel='stylesheet' />

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.13/semantic.min.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ url('/css/beranda.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ url('/css/jadwal.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
    .zoom-effect {  
    width: 100%;
    height: 360px;
    margin: 0 auto;
    overflow: hidden;  
    }
    
    .kotak {
    top: 0;
    left: 0;
    }
    
    .kotak img {
    -webkit-transition: 0.4s ease;
    transition: 0.4s ease;
    width: 600px;
    }
    
    .zoom-effect:hover .kotak img {
    -webkit-transform: scale(1.08);
    transform: scale(1.08);
    }
    .star-rating {
        line-height:32px;
        font-size:2em;
    }

    .star-rating .fa-star{
        color: yellow;
    }
    body {
        /* background-image: url("/images/lampu.jpg"); */
        background-size: 100%;
        width: 100%;
        height: 100%;
    }

    #menu {
        position: absolute;
        background: #fff;
        padding: 10px;
        font-family: 'Open Sans', sans-serif;
    }

        .checked {
            color: orange;
        }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #4F874C; position: fixed; width: 100%; z-index: 100; opacity: 90%">
                <a class="navbar-brand" href="{{ url('/') }}" style="color: white; font-size: 20px; opacity: 100%">
                    <i class="location arrow icon"></i>
                    <b> {{ config('apps.name', 'PlesirJogja.com') }} </b>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent" style="z-index:1" 1>
                    <!-- Left Side Of Navbar -->
                    {{-- <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search"> --}}
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="btn btn-outline-success mx-3" href="{{ route('register') }}" style="font-size: 15px; color: white; border-color: white">{{ __('Register') }}</a>
                            </li>
                        @endif
                            <li class="nav-item">
                                <a class="btn btn-success" href="{{ route('login') }}" style="font-size: 15px;">{{ __('Login') }}</a>
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" style="color: white; z-index: 30" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown" style="white; z-index: 30">
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div> 
        </nav>
        <div style="background-color: #579654; position: fixed; width: 100%; margin-top: 55px; z-index: 20; opacity: 90%; color: white; height: 55px">
            <div class="container" style=" height: 45px; font-size: 15px">
                <ul class="nav nav-pills" id="navbars" style="padding-top: 3px; padding-bot: 7px; color: white">
                    <li class="nav-item mx-2 pt-2">
                        <a class="nav-link btn btn-outline-success" href="{{ url('/schedules/show') }}" id="satu" style="color:white; border-color: white">
                            <i class="calendar alternate outline icon"></i>
                            Jadwal Saya
                        </a>
                    </li>
                    <li class="nav-item mx-2 pt-2">
                        <a class="nav-link btn btn-outline-success" href="{{ url('/baskets/show')}}" id="tiga" style="color:white; border-color: white">
                            <i class="ticket alternate icon"></i>
                            Tiket Saya
                        </a>
                    </li>
                    <li class="nav-item mx-2 pt-2">
                        <a class="nav-link btn btn-outline-success" href="{{ url('/places')}}" id="tiga" style="color:white; border-color: white">
                            <i class="map marker outline icon"></i>
                            Obyek Wisata
                        </a>
                    </li>
                </ul>
            </div>
            {{-- munculkan alert sukses --}}
            <div class="lay ">
                @if (session()->has('notif'))
                    <div class="row" style="min-width:60%; min-height:30px">
                        <div class="alert alert-success" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            {{session()->get('notif')}}
                        </div>
                    </div>
                @endif
            </div>
            <div class="container" style="margin-left: 42%">
                @if (session()->has('notifLogin'))
                    <div class="row">
                        <div class="alert alert-success" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            {{session()->get('notifLogin')}}
                        </div>
                    </div>
                @endif
            </div>

        </div>
        <br> <br> <br> <br>
        <style>
        .lay{
            margin-left: 38%;
            margin-top: 250px;
            padding: 30px;
            font-size: 30px;
            font-family: 'Open Sans', sans-serif;

        }
        
        </style>

        <main class="py-5" style="background-color: transparent">
            @yield('content')
        </main>
    </div> 


    <script>
        $(document).ready(function() {
            $("#search").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $('#tabel li').filter(function() {
                    $(this).toggle($(this).find('a').text().toLowerCase().indexOf(value) > -1)
                });
                console.log("ok");
            });
        });
    </script>

</body>
</html>


{{-- <script type="text/javascript">
    $(document).ready(function(){
        $('ul li a').click(function(){
            $('li a').removeClass("active");
            $(this).addClass("active");
        });
    });
</script> --}}

{{-- <script>
    $(document).ready(function(){
    
     fetch_places_data();
    
     function fetch_places_data(query = '')
     {
      $.ajax({
       url:"{{ route('places.action') }}",
       method:'GET',
       data:{query:query},
       dataType:'json',
       success:function(data)
       {
        $('tbody').html(data.table_data);
        $('#total_records').text(data.total_data);
       }
      })
     }
    
     $(document).on('keyup', '#search', function(){
      var query = $(this).val();
      fetch_places_data(query);
     });
    });
    </script> --}}
    