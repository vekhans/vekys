<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title}} | Veky</title> 
    <link rel="shortcut icon" href="{{asset('storage/media/veky.png')}}" type="image/x-icon" />
    <link rel="apple-touch-icon" href="{{asset('storage/media/veky.png')}}">
    <link rel="icon" href="{{asset('storage/media/veky.png')}}" type="image/png" sizes="206x16">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
   <!--  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" ></script> -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{asset('storage/assets/css/form.css')}}">
    <link rel="stylesheet" href="{{asset('storage/assets/css/adminstyle.css')}}">
     
</head>
<body>
    <section class="header">
        <div class="logo">
            <!-- ada tambah -->
            <i class="ri-menu-line icon keluar menu"></i>
            <a href="{{ route('home') }}"><h2>Vek<span>Han</span></h2></a>
        </div>
        <div class="search--notification--profile">
            <div class="notification--profile">
                <div class="picon lock">
                     <div class="dropdown">
                        <div onclick="myFunction()" class="dropbtn">
                            <i class="ri-user-2-line"></i> {{ Auth::user()->name }}
                        </div>
                        <div id="myDropdown" class="dropdown-content">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">{{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>


                        </div>
                    </div>
                </div>
                <div class="picon profile">
                    <a href="{{asset (Auth::user()->file)}}" target="_blank">
                        <img src="{{asset (Auth::user()->file)}}" alt="foto admin" width="100%" height="100%">
                    </a>
                    <!-- <a href="{{asset('media/veky.png')}}" target="_blank">
                        <img class="img" src="{{asset('media/veky.png')}}" alt="foto admin">
                    </a> -->
                </div>
            </div>
        </div>
    </section>
    <section class="main">
        <div class="sidebar">
            <ul class="sidebar--items">
                <li>
                    <a href="{{ route('home') }}">
                        <span class="icon icon-1"><i class="ri-dashboard-3-line"></i></span>
                        <span class="sidebar--item">DASHBOARD</span>
                    </a>
                </li>
                <li>
                    <!-- GANTI / tambah link -->
                    <a href="{{ route('profil.index') }}">
                        <span class="icon icon-3"><i class="ri-user-2-line"></i></span>
                        <span class="sidebar--item" style="white-space: nowrap;">PROFIL</span>
                    </a>
                </li>
                <!-- <li>
                    <a href="">
                        <span class="icon icon-6"><i class="ri-table-2"></i></span>
                        <span class="sidebar--item">BERITA</span>
                    </a>
                </li> -->
                <li>
                    <a href="{{ route('slide.index') }}">
                        <span class="icon icon-6"><i class="ri-image-2-fill"></i></span>
                        <span class="sidebar--item">SLIDE</span>
                    </a>
                </li>                 
                <li>
                    <a href="{{ route('kontaks.index') }}">
                        <span class="icon icon-6"><i class="ri-chat-2-line"></i></span>
                        <span class="sidebar--item">PESAN</span>
                    </a>
                </li>
            </ul>
            <ul class="sidebar--bottom-items">
                <li>
                    <a href="" id="myBtn">
                        <span class="icon keluar"><i class="ri-logout-box-r-line"></i></span>
                        <span class="sidebar--item">KELUAR</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="main--content">
            @include('flash-message')
             @yield('content')
        </div>
    </section>
    <section>
        <footer class="footer">
            <h2 class="credit">created by <span>K</span>aaka <span>V</span>eky | all rights reserved.</h2>
        </footer> 
    </section>
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <div id="myModal" class="modal">
        <!-- Modal content -->
        <div class="modal-content">
            <span class="close">&times;</span>
            <i class="ri-question-line"></i>
            <h2>Apakah Anda</h2>
            <h3>Yakin Ingin akhiri sesi ini?...</h3>
            <div class="tombol">
                <button class="closes ">Batal</button>
                <a class="tombol-merah" href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">Keluar
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </div>   
    </div>
    <script src="{{asset('storage/assets/js/adminjs.js')}}"></script>
    <!-- <script src="/js/app.js"></script> -->
 
</body>
</html>



  
    