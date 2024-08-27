@extends('layouts.admin.admin')
@section('content')
<div class="data--table">
    <div class="title">
        <div class="inliner">
        <h5><a href="{{ route('home') }}"><i class="ri-dashboard-3-line"></i>Dashboard</a></h5> / <h2 class="section--title">Data Profil</h2>    
        </div>
        <div>

        </div>
    </div>
   <div class="title">
        @csrf
        @if(session('status'))
            <strong>{{session('status')}}</strong>
        @endif
    </div>
    <div class="table">
        <table> 
            <thead class="stik">
                <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Full Name</th>
                    <th>File/Foto</th>

                    <th>Settings</th>
                </tr>
            </thead>
            <tbody id="sass">
                @forelse($data as $val)
                <tr>
                    <td style="text-align: center;">{{$loop->iteration}}</td>
                    <td>
                        {{ucfirst($val->name)}}
                        <hr>
                        {{$val->email}}
                    </td>
                    <td>
                        {!!($val->lengkap)!!}
                    </td>
                    <td>
                        <img src="{{asset($val->file)}}" width="40%" height="30%">
                    </td>
                    <td style="text-align: center;">
                        <form class="formDelete" action="" method="post">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="_method" value="delete">
                            <input type="hidden" name="id" value="{{ $val->id }}">
                            <div class="form-group">
                                <a class="t_ubah" href="{{ route('pendidikans.index',[$val->id]) }}"><i class="ri-edit-line edit"></i>Pendidkan</a>
                                <a class="t_ubah" href="{{ route('skills.index',[$val->id]) }}"><i class="ri-edit-line edit"></i>Skills</a>
                                <a class="t_ubah" href="{{ route('profil.edit',$val->id) }}"><i class="ri-edit-line edit"></i>Ubah</a>   
                                <a class="t_ubah" href="{{ route('profil.show',$val->id) }}"><i class="ri-edit-line delete"></i>Hapus</a>
                            </div>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="15" class="text-center">Tidak Ada Data</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
 
@endsection