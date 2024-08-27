<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;
use App\models\Kontak;
use App\models\User;

class KontaksController extends Controller
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
            //artinya hanya user dengan id = 1 saja yang bisa mengakses data berita
            if (Auth::User()->id==1){
                //jika berhasi (user id =1) 
                //maka akan membuat title dengan nama title = Data Berita
                $title        = 'Kontak ';
                $data = Kontak::OrderBy ('id', 'desc')->get();
                return view('admin.kontak.index',['title' => $title, 'data' => $data]);
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //cek apakah user login atau tidak
        if(!Auth::User())
            {
                // jika tidak ada maka akan dikembalikan ke halaman login
                return redirect()->route('auth.login')->with('status','Data tidak valid!');
            }
        if (Auth::User()->id== 1){
            try
            {
                $kontakc = Kontak::findOrFail($id);
                $params = [
                    'title' => 'Hapus Data Jenis Berita',
                    'kontakc' => $kontakc,
                ];
                return view('admin.kontak.show')->with($params);
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
                return view('auth.login')->with('status', "User sudah salah .");
            }
    }
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
                //membuat variable kontak untuk menampung id dari table kontak yang akan di hapus 
                $kontak = Kontak::find($id);
                 
                //menghapus data di table slide
                $kontak->delete();
                // membuat variable status
                $status = "1 Data Kontak telah dihapus.";
                // menampilkan halaman index dari data slide
                return redirect()->route('kontaks.index')->with('status', $status);
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
