<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User; 
use App\Models\Pendidikan; 
use Illuminate\Support\Facades\DB;


class PendidikansController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($users)
    {
        try
        {
            // cek apakah user sudah login atau belum
            if(!Auth::User())
            {
                // jika tidak ada maka akan dikembalikan ke halaman login
                return redirect()->route('login')->with('status','Data tidak valid!');
            }
            // cek apakah id user = 1 
            //artinya hanya user dengan id = 1 saja yang bisa mengakses data profil
            if (Auth::User()->id==1){
                //jika berhasi (user id =1)  
                $title = 'Data Pendidikan';  
                $data = Pendidikan::all()->where('id_user','=',$users);
                $users = User::find($users);
                // menampilkan halaman slide yang lokasinya ada di profil/resource/view/admin/berita/index.blade.php 
                return view('admin.pendidikan.index',['title' => $title, 'data' => $data,'users'=>$users]);
            }
            else{
                return redirect()->route('login')->with('status','Data tidak valid!');
            }
        }
        catch (ModelNotFoundException $ex) 
        {
            if ($ex instanceof ModelNotFoundException)
            {
                return response()->view('errors.'.'404');
            }
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($users, $id=null)
    {
        try
        {
            // cek apakah user sudah login atau belum
            if(!Auth::User())
            {
                // jika tidak ada maka akan dikembalikan ke halaman login
                return redirect()->route('login')->with('status','Data tidak valid!');
            }
            if(!$users)
            {
                return redirect()->route('profil.index');
            }
            // cek apakah id user = 1 
            //artinya hanya user dengan id = 1 saja yang bisa mengakses data profil
            if (Auth::User()->id==1){
                //jika berhasi (user id =1) 
                $title = "Tambah data Pendidikan"; 
                // mengambil semua data yang ada di dalam table jenis_beritas'
                //$trimas = User::where('aturan','=','kuning')->get();
                $data      = Pendidikan::where('id_user','=',$users)->find($id);
                $users = User::find($users);
                return view('admin.pendidikan.create',['title' => $title, 'users' => $users, 'id' => $id,'data' => $data]);
            }
            else{
                return redirect()->route('login')->with('status','Data tidak valid!');
            }
        }
        catch (ModelNotFoundException $ex) 
        {
            if ($ex instanceof ModelNotFoundException)
            {
                return response()->view('errors.'.'404');
            }
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $req, $users, $id = null)
    {
        try
        {
            // cek apakah user sudah login atau belum
            if(!Auth::User())
            {
                // jika tidak ada maka akan dikembalikan ke halaman login
                return redirect()->route('login')->with('status','Data tidak valid!');
            }
            if(!$users)
            {
                return redirect()->route('profil.index');
            }
            // cek apakah id user = 1 
            //artinya hanya user dengan id = 1 saja yang bisa mengakses data profil
            if (Auth::User()->id==1){
                $this->validate($req, [
                    'nama' => 'required',
                    'tahun_masuk' => 'required|numeric',
                    'tahun_keluar' => 'required|numeric',
                    
                     
                ]);
                //jika berhasi (user id =1) 
                $title = "Tambah data Pendidikan";  
                $pendidikans = new Pendidikan;
            $pendidikans->id_user = $users;
            $pendidikans->nama   = $req->nama;
            $pendidikans->tahun_masuk     = $req->tahun_masuk;
            $pendidikans->tahun_keluar    = $req->tahun_keluar;
            $pendidikans->gelar    = $req->gelar;
             $pendidikans->save();
            $status = "1 Data Pendidikan baru telah diunggah.";
            return redirect()->route('pendidikans.index',$users)->with('status', $status);
            }
            else{
                return redirect()->route('login')->with('status','Data tidak valid!');
            }
        }
        catch (ModelNotFoundException $ex) 
        {
            if ($ex instanceof ModelNotFoundException)
            {
                return response()->view('errors.'.'404');
            }
        }
    }

    /**
     * Display the specified resource.
     */
    

    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($users,$id)
    {
        try
        {
            // cek apakah user sudah login atau belum
            if(!Auth::User())
            {
                // jika tidak ada maka akan dikembalikan ke halaman login
                return redirect()->route('login')->with('status','Data tidak valid!');
            }
            if(!$users)
            {
                return redirect()->route('profil.index');
            }
            if (Auth::User()->id==1){
                //jika berhasi (user id =1) 
                 
            $pendidikans = Pendidikan::findOrFail($id);
            $users = User::find($pendidikans->id_user);
            $params = [
                // membuat tilte
                'title' => 'Ubah Pendidikan',
                'pendidikans' => $pendidikans,
                'users' => $users,
                
            ];
            // menampilkan halaman edit.blade.php 
            return view('admin.pendidikan.edit',[$users])->with($params);
        }else{
                $status = "Anda Bukan Super Admin!...";
                return redirect()->route('home')->with('status', $status);
            }
        }
        catch (ModelNotFoundException $ex) 
        {
            if ($ex instanceof ModelNotFoundException)
            {
                return response()->view('errors.'.'404');
            }
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $users, $id)
    {
        if (Auth::User()->id== '1'){
            if(!$users)
            {
                return redirect()->route('profil.index')->with('status','Data tidak valid!');
            }
            try
            {
                $this->validate($request, [
                    'nama' => 'required',
                    'tahun_masuk' => 'required|numeric',
                    'tahun_keluar' => 'required|numeric',
                    
                     
                ]);
                $users= User::findOrFail($users);
                $pendidikans = Pendidikan::findOrFail($id);
                $pendidikans->nama = $request->input('nama');
                $pendidikans->tahun_masuk = $request->input('tahun_masuk');
                $pendidikans->tahun_keluar = $request->input('tahun_keluar');
                $pendidikans->gelar = $request->input('gelar'); 
                $pendidikans->save();
                return redirect()->route('pendidikans.index',$users)->with('info', "Data Pendidikan berhasil diubah.");
            }
            catch (ModelNotFoundException $ex) 
            {
                if ($ex instanceof ModelNotFoundException)
                {
                    return response()->view('errors.'.'404');
                }
            }
        }
        else{ 
                $status = "Anda Bukan Super Admin!...";
                return redirect()->route('home')->with('status', $status);
            
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id, $users)
    {
        if (Auth::User()->id== 1){
            try
            {
                $relationships = array();
                $pendidikans = Pendidikan::findOrFail($id);
                $should_delete = true;
                foreach($relationships as $r) {
                    if ($pendidikans->$r->isNotEmpty()) {
                        $should_delete = false; 
                        return redirect()->route('pendidikans.index',[$users,'id'=>null])->with('error', "Pendidikan <strong>$pendidikans->nama</strong> tidak bisa dihapus karna sudah dipakai pada data lainnya.");
                    }
                }
                if ($should_delete == true) {
                    $pendidikans->delete();
                    return redirect()->route('pendidikans.index',[$users,'id'=>null])->with('success', "Pendidikan <strong>$pendidikans->nama</strong> Berhasil dihapus (Arsip).");
                }
            }
            catch (ModelNotFoundException $ex) 
            {
                if ($ex instanceof ModelNotFoundException)
                {
                    return response()->view('errors.'.'404');
                }
            }
        }
        else{ 
                $status = "Anda Bukan Super Admin!...";
                return redirect()->route('home')->with('status', $status);
            
        }
    }
}
