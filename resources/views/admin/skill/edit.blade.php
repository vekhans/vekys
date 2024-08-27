@extends('layouts.admin.admin')
@section('content')
 <div class="data--table">
    <div class="title">
        <div class="inliner">
        <h5><a href="{{ route('home') }}"><i class="ri-dashboard-3-line"></i>Dashboard</a></h5> / <h5><a href="{{ route('skills.index',[$users,'id'=>null]) }}">Skills</a></h5> / <h2 class="section--title">Ubah Data Skills</h2>    
        </div>
        <div> 
            <a href="{{ route('skills.index',[$users]) }}">
                <button class="btn_kembali"><i class="ri-arrow-left-fill"></i>Kembali</button>
            </a>



        </div>
    </div>
    <div>
        <form method="post" action="{{ route('skills.update', [$users, $skill->id]) }}" data-parsley-validate class="forms form-horizontal form-label-left" enctype="multipart/form-data">
            {{ csrf_field() }}
            <h3>Data Skill</h3>
            
            <div class="divs form-group{{ $errors->has('nama') ? ' has-error' : '' }}">
                <label for="nama">Nama Skills <span class="required">*</span>
                </label>
                <input type="text=" value="{{$skill->nama}}" id="nama" name="nama" class="masuk" placeholder="Nama">
                @if ($errors->has('nama'))
                <span class="help-block">{{ $errors->first('nama') }}</span>
                @endif
                 
            </div>
            <div class="form-group{{ $errors->has('persen') ? ' has-error' : '' }}">
                <label for="persen">Persentase <span class="required">*</span>
                </label>
                <input type="number=" value="{{$skill->persen}}" id="persen" name="persen" class="masuk" placeholder="persen">
                @if ($errors->has('persen'))
                <span class="help-block">{{ $errors->first('persen') }}</span>
                @endif
                 
            </div> 
            
             
             
              
             
              <div class="row mb-3"> 
            </div>
            <div class="row mb-3"> 
            </div>
            <div class="row mb-0">
                 <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6">
                            <input type="hidden" name="_token" value="{{ Session::token() }}">
                            <input name="_method" type="hidden" value="PUT">
                             
                            <button type="submit" class="add"><i class="ri-add-line"></i>Simpan Perubahan</button>

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
