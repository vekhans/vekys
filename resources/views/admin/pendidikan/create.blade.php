@extends('layouts.admin.admin')
@section('content')
 <div class="data--table">
    <div class="title">
        <div class="inliner">
        <h5><a href="{{ route('home') }}"><i class="ri-dashboard-3-line"></i>Dashboard</a></h5> / <h5><a href="{{ route('pendidikans.index',[$users,'id'=>null]) }}">Pendidikan</a></h5> / <h2 class="section--title">Tambah Data Pendidikan</h2>    
        </div>
        <div> 
            <a href="{{ route('pendidikans.index',[$users,'id'=>null]) }}">
                <button class="btn_kembali"><i class="ri-arrow-left-fill"></i>Kembali</button>
            </a>
        </div>
    </div>
    <div>
        <form  method="post" action="{{ route('pendidikans.store',$users) }}" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data" name="formPendaftaran" onsubmit="return validateForm()">
            {{ csrf_field() }}
            <h3>Tambah Data Pendidikan</h3>
            
            <div class="divs form-group{{ $errors->has('nama') ? ' has-error' : '' }}">
                <label for="nama">Nama Pendidikan <span class="required">*</span>
                </label>
                <input type="text=" value="" id="nama" name="nama" class="masuk" placeholder="Nama Pendidikan" required>
                @if ($errors->has('nama'))
                <span class="help-block">{{ $errors->first('nama') }}</span>
                @endif
                 
            </div>
            <div class="form-group{{ $errors->has('tahun_masuk') ? ' has-error' : '' }}">
                <label for="tahun_masuk">Tahun Keluar 
                </label>
                <input type="number=" value="" id="tahun_masuk" name="tahun_masuk" class="masuk" placeholder="Masuk ">
                @if ($errors->has('tahun_masuk'))
                <span class="help-block">{{ $errors->first('tahun_masuk') }}</span>
                @endif
                 
            </div>
            <div class="form-group{{ $errors->has('tahun_keluar') ? ' has-error' : '' }}">
                <label for="tahun_keluar">Tahun Keluar 
                </label>
                <input type="number=" value="" id="tahun_keluar" name="tahun_keluar" class="masuk" placeholder="Keluar/Lulus ">
                @if ($errors->has('tahun_keluar'))
                <span class="help-block">{{ $errors->first('tahun_keluar') }}</span>
                @endif
                 
            </div>
            <div class="form-group{{ $errors->has('gelar') ? ' has-error' : '' }}">
                <label for="gelar">Gelar 
                </label>
                <input type="text=" value="" id="gelar" name="gelar" class="masuk" placeholder="Gelar">
                @if ($errors->has('gelar'))
                <span class="help-block">{{ $errors->first('gelar') }}</span>
                @endif
                 
            </div> 
             
              
            <div class="col-md-3 col-md-offset-3 form-group">
                <div>
                    <!-- <img id="img-preview" class="img-responsive" src="" width="50%" height="35%" /> -->
                </div>
            </div> 
              <div class="row mb-3"> 
            </div>
            <div class="row mb-3"> 
            </div>
            <div class="row mb-0">
                 <div class="ln_solid"></div>
                <div class="form-group">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <input type="hidden" name="_token" value="{{ Session::token() }}">
                        <button type="submit" class="add"><i class="ri-add-line"></i>Simpan</button>
                        <!-- <hr> -->
                        <!-- <a href="{{ route('pendidikans.index',[$users,'id'=>null]) }}">
                            <button class="btn_kembali"><i class="ri-arrow-left-fill"></i>Kembali</button>
                        </a> -->
                    </div>
                </div>
            </div>
            <div class="row mb-3"> 
            </div>
            <div class="row mb-3"> 
            </div>
        </form> 
    </div>
</div> 
 
@stop  
