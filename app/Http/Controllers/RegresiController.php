<?php

namespace App\Http\Controllers;

use App\Regresi;
use App\RegresiDetail;
use App\Alpha;
use Illuminate\Http\Request;

class RegresiController extends Controller
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
        $regresis = Regresi::where('id_user', auth()->user()->id)->paginate(5);
        return view('contents.regresi.index', compact('regresis'), [
            'title'=>'Regresi',
            'url'=> 'regresi',
            'script'=>'contents.regresi.script',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Regresi $regresi)
    {
        $alpha = Alpha::all()->sortBy('nilai');
        return view('contents.regresi.create', compact('regresi', 'alpha'), [
            'title'=>'Regresi',
            'url'=> 'regresi/create',
            'script'=>'contents.regresi.script',
        ]);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Regresi $regresi)
    {
        $data = array(
            'id_user'=>auth()->user()->id
        );
        $alldata = array_merge($this->validateRequest(), $data);
        $regresi->create($alldata);

        return redirect('regresi/'. $regresi->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Regresi $regresi)
    {
        $detail = RegresiDetail::where('id_regresi', '=', $regresi->id)->paginate(10);

        if(auth()->user()->id == $regresi->id_user){

            return view('contents.regresi.show', compact('regresi', 'detail'),[
                'script'=>'contents.regresi.detail.script',
                'url'=>'regresi/show',
                'id'=>$regresi->id
            ]);
        }else{
            abort(404, 'Page not found');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Regresi $regresi)
    {
        $alpha = Alpha::all();
        if(auth()->user()->id == $regresi->id_user){

            return view('contents.regresi.edit', compact('regresi', 'alpha'), [
                'title'=>'Regresi',
                'url'=>'regresi/edit',
                'script'=>'contents.regresi.script',
                'id'=>$regresi->id
            ]);
        }else{
            abort(404, 'Page not found');
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Regresi $regresi)
    {
        $data = array(
            'id_user'=>auth()->user()->id
        );
        $alldata = array_merge($this->validateRequest(), $data);
        $regresi->update($alldata);

        return redirect('regresi/'. $regresi->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Regresi $regresi)
    {
        RegresiDetail::where('id_regresi', $regresi->id)->delete();
        $regresi->delete();

        return redirect('regresi');
    }
    private function validateRequest(){
        
        return request()->validate([
            'nama_kasus'=> 'required',
            'id_alpha'=>'required|numeric',
            'labelx'=>'required',
            'labely'=>'required',
            'h0'=>'required',
            'h1'=>'required'
        ]);
    }
}
