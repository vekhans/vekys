@extends('layouts.admin.admin')
@section('content')
 <div class="data--table">
    <div class="title">
        <div class="inliner">
        <h5><a href="{{ route('home') }}"><i class="ri-dashboard-3-line"></i>Dashboard</a></h5> / <h5><a href="{{ route('skills.index',[$users,'id'=>null]) }}">Skill</a></h5> / <h2 class="section--title">Tambah Data Skill</h2>    
        </div>
        <div> 
            <a href="{{ route('skills.index',[$users,'id'=>null]) }}">
                <button class="btn_kembali"><i class="ri-arrow-left-fill"></i>Kembali</button>
            </a>
        </div>
    </div>
    <div>
        <form  method="post" action="{{ route('skills.store',$users) }}" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data" name="formPendaftaran" onsubmit="return validateForm()">
            {{ csrf_field() }}
            <h3>Tambah Data Skill</h3>
            
            <div class="divs form-group{{ $errors->has('nama') ? ' has-error' : '' }}">
                <label for="nama">Nama Skill <span class="required">*</span>
                </label>
                <input type="text=" value="" id="nama" name="nama" class="masuk" placeholder="Nama Skill" required>
                @if ($errors->has('nama'))
                <span class="help-block">{{ $errors->first('nama') }}</span>
                @endif
                 
            </div>
             
            </div>
            <div class="form-group{{ $errors->has('persen') ? ' has-error' : '' }}">
                <label for="persen">Persentase 
                </label>
                <input type="text=" value="" id="persen" name="persen" class="masuk" placeholder="Persentase">
                @if ($errors->has('persen'))
                <span class="help-block">{{ $errors->first('persen') }}</span>
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
                        <!-- <a href="{{ route('skills.index',[$users,'id'=>null]) }}">
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
