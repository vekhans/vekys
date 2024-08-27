@extends('layouts.welcome.welcome')
@section('content')
    <section class="services" id="services">
        <div class="max-width">
            <h2 class="title">Pendidikan</h2>
            <div class="serv-content">
                 @forelse($pendidikan as $pendidikan)
                <div class="card">
                    <div class="box">
                        <i class="fas fa-paint-brush"></i>
                        <div class="text">{{ucfirst($pendidikan->nama)}}</div>
                        <p>Tahun Masuk : {{ucfirst($pendidikan->tahun_masuk)}}</p>
                        <p>Tahun Keluar : {{ucfirst($pendidikan->tahun_keluar)}}</p>
                        <p>Gelar : {{ucfirst($pendidikan->gelar)}}</p>
                    </div>
                </div>
                @empty
                <div class="card">
                    <div class="box">
                        <i class="fas fa-paint-brush"></i>
                        <div class="text">Hubungi Admin Untuk Informasi Lebih Lanjut</div>
                    </div>
                </div>
                @endforelse
            </div>
        </div>
    </section>
@endsection
 

