<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//agar kita dapat menggunakan query mysql 
use Illuminate\Support\Facades\DB;
//agar kita dapat menggukan fungsi autentifikasi user yang login 
use Auth;
//koneksi model Slide.php yang ada di folder App\Models\Slide.php
use App\Models\Slide;


class SlideController extends Controller
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
                return redirect()->route('login')->with('status','Data tidak valid!');
            }
            // cek apakah id user = 1 
            //artinya hanya user dengan id = 1 saja yang bisa mengakses data profil
            if (Auth::User()->id==1){
                //jika berhasi (user id =1) 
                //maka akan membuat title dengan nama title = Data Slide
                $title = 'Data Slide'; 
                // mengambil semua data yang ada di dalam table slides'
                $data = Slide::all();
                // menampilkan halaman slide yang lokasinya ada di profil/resource/view/admin/slide/index.blade.php 
                return view('admin.slide.index',['title' => $title, 'data' => $data]);
            }else{
                $status = "Anda Bukan Super Admin.";
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
     * Show the form for creating a new resource.
     */
    public function create()
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
                //maka akan membuat title dengan nama title = Data Slide
                $title = 'Tambah Data Slide';  
                // menampilkan halaman slide yang lokasinya ada di profil/resource/view/admin/slide/create.blade.php 
                return view('admin.slide.create',['title' => $title]);
            }
            else{
                $status = "Anda Bukan Super Admin.";
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
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try
        {
            // cek apakah user sudah login atau belum
            if(!Auth::User())
            {
                // jika tidak ada maka akan dikembalikan ke halaman login
                $status = "Silahkkan Login terlebih dahulu.";
                return redirect()->route('login')->with('status', $status);
            }
            // cek apakah id user = 1 
            //artinya hanya user dengan id = 1 saja yang bisa mengakses data profil
            if (Auth::User()->id==1){
                //jika berhasi (user id =1) 
                //membuat validasi inputan user dari form tambah slide/gambar
                $this->validate($request, [
                    'file'   => 'required|file|image',
                    'caption' => 'required',
                ]);
                
                 //membuat vaiable dir untuk menyimpan folder media/slide
                $dir = 'storage/media/slide/';
                // cek apakah ada folder media/slide/ di folder public
                if(!file_exists($dir)){
                    // jika tidak ada maka perintah di bawah ini adalah
                    // perintah untuk membuat folder media/slide/
                    mkdir($dir, 0777, true);
                }
                // membuat variable imagename untuk menyimpan nama file
                // dimana nama file adalah
                // waktu.extensi file 
                $imageName = time() . '.' . $request->file->extension();
                //menyimpan file/foto yang di input user kedalam folder media/slide  
                $request->file->move(public_path('storage/media/slide/'), $imageName);
                // membuat variable imgPath untuk menyimpan lokasi/folder dan nama file
                // dimana nama folder adalah media/slide
                // dan nama file adalah waktu.extensi file 
                $imgPath = "storage/media/slide/" . $imageName;
                $media = new Slide;
                $media->caption  = $request->caption;
                $media->sumber  = $request->sumber;
                $media->deskripsi  = $request->deskripsi;
                $media->file     = $imgPath;
                $media->save();
                // $status = "1 Data Slide baru telah diunggah.";
                // return redirect()->route('slide.index')->with('status', $status);
                return redirect()->route('slide.index')->with('success','Item created successfully!');
            }
            else{
                $status = "Data tidak valid.";
                return redirect()->route('login')->with('status', $status);
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try
        {
            // cek apakah user sudah login atau belum
            if(!Auth::User())
            {
                // jika tidak ada maka akan dikembalikan ke halaman login
                $status = "Silahkkan Login terlebih dahulu.";
                return redirect()->route('login')->with('status', $status);
            }
            // cek apakah id user = 1 
            //artinya hanya user dengan id = 1 saja yang bisa mengakses data profil
            if (Auth::User()->id==1){
                //jika berhasi (user id =1) 
                //membuat variable slides untuk menampung id dari table slides yang akan di hapus 
                $slides = Slide::find($id);
                //cek jika filenya ada 
                if(file_exists('./'.$slides->file)){
                    //jika file ada maka akan di hapus dari folder media/slide
                    unlink('./'.$slides->file);
                }
                //menghapus data di table slide
                $slides->delete();
                // membuat variable status
                $status = "1 Data Slide telah dihapus.";
                // menampilkan halaman index dari data slide
                return redirect()->route('slide.index')->with('status', $status);
            }
            else{
                $status = "Data tidak valid.";
                return redirect()->route('login')->with('status', $status);
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
}
