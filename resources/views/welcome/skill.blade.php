@extends('layouts.welcome.welcome')
@section('content')
<section class="skills" id="skills">
        <div class="max-width">
            <h2 class="title">My skills</h2>
            <div class="skills-content">
                <div class="column left">
                    <div class="text">My creative skills</div>
                    <p>{{ ($users->skill) }}.</p>
                    <a href="#">Read more</a>
                </div>
                <div class="column right">
                @forelse($skill as $skill)
                    <div class="bars">
                        <div class="info">
                            <span>{{ucfirst($skill->nama)}}</span>
                            <span>{{ucfirst($skill->persen)}}%</span> 
                        </div>
                        <div class="line {{ucfirst($skill->nama)}}"></div>
                    </div>
                @empty
                <div class="bars">
                        <div class="info">
                            <span>Hubungi Admin Untuk Informasi Lebih Lanjut</span>
                        </div>
                        <div class="line "></div>
                    </div>
                @endforelse
                </div>
            </div>
        </div>
    </section>
@endsection
 

