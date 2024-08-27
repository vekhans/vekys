<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Models\User;

class ProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try
        {
            // cek apakah user sudah login atau belum
            if(!Auth::User())
            {
                // jika tidak ada maka akan dikembalikan ke halaman login 
                $status = "Data tidak valid !...";
                return redirect()->route('login')->with('status', $status);
            }
            // cek apakah id user = 1 
            //artinya hanya user dengan id = 1 saja yang bisa mengakses data profil
            if (Auth::User()->id==1){
                //jika berhasi (user id =1) 
                //maka akan membuat title dengan nama title = Data Profil'
                $title = 'Data Profil'; 
                //mengambil semua data yang ada di dalam table user'
                $data = User::all();
                // menampilkan halaman user yang lokasinya ada di profil/resource/view/admin/profil/index.blade.php 
                return view('admin.profil.index',['title' => $title, 'data' => $data]);
            }
            else{
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
     * Display the specified resource.
     */
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try
        {
            // cek apakah user sudah login atau belum
            if(!Auth::User())
            {
                // jika tidak ada maka akan dikembalikan ke halaman login
                return redirect()->route('login')->with('status','Data tidak valid!');
            }
            if (Auth::User()->id==1){
                //jika berhasi (user id =1) 
                //maka mencari dan mengambil id di dalam table users 
                $admin = User::findOrFail($id);
                $params = [
                // membuat tilte
                'title' => 'Ubah Profil',
                //membuat variable admin yang isinya id yang diambil dari table user
                'admin' => $admin,
                // membuat variable gender yang isinya Perempuan dan Laki-laki
                'gender'  => (['Perempuan','Laki-laki'])
            ];
            // menampilkan halaman edit.blade.php
            // yang lokasinya di folder profil/resources/view/admin/profil/edit.blade.php
            // (satu folder dengan index.blade.php) 
            return view('admin.profil.edit')->with($params);
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
    public function update(Request $request, string $id)
    {
        try
        {
            // cek apakah user sudah login atau belum
            if(!Auth::User())
            {
                // jika tidak ada maka akan dikembalikan ke halaman login
                return redirect()->route('login')->with('status','Data tidak valid!');
            }
            if (Auth::User()->id==1){
                $this->validate($request, [
                    'name' => 'required|max:100|unique:users,name,'.$id,
                    'lengkap' => 'required|max:100|unique:users,lengkap,'.$id,
                    'email'    => 'required|email|unique:users,email,'.$id.'|max:100',
                    'password' => 'required|min:5|confirmed',
                    'file'   => 'file'.('|image|max:2048'),   
                    'gender'  => 'required',
                ]);
                // mencari id yang akan di ubah di dalam tabel users
                $admin = User::findOrFail($id);
                // Jika di temukan maka akan menambil data yang telah user input di form edit 
                $admin->name = $request->name;
                $admin->email     = $request->email;
                $admin->password  = bcrypt($request->password);
                $admin->alamat = $request->alamat;
                $admin->telepon = $request->telepon;
                $admin->lengkap= $request->lengkap;
                $admin->pendidikan= $request->pendidikan;
                $admin->skill= $request->skill;
                $admin->tentang= $request->tentang;
                $admin->pengalaman= $request->pengalaman;
                $admin->gender= $request->gender;
                // cek apakah ada file/foto yang di pilih
                if ($request->hasFile('file')) {
                    // membuat variable dir untuk menyimpan media/admin/ 
                    $dir = 'storage/media/admin/';
                    // cek apakah ada folder media/admin/ di folder public
                    if(!file_exists($dir)){
                        // jika tidak ada maka perintah di bawah ini adalah
                        // perintah untuk membuat folder media/admin/
                        mkdir($dir, 0777, true);
                    }
                    // membuat variable imagename untuk menyimpan nama file
                    // dimana nama file adalah
                    // waktu.extensi file 
                    $imageName = time() .'profil'.'.' . $request->file->extension();
                    //menyimpan file/foto yang di input user kedalam folder media/admin  
                    $request->file->move(public_path('storage/media/admin/'), $imageName);
                    // membuat variable imgPath untuk menyimpan lokasi/folder dan nama file
                    // dimana nama folder adalah media/admin
                    // dan nama file adalah waktu.extensi file 
                    $imgPath = "storage/media/admin/" . $imageName;
                    //menyimpan lokasi dan nama file ke dalam table
                    $admin->file      = $imgPath; 
                }
                //menyimpan semua data kedalam table
                    $admin->save(); 
                //setelah berhasil akan kembali ke halaman index.blade.php
                 $status = "Data telah di Ubah...";
                return redirect()->route('profil.index')->with('status', $status);
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
    public function show(string $id)
    {
        try {
            // cek apakah user sudah login atau belum
            if(!Auth::User())
            {
                // jika tidak ada maka akan dikembalikan ke halaman login
                return redirect()->route('login')->with('status','Data tidak valid!');
            }
            if (Auth::User()->id==1){
                //jika berhasi (user id =1) 
                //maka mencari dan mengambil id di dalam table users 
                $admin = User::findOrFail($id);
                $params = [
                    // membuat tilte
                    'title' => 'Hapus Data Admin',
                    'admin' => $admin
                ];
                // menampilkan halaman edit.blade.php
                // yang lokasinya di folder profil/resources/view/admin/profil/edit.blade.php
                // (satu folder dengan index.blade.php) 
                return view('admin.profil.delete')->with($params);
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

    public function destroy(string $id)
    {
        try{
            if (Auth::User()->id== 1){
            
                $relationships = array();
                $admin = User::findOrFail($id);
                $should_delete = true;
                foreach($relationships as $r) {
                    if ($admin->$r->isNotEmpty()) {
                        $should_delete = false; 
                        return redirect()->route('profil.index')->with('error', "User <strong>$admin->name</strong> tidak bisa dihapus karna sudah dipakai pada data lainnya.");
                    }
                }
                if ($should_delete == true) {
                    $admin->delete();
                    return redirect()->route('profil.index')->with('success', "User <strong>$admin->name</strong> Berhasil dihapus (Arsip).");
                }
            }
            else{
                return redirect()->route('home')->with('status', $status);
            }
        }
        catch (ModelNotFoundException $ex) {
            if ($ex instanceof ModelNotFoundException)
            {
                return response()->view('errors.'.'404');
            }
        }
    }
}
