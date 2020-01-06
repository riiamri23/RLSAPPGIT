<?php

namespace App\Http\Controllers;

use App\Alpha;
use Illuminate\Http\Request;

class AlphaController extends Controller
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
        $alpha = Alpha::all();
        return view('contents.alpha.index', compact('alpha'), [
            'title'=>'Alpha',
            'script'=>'contents.alpha.script',
            'url'=>'alpha'
        ]);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Alpha $alpha)
    {
        $alpha->create($this->validateRequest());
        return redirect('/alpha');
        // $alpha->create($this->validateRequest());
        // return redirect('/alpha');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Alpha $alpha)
    {

        $alpha->update($this->validateRequest());

        return redirect('/alpha');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Alpha $alpha)
    {
        $alpha->delete();

        return redirect('/alpha');

    }
    private function validateRequest(){
        
        return request()->validate([
            'nilai'=>'required|numeric'
        ]);
    }
}
