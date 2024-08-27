@extends('layouts.admin.admin')
@section('content')
<div class="data--table">
    <div class="title">
        <div class="inliner">
        <h5><a href="{{ route('home') }}"><i class="ri-dashboard-3-line"></i>Dashboard</a></h5> / <h2 class="section--title">Data Slide</h2>    
        </div>
        <div>
            <a href="{{ route('slide.create') }}">
                <button class="add"><i class="ri-arrow-left-fill"></i>Tambah Slide</button>
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
                    <th>Caption</th>
                    <th>File/Foto</th>
                    <th>Sumber</th>
                    <th>Deskripsi</th>
                    <th>Settings</th>
                </tr>
            </thead>
            <tbody id="sass">
                @forelse($data as $val)
                <tr>
                    <td style="text-align: center;">{{$loop->iteration}}</td>
                    <td>
                        {{ucfirst($val->caption)}}
                    </td>
                    <td>  
                         <img src="{{($val->file)}}" width="50%" height="35%">
                    </td>
                    <td>
                        {{ucfirst($val->sumber)}}
                    </td>
                    <td>
                        {{ucfirst($val->deskripsi)}}
                    </td>
                    <td style="text-align: center;">
                        

                        <form class="formDelete form-horizontal" action="{{route('slide.destroy',$val->id)}}" method="post">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="hidden" name="_method" value="delete">
                                        <input type="hidden" name="id" value="{{ $val->id }}">
                                        <div class="form-group">
                                             
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