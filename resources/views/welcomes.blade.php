<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$title}} | Veky</title>
    <link rel="stylesheet" type="text/css" href="{{asset('storage/assets/css/beranda.css')}}">
    <link rel="shortcut icon" href="{{asset('storage/media/veky.png')}}" type="image/x-icon" />
  <link rel="apple-touch-icon" href="{{asset('storage/media/veky.png')}}">
  <link rel="icon" href="{{asset('storage/media/veky.png')}}" type="image/png" sizes="206x16">
</head>
<body>
    <!-- //xxxxxxxxxxxxxxxxx -->
    <!-- clear -->
    <!-- php artisan config:cache &&  php artisan config:clear &&  composer dump-autoload -o -->


    <!-- <a href="https://my.domainesia.com/ref.php?u=23794"><img src="https://dnva.me/v9ev4" width="728px" height="90px" alt="DomaiNesia"></a> -->
    <!-- partikel -->
    <!-- <div id="particles"></div> -->
    <div class="xx">
        <div class="text-effectr"> 
            <!-- kalau bisa waktu reload ada animasi bergerak dari bawah ke atas -->
            <!-- untuk reload/refresh halaman -->
            <h1 class="textr" data-textr="{{ ($profil->name) }}">{{ ($profil->name) }}</h1>
            <div class="gradientr"></div>
            <div class="spotlightr"></div>
            <!-- disini kalao bisa buat tulisan berjalan atau anaimasi kitikan nama lengkap -->
        </div>
    </div>
    <div class="content">
         <div class="tombol">
            <form>
                <a href="{{ url('/beranda') }}" class="button">MULAI
                </a>
                
                <!--  -->
            </form>
        </div>
    </div>
     <!-- partikels -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/particles.js/2.0.0/particles.min.js"></script>
    <script src="{{asset('assets/js/script.js')}}"></script> -->
    <!-- end partikel -->
</body>
</html>