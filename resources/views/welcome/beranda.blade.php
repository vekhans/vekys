@extends('layouts.welcome.welcome')
@section('content')
<section class="home" id="home"> 
    <div id="slide">
        @foreach($slides as $val)
        <div class="item" style=" background-color: gray;background-image: url({{asset ($val->file)}});">
            <div class="content">
                <div class="name">{{$val->caption}}</div>
                <div class="des">{{$val->sumber}}</div>
                <div class="des">{{$val->deskripsi}}</div>

                <!-- <button class="mt-15 plr-20 btn-b-lg btn-fill-primary dplay-block col-md-12" type="submit"><b>Kirim</b></button> -->
            </div>
        </div>
        @endforeach
    </div>
    <div class="buttons">
        <button id="prev"><i class="fas fa-arrow-left"></i></button>
        <button id="next"><i class="fas fa-arrow-right"></i></button>
    </div>
</section>
@endsection
