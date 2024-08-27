<?php

namespace App\Http\Controllers\Depan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\models\Kontak;
use App\models\User;
class KontakController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    { 
        $profil = User::all()->first();
        $params = [
                    'title' => 'Kontak',
                    'profil' => $profil,
                ];
        return view('welcome.kontak')->with($params);
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
     
    public function store (Request $req, $id = null)
    {
        try
        {
            $title        = 'Kirim Pesan / Komentar ';
            $this->validate($req, [
                'nama'     => 'required|max:100',
                'email'    => 'required|max:100',
                'komentar'     => 'required',
            ]);  
             
            $vheput = new Kontak;
            $vheput->nama = $req->nama;
            $vheput->email     = $req->email;
            $vheput->perihal   = $req->perihal;
            $vheput->komentar  = $req->komentar; 
            $vheput->url = \Request::url();
            $vheput->session_id = \Request::getSession()->getId();
            $vheput->ip = \Request::getClientIp();
            $vheput->agent = \Request::header('User-Agent');
            $vheput->save();
            return redirect()->route('kontak.index')->with('status','Pesan / Komentar Telah dikirim!');
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
        //
    }
}
