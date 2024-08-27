@extends('layouts.admin.admin')

@section('content')
<div class="overview">
      
    <div class="title">
        <h2 class="section--title">Overview</h2>

         
    </div>
    <div class="title">
        @csrf
        @if(session('status'))
         
            <strong>{{session('status')}}</strong>
         
        @endif
    </div>
       
    <div class="cards">
        <div class="card card-1">
            <div class="card--data">
                <div class="card--content">
                    <a href="{{ route('profil.index') }}">
                        
                        <h5 class="card--title">PROFIL</h5>
                    </a>
                    <h1>{{ Auth::user()->name }}</h1>
                </div>
                <i class="ri-user-2-fill card--icon--lg"></i>
            </div>
        </div>
        <!-- <div class="card card-2">
            <div class="card--data">
                <div class="card--content">
                    <h5 class="card--title">BERITA</h5>
                    <h1>0</h1>
                </div>
                <i class="ri-article-line fill card--icon--lg"></i>
            </div>
        </div> -->
        <div class="card card-3">
            <div class="card--data">
                <div class="card--content">
                    <a href="{{ route('slide.index') }}">
                        <h5 class="card--title">SLIDE</h5>
                    </a>
                    <h1>{{$slide}}</h1>
                </div>
                <i class="ri-image-2-fill card--icon--lg"></i>
            </div>
        </div>
        <div class="card card-4">
            <div class="card--data">
                <div class="card--content">
                    <a href="{{ route('kontaks.index') }}">
                        <h5 class="card--title">PESAN</h5>
                    </a>
                    <h1>{{$pesan}}</h1>
                </div>
                <i class="ri-chat-2-line card--icon--lg"></i>
            </div>
        </div>
    </div>
</div>
@endsection
