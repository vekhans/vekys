<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User; 
use App\Models\Skill; 
use Illuminate\Support\Facades\DB;
class SkillsController extends Controller
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
                $title = 'Data Skills';  
                $data = Skill::all()->where('id_user','=',$users);
                $users = User::find($users);
                // menampilkan halaman slide yang lokasinya ada di profil/resource/view/admin/berita/index.blade.php 
                return view('admin.skill.index',['title' => $title, 'data' => $data,'users'=>$users]);
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
                $title = "Tambah data Skill"; 
                // mengambil semua data yang ada di dalam table jenis_beritas'
                //$trimas = User::where('aturan','=','kuning')->get();
                $data      = Skill::where('id_user','=',$users)->find($id);
                $users = User::find($users);
                return view('admin.skill.create',['title' => $title, 'users' => $users, 'id' => $id,'data' => $data]);
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
                    'persen' => 'required|numeric', 
                    
                     
                ]);
                //jika berhasi (user id =1) 
                $title = "Tambah data Skills";  
                $pendidikans = new Skill;
            $pendidikans->id_user = $users;
            $pendidikans->nama   = $req->nama; 
            $pendidikans->persen   = $req->persen; 
             $pendidikans->save();
            $status = "1 Data Skills baru telah diunggah.";
            return redirect()->route('skills.index',$users)->with('status', $status);
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
    public function show(string $id)
    {
        //
    }

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
                 
            $skill = Skill::findOrFail($id); 
            $params = [
                // membuat tilte
                'title' => 'Ubah Skill',
                'skill' => $skill,
                'users' => $users,
                
            ];
            // menampilkan halaman edit.blade.php 
            return view('admin.skill.edit',[$users])->with($params);
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
                    'persen' => 'required|numeric',
                     
                    
                     
                ]);
                $users= User::findOrFail($users);
                $skill = Skill::findOrFail($id);
                $skill->nama = $request->input('nama');
                $skill->persen = $request->input('persen');
                
                $skill->save();
                return redirect()->route('skills.index',$users)->with('info', "Data Skill berhasil diubah.");
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
                $pendidikans = Skill::findOrFail($id);
                $should_delete = true;
                foreach($relationships as $r) {
                    if ($pendidikans->$r->isNotEmpty()) {
                        $should_delete = false; 
                        return redirect()->route('skills.index',[$users,'id'=>null])->with('error', "Skill <strong>$pendidikans->nama</strong> tidak bisa dihapus karna sudah dipakai pada data lainnya.");
                    }
                }
                if ($should_delete == true) {
                    $pendidikans->delete();
                    return redirect()->route('skills.index',[$users,'id'=>null])->with('success', "Skill <strong>$pendidikans->nama</strong> Berhasil dihapus (Arsip).");
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
