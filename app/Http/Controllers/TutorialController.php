<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Alpha;
use App\TabelF;

class TutorialController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        
        $alpha = Alpha::all()->sortBy('nilai');
        $tabelF = TabelF::all();
        // $max = array(TabelF::max('penyebut'),TabelF::max('pembilang'));
        // dd($max)
        
        return view('contents.tutorial.index', compact('alpha', 'tabelF', ), [
            'title'=>'Tutorial',
            'url'=>'tutorial',
            'script'=>'contents.tutorial.script'
        ]);
    }
}
