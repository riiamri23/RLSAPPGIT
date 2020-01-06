<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Regresi;
use App\Alpha;
use App\TabelF;
use App\RegresiDetail;

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
        //regresi
        $data['regresi'] = Regresi::where('id_user', auth()->user()->id)->count();
        return view('home', compact('data'));
    }
    
}
