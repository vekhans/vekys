<!DOCTYPE html>
<!-- Created By CodingNepal -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$title}} | Veky</title>
    <link rel="shortcut icon" href="{{asset('storage/media/veky.png')}}" type="image/x-icon" />
    <link rel="apple-touch-icon" href="{{asset('storage/media/veky.png')}}">
    <link rel="icon" href="{{asset('storage/media/veky.png')}}" type="image/png" sizes="206x16">
    <link rel="stylesheet" href="{{asset('storage/assets/css/styles.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/> 
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/typed.js/2.0.11/typed.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"/>
</head>
<body>
    <div class="scroll-up-btn">
        <i class="fas fa-angle-up"></i>
    </div>
    <nav class="navbar">
        <div class="max-width">
            <div class="logo"><a href="{{ url('/') }}">Vek<span>Han</span></a></div>
            <ul class="menu">
                <li><a href="{{ url('/beranda') }}" class="menu-btn">Beranda</a></li>
                <li><a href="{{ url('/tentang') }}" class="menu-btn">Tentang</a></li>
                <li><a href="{{ url('/pendidikan') }}" class="menu-btn">Pendidikan</a></li>
                <!-- <li><a href="#services" class="menu-btn">Services</a></li>
                <li><a href="#teams" class="menu-btn">Teams</a></li> -->
                <li><a href="{{ url('/skill') }}" class="menu-btn">Skills</a></li>
                <!-- <li><a href="#exp" class="menu-btn">Exp</a></li> -->
                <li><a href="{{ url('/kontak') }}" class="menu-btn">Kontak</a></li>
                <li>
                    @if (Route::has('login'))
                        @auth
                            <li>
                                <a href="{{ url('/admin') }}" class="menu-btn">Admin</a>
                            </li>
                            @else
                            <li>
                                <a href="{{ route('login') }}" class="menu-btn">Login</a>
                            </li>
                            <!-- @if (Route::has('register'))
                            <li>
                                <a href="{{ route('register') }}" class="menu-btn">Register</a>
                            </li> -->
                            @endif
                        @endauth
                    @endif
                </li>
            </ul>
            <div class="menu-btn">
                <i class="fas fa-bars"></i>
            </div>
        </div>
    </nav>
    @yield('content')    
    <!-- footer section start -->
    <footer>
        <span>Created By <a href="https://www.kakaveky.xyz">Vekhan</a> | <span class="far fa-copyright"></span> 2024 All rights reserved.</span>
    </footer> 
    <script src="{{asset('storage/assets/js/slidecarousel.js')}}"></script>
    <script src="{{asset('storage/assets/js/nama.js')}}"></script>
</body>
</html>
