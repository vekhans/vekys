<?php

namespace App\Http\Controllers\Depan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Slide;
use App\Models\Pendidikan;
use App\Models\Skill;


class BerandaController extends Controller
{
    public function index(){
        $profil = User::all()->first();
         
        $params=[
            'title' => 'Welcome',
            'profil' => $profil, 
        ];
        return view('welcomes')->with($params);
    }
    public function beranda(){
        $profil = User::all()->first();
        $slides = Slide::all();
        $params=[
            'title' => 'Beranda',
            'profil' => $profil,
            'slides'  => $slides
        ];
        return view('welcome.beranda')->with($params);
    }

    public function tentang(){
        $users = User::all()->first();
        $params=[
            'title' => 'Tentang ',
            'users' => $users
        ];
        return view('welcome.tentang')->with($params);
    }
    public function pendidikan(){
        $users = User::all()->first(); 
        $pendidikan = Pendidikan::all()->where('id_user','=',1);
        $params=[
            'title' => 'Pendidikan ',
            'users' => $users,
            'pendidikan' => $pendidikan
        ];
        return view('welcome.pendidikan')->with($params);
    }
    public function skill(){
        $users = User::all()->first(); 
        $skill = Skill::all()->where('id_user','=',1);
        $params=[
            'title' => 'Skill ',
            'users' => $users,
            'skill' => $skill
        ];
        return view('welcome.skill')->with($params);
    }
}





