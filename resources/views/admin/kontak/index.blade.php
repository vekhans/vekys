@extends('layouts.admin.admin')
@section('content')
<div class="data--table">
    <div class="title">
        <div class="inliner">
        <h5><a href="{{ route('home') }}">Dashboard</a></h5> / <h2 class="section--title">Data Kontak</h2>    
        </div>
        <div>

        </div>
    </div>
    @if(session('status'))
    <div class="alert alert-info">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
        <strong>{{session('status')}}</strong>
    </div>
    @endif
    <div class="table">
        <table> 
            <thead class="stik">
                <tr>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>subjek</th>
                    <th>Pesan</th>
                    <th>Settings</th>
                </tr>
            </thead>
            <tbody id="sass">
                @forelse($data as $val)
                <tr>
                    <td> {{$loop->iteration}}</td>
                    <td>
                        {{ucfirst($val->nama)}}
                        <hr>
                        {{ucwords($val->email) }}
                         
                    </td>
                    <td>
                        {{ucfirst($val->perihal)}}
                        <hr>
                        {{($val->session_id}}
                        <hr>
                        {{($val->ip)}}
                        <hr>
                        {{ucfirst($val->agent)}}
                    </td>
                    <td>
                        {{ucfirst($val->komentar)}}
                    </td>
                    
                    <td class="text-center">
                        <form class="formDelete" action="{{route('kontaks.destroy',$val->id)}}" method="post">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="_method" value="delete">
                            <input type="hidden" name="id" value="{{ $val->id }}">
                            <div class="form-group">
                                  
                                <a class="t_ubah" href="{{ route('kontaks.show', $val->id) }}"><i class="ri-eye" title="baca"></i>Baca</a>
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