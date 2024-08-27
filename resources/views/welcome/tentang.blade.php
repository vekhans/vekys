@extends('layouts.welcome.welcome')
@section('content')
<!-- home section start -->
<section class="about" id="about">
    <div class="max-width">
        <h2 class="title">Tentang Saya</h2>
        <div class="about-content">
            <div class="column left">
                <a href="{{asset ($users->file)}}" target="_blank">
                    <img src="{{asset ($users->file)}}"  width="50%" height="100%" alt="foto profil">
                </a>
            </div>
            <div class="column right">
                <div class="text">Hallo.....</div>
                <div class="text">Nama Saya {{$users->lengkap}}</div>
                <div class="text">dan saya adalah <span class="typing"></span></div>
                <!-- <p>{{ ($users->tentang) }}.</p> -->
                <a href="#">Download CV</a>
            </div>
        </div>
    </div>
</section>
@endsection    

   