<?php

namespace App\Http\Controllers;
use App\RegresiDetail;
use Illuminate\Http\Request;
use App\Imports\RegresiDetailImport;
use Maatwebsite\Excel\Facades\Excel;

class RegresiDetailController extends Controller
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
        //
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RegresiDetail $detail)
    {
        $detail->create($this->validateRequest());
        return redirect('regresi/' . $this->validateRequest()['id_regresi']);
        
    }

    public function storemulti(Request $request){
        
        Excel::import(new RegresiDetailImport($request), request()->file('file'));
        return redirect('regresi/'. $request->id_regresi);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RegresiDetail $detail)
    {
        $detail->update($this->validateRequest());

        return redirect('regresi/'. $this->validateRequest()['id_regresi']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(RegresiDetail $detail)
    {
        $detail->delete();

        return redirect('regresi/'. $this->validateRequest()['id_regresi']);
    }

    private function validateRequest(){
        
        return request()->validate([
            'id_regresi'=> 'required',
            'datax'=> 'required|numeric',
            'datay'=>'required|numeric'
        ]);
    }
}
