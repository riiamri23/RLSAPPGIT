<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Regresi;
use App\RegresiDetail;

class AnalisisDataController extends Controller
{
    public function index(){
        //regresi
        $regresis = Regresi::where('id_user', auth()->user()->id)->get(); //mendapat data regresi
        if($regresis->count() > 0){
            $regresi = Regresi::where('id_user', auth()->user()->id)->take(1)->get(); //mendapatkan satu data regresi

            //detail
            $detail = RegresiDetail::where('id_regresi', '=', $regresi[0]['id'])->get(); //mendapatkan data detail
            $data['detail'] = RegresiDetail::where('id_regresi', '=', $regresi[0]['id'])->count(); //menghitung data detail

            return view('contents.analisis_data.index', compact('data', 'detail', 'regresi', 'regresis'), [
                'title'=>'Analisis Data',
                'url'=> 'analisisdata',
                'script'=>'contents.analisis_data.script',
            ]);
        }else{
            return view('contents.analisis_data.blank', [
                'url'=> 'analisisdata',
                'title'=>'Analisis Data'
            ]);
        }
    }

    public function show(Regresi $regresi){
        
        $regresis = Regresi::where('id_user', auth()->user()->id)->get();
        if($regresis->count() > 0){
            $detail = RegresiDetail::where('id_regresi', '=', $regresi->id)->get();
            $data['detail'] = RegresiDetail::where('id_regresi', '=', $regresi->id)->count();
    
            return view('contents.analisis_data.index', compact('data', 'detail', 'regresi', 'regresis'), [
                'title'=>'Analisis Data',
                'url'=> 'home',
                'script'=>'contents.analisis_data.script',
            ]);
        }else{
            return view('contents.analisis_data.blank', [
                'url'=> 'analisisdata',
                'title'=>'Analisis Data'
            ]);

        }
    }
}
