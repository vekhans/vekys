@extends('layouts.welcome.welcome')
@section('content')
<section class="contact" id="contact">
    <div class="max-width">
        <h2 class="title">Hubungi Saya</h2>
        <div class="contact-content">
            <div class="column left">
                <div class="text">Alama Kontak saya</div>
                <!-- <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dignissimos harum corporis fuga corrupti. Doloribus quis soluta nesciunt veritatis vitae nobis?</p> -->
                <div class="icons">
                    <div class="row">
                        <i class="fas fa-user"></i>
                        <div class="info">
                            <div class="head">Nama</div>
                            <div class="sub-title">{{ ($profil->lengkap) }}</div>
                        </div>
                    </div>
                    <div class="row">
                        <i class="fas fa-map-marker-alt"></i>
                        <div class="info">
                            <div class="head">Alamat</div>
                            <div class="sub-title">{{ ($profil->alamat) }}</div>
                        </div>
                    </div>
                    <div class="row">
                        <i class="fas fa-envelope"></i>
                        <div class="info">
                            <div class="head">Email</div>
                            <div class="sub-title">{{ ($profil->email) }}</div>
                        </div>
                    </div>
                    <div class="row">
                        <i class="fas fa-phone"></i>
                        <div class="info">
                            <div class="head">Telepon</div>
                            <div class="sub-title">{{ ($profil->telepon) }}</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="column right">
                <div class="text">Pesan</div>
                @if(session('status'))
                    <div class="alert alert-info">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <strong>{{session('status')}}</strong>
                    </div>
                @endif
                <form  method="post" action="{{ route('kontak.store') }}" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data" name="formPendaftaran" onsubmit="return validateForm()"> 
                    {{ csrf_field() }}
                    <div class="fields">
                        <div class="field name">
                            <input type="text" name="nama" placeholder="Name" required data-rule="minlen:4">
                        </div>
                        <div class="field email">
                            <input type="email" name="email" placeholder="Email" required data-rule="minlen:4" required>
                        </div>
                    </div>
                    <div class="field">
                        <input type="text" name="perihal" placeholder="Subject" required data-rule="minlen:4" required>
                    </div>
                    <div class="field textarea">
                        <textarea cols="30" rows="10" name="komentar" placeholder="Message.." required data-rule="minlen:4" required></textarea>
                    </div>
                    <div class="button-area"> 
                        <h6>
                            <button class="mt-15 plr-20 btn-b-lg btn-fill-primary dplay-block col-md-12" type="submit"><b>Kirim</b></button>
                        </h6>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@stop