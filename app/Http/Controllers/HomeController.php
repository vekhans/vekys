<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Kontak;
use App\Models\Slide;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $pesan = Kontak::orderBy('id')->count();
        $slide = Slide::orderBy('id')->count();
        $params = [
                    'title' => 'Dashboard',
                    'pesan' => $pesan,
                    'slide' => $slide,
                ];
        return view('layouts/welcome/home')->with($params);
    }
}
