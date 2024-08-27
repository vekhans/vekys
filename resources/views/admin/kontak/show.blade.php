@extends('layouts.admin.admin')
@section('content')
<div id="content-wrapper" class="data--table"> 
	<div class="title">
		<div class="inliner">
			<h5><a href="{{ route('home') }}">Dashboard</a></h5> / <h2 class="section--title">Baca Pesan</h2>    
		</div>
		<div>
			<a href="{{ route('kontaks.index') }}">
                <button class="add"><i class="ri-arrow-left-fill"></i>Kembali</button>
            </a>
		</div>
	</div>
    <div class="card-body">
        <div class="form-row">
            <div class="col-md-6" style="text-align: left;"> 
                <div>
                    <p><strong> Nama           : </strong> {{ucfirst($kontakc->nama)}} </p>
                    <p><strong> Email          : </strong> {{($kontakc->email)}} </p>
                    <p><strong> Perihal        : </strong> {{($kontakc->perihal)}} </p>
                    <p><strong> Pesan         : </strong> {{($kontakc->komentar)}} </p>
                    <p><strong> session        : </strong> {{($kontakc->session_id)}} </p>
                    <p><strong> IP ====        : </strong> {{($kontakc->ip)}} </p>
                    <p><strong> Agent         : </strong> {{($kontakc->agent)}} </p> 
                </div>
            </div>            
        </div>
        <div class="form-row">
            <div class="col-md-12" style="text-align: left;"> 
                <div>
                    <p><strong> DESKRIPSI      : </strong>  </p>
                    <P>
                         {{($kontakc->komentar)}}
                    </P>
                </div>
            </div>
        </div>
    </div>
    <div> </div>
	<div>
		<a href="{{ route('kontaks.index') }}">
            <button class="add"><i class="ri-arrow-left-fill"></i>Kembali</button>
        </a>
	</div>
</div>
@endsection