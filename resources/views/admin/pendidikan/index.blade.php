@extends('layouts.admin.admin')
@section('content')
<div class="data--table">
    <div class="title">
        <div class="inliner">
        <h5><a href="{{ route('home') }}"><i class="ri-dashboard-3-line"></i>Dashboard</a></h5> / <h2 class="section--title">Data Pendidikan</h2>    
        </div>
        <div>
            <a href="{{route('pendidikans.create',$users->id)}}">
                <button class="add"><i class="ri-arrow-left-fill"></i>Tambah Pendidikan</button>
            </a>

        </div>
    </div>
   <div class="title">
        @csrf
        @if(session('status'))
         @csrf
            <strong>{{session('status')}}</strong>
         
        @endif
    </div>
    <div class="table">
        <table> 
            <thead class="stik">
                <tr>
                    <th>No.</th>
                    <th>Nama Pendidikan</th>
                    <th>Tahun Masuk</th>
                    <th>Tahun Keluar</th>
                    <th>Gelar</th>
                    <th>Settings</th>
                </tr>
            </thead>
            <tbody id="sass">
                @forelse($data as $val)
                <tr>
                    <td style="text-align: center;">{{$loop->iteration}}</td>
                    <td>
                        {{ucfirst($val->nama)}}
                    </td>
                    
                    <td>
                        {{ucfirst($val->tahun_masuk)}}
                    </td>
                    <td>
                        {{ucfirst($val->tahun_keluar)}}
                    </td>
                    <td>
                        {{ucfirst($val->gelar)}}
                    </td>
                    <td style="text-align: center;">
                        

                        <form class="formDelete form-horizontal" action="{{route('pendidikans.destroy',[$val->id,$users])}}" method="post">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="hidden" name="_method" value="delete">
                                        <input type="hidden" name="id" value="{{ $val->id }}">
                                        <div class="form-group">
                                             <a class="t_ubah" href="{{ route('pendidikans.edit',[$users,$val->id]) }}"><i class="ri-edit-line edit"></i>Ubah</a>  
                                            <button type="submit" class="t_hapus" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus data?')" title="hapus"><i class="icon-7 ri-delete-bin-line"></i>Hapus</button>
 
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