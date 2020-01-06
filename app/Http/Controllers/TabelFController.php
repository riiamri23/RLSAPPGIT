<?php

namespace App\Http\Controllers;
use App\TabelF;
use App\Alpha;
use Illuminate\Http\Request;

class TabelFController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $tabelf = TabelF::paginate(10);
        $alpha = Alpha::all();

        return view('contents.tabelf.index', compact('tabelf', 'alpha'), [
            'title'=>'Tabel F',
            'script'=>'contents.tabelf.script',
            'url'=>'tabelf'
        ]);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TabelF $tabelf)
    {
        $tabelf->create($this->validateRequest());
        return redirect('/tabelf');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TabelF $tabelf)
    {
        $tabelf->update($this->validateRequest());

        return redirect('/tabelf');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(TabelF $tabelf)
    {
        $tabelf->delete();

        return redirect('/tabelf');
    }

    private function validateRequest(){
        
        return request()->validate([
            'id_alpha'=>'required',
            'pembilang'=>'required|numeric',
            'penyebut'=>'required|numeric',
            'nilai'=>'required|numeric'
        ]);
    }
}
