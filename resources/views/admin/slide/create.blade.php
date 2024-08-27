@extends('layouts.admin.admin')
@section('content')
 <div class="data--table">
    <div class="title">
        <div class="inliner">
        <h5><a href="{{ route('home') }}"><i class="ri-dashboard-3-line"></i>Dashboard</a></h5> / <h5><a href="{{ route('slide.index') }}">Slide</a></h5> / <h2 class="section--title">Tambah Data Slide</h2>    
        </div>
        <div> 
            <a href="{{ route('slide.index') }}">
                <button class="btn_kembali"><i class="ri-arrow-left-fill"></i>Kembali</button>
            </a>
        </div>
    </div>
    <div>
        <form  method="post" action="{{ route('slide.store') }}" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data" name="formPendaftaran" onsubmit="return validateForm()">
            {{ csrf_field() }}
            <h3>Tambah Data Slide</h3>
            
            <div class="divs form-group{{ $errors->has('caption') ? ' has-error' : '' }}">
                <label for="caption">Caption <span class="required">*</span>
                </label>
                <input type="text=" value="" id="caption" name="caption" class="masuk" placeholder="Caption" required>
                @if ($errors->has('caption'))
                <span class="help-block">{{ $errors->first('caption') }}</span>
                @endif
                 
            </div>
            <div class="form-group{{ $errors->has('sumber') ? ' has-error' : '' }}">
                <label for="sumber">Sumber File/Foto 
                </label>
                <input type="text=" value="" id="sumber" name="sumber" class="masuk" placeholder="Sumber ">
                @if ($errors->has('sumber'))
                <span class="help-block">{{ $errors->first('sumber') }}</span>
                @endif
                 
            </div>
            <div class="form-group{{ $errors->has('deskripsi') ? ' has-error' : '' }}">
                <label for="deskripsi">Deskripsi 
                </label>
                <input type="text=" value="" id="deskripsi" name="deskripsi" class="masuk" placeholder="Deskripsi">
                @if ($errors->has('deskripsi'))
                <span class="help-block">{{ $errors->first('deskripsi') }}</span>
                @endif
                 
            </div> 
            <div class="col-md-6 form-group{{ $errors->has('file') ? ' has-error' : '' }}">
                <label for="file" class="col-md-2 control-label">file</label> <span class="required">*</span>
                <div>
                    <!--<img src="" id="img" class="img-responsive" width="40%" height="40%" style="height: 160px; width: 140px;" /> -->
                    <input id="file" accept="image/*" type="file" class="masuk form-control" name="file" value="" required>
                    @if ($errors->has('file'))
                    <span class="help-block">
                        <strong>{{ $errors->first('file') }}</strong>
                    </span>
                    @endif
                </div>
            </div>
              
            <div class="col-md-3 col-md-offset-3 form-group">
                <div>
                    <img id="img-preview" class="img-responsive" src="" width="50%" height="35%" />
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
                            <button type="submit" class="add"><i class="ri-add-line"></i>Simpan Perubahan</button>
                            <a href="{{ route('slide.index') }}">
                                <button class="btn_kembali"><i class="ri-arrow-left-fill"></i>Kembali</button>
                            </a>
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
@section('script')
<script type="text/javascript">
      $("#file").change(function() {
        if (this.files && this.files[0]) {
          var reader = new FileReader();
          reader.onload = function(e) {
            $('#img-preview').attr('src', e.target.result);
          }
          reader.readAsDataURL(this.files[0]);
        }
      });
</script>
@endsection 
@stop  
