@extends('layouts.admin.admin')
@section('content')
 <div class="data--table">
    <div class="title">
        <div class="inliner">
        <h5><a href="{{ route('home') }}"><i class="ri-dashboard-3-line"></i>Dashboard</a></h5> / <h5><a href="{{ route('profil.index') }}">Profil</a></h5> / <h2 class="section--title">Ubah Data Profil</h2>    
        </div>
        <div> 
            <a href="{{ route('profil.index') }}">
                <button class="btn_kembali"><i class="ri-arrow-left-fill"></i>Kembali</button>
            </a>



        </div>
    </div>
    <div>
        <form method="post" action="{{ route('profil.update', $admin->id) }}" data-parsley-validate class="forms form-horizontal form-label-left" enctype="multipart/form-data">
            {{ csrf_field() }}
            <h3>Data Profil</h3>
            
            <div class="divs form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name">Nama User <span class="required">*</span>
                </label>
                <input type="text=" value="{{$admin->name}}" id="name" name="name" class="masuk" placeholder="Nama">
                @if ($errors->has('name'))
                <span class="help-block">{{ $errors->first('name') }}</span>
                @endif
                 
            </div>
            <div class="form-group{{ $errors->has('lengkap') ? ' has-error' : '' }}">
                <label for="lengkap">Nama Lengkap <span class="required">*</span>
                </label>
                <input type="text=" value="{{$admin->lengkap}}" id="lengkap" name="lengkap" class="masuk" placeholder="Nama Lengkap">
                @if ($errors->has('lengkap'))
                <span class="help-block">{{ $errors->first('lengkap') }}</span>
                @endif
                 
            </div> 
            <div class="form-group{{ $errors->has('telepon') ? ' has-error' : '' }}">
                <label for="telepon">No. Telepon <span class="required">*</span>
                </label>
                <input type="number" value="{{$admin->telepon}}" id="telepon" name="telepon" class="masuk" placeholder="No. Telepon">
                @if ($errors->has('telepon'))
                <span class="sss help-block">{{ $errors->first('telepon') }}</span>
                @endif                
            </div>
            <div class="col-md-5 form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label class="control-label" for="email">Nama email <span class="required">*</span>
                </label>
                <input type="email" value="{{$admin->email}}" id="email" name="email" class="masuk form-control" placeholder="email">
                @if ($errors->has('email'))
                    <span class="sss help-block">{{ $errors->first('email') }}</span>
                @endif
                
            </div>
              
            <div class="col-md-5 form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror masuk" name="password" required autocomplete="new-password" placeholder="Password">
                @if ($errors->has('email'))
                    <span class="sss help-block">{{ $errors->first('email') }}</span>
                @endif
              
            </div>

            <div class="">
                <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>
                <input id="password-confirm" type="password" class="form-control masuk" name="password_confirmation" required autocomplete="new-password" placeholder="Password Confirmation"> 

            </div>
            <div class="form-group{{ $errors->has('pendidikan') ? ' has-error' : '' }}">
                <label for="pendidikan">Pendidikan <span class="required">*</span>
                </label>
                <input type="text" value="{{$admin->pendidikan}}" id="pendidikan" name="pendidikan" class="masuk" placeholder="Pendidikan">
                @if ($errors->has('pendidikan'))
                <span class="sss help-block">{{ $errors->first('pendidikan') }}</span>
                @endif                
            </div>
            <div class="form-group{{ $errors->has('skill') ? ' has-error' : '' }}">
                <label for="skill">Skill <span class="required">*</span>
                </label>
                <input type="text" value="{{$admin->skill}}" id="skill" name="skill" class="masuk" placeholder="Keahlian">
                @if ($errors->has('skill'))
                <span class="sss help-block">{{ $errors->first('skill') }}</span>
                @endif                
            </div>
            <div class="form-group{{ $errors->has('tentang') ? ' has-error' : '' }}">
                <label for="tentang">Tentang <span class="required">*</span>
                </label>
                <input type="text" value="{{$admin->tentang}}" id="tentang" name="tentang" class="masuk" placeholder="Keahlian">
                @if ($errors->has('tentang'))
                <span class="sss help-block">{{ $errors->first('tentang') }}</span>
                @endif                
            </div>
            <div class="form-group{{ $errors->has('pengalaman') ? ' has-error' : '' }}">
                <label for="pengalaman">Pengalaman <span class="required">*</span>
                </label>
                <input type="text" value="{{$admin->pengalaman}}" id="pengalaman" name="pengalaman" class="masuk" placeholder="pengalaman">
                @if ($errors->has('pengalaman'))
                <span class="sss help-block">{{ $errors->first('pengalaman') }}</span>
                @endif                
            </div>
            <div class="form-group{{ $errors->has('alamat') ? ' has-error' : '' }}">
                <label for="alamat">Alamat <span class="required">*</span>
                </label>
                <input type="text" value="{{$admin->alamat}}" id="alamat" name="alamat" class="masuk" placeholder="alamat">
                @if ($errors->has('alamat'))
                <span class="sss help-block">{{ $errors->first('alamat') }}</span>
                @endif                
            </div>
            <div class="col-md-5 form-group{{ $errors->has('gender') ? ' has-error' : '' }}"  >
                <label for="gender" class="control-label">Gender</label>
                <div>
                    <select class="masuk" name="gender" id="gender">
                        @foreach($gender as $v)
                        <option class="masuk" value="{{ $v }}" {{$admin->gender == $v ? 'selected="selected"' : ''}}> {{ $v}} </option>
                        @endforeach
                    </select>
                    @if ($errors->has('gender'))
                        <span class="help-block">
                            <strong>{{ $errors->first('gender') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="col-md-6 form-group{{ $errors->has('file') ? ' has-error' : '' }}">
                <label for="file" class="col-md-2 control-label">file</label>
                <div>
                    <!--<img src="" id="img" class="img-responsive" width="40%" height="40%" style="height: 160px; width: 140px;" /> -->
                    <input id="file" accept="image/*" type="file" class="masuk form-control" name="file" value="{{ old('file') ? old('file') : '' }}">
                    @if ($errors->has('file'))
                    <span class="help-block">
                        <strong>{{ $errors->first('file') }}</strong>
                    </span>
                    @endif
                </div>
            </div>
              
            <div class="col-md-3 col-md-offset-3 form-group">
                <div>
                    <img id="img-preview" class="img-responsive" src="{{asset($admin->file)}}" width="50%" height="35%" />
                </div>
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
