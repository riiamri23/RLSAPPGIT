<?php

namespace App\Imports;

use App\RegresiDetail;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\ToModel;

class RegresiDetailImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    function __construct(Request $request){
        $this->request = $request;
    }
    
    public function model(array $row)
    {

        return new RegresiDetail([
            'id_regresi'=>$this->request->id_regresi,
            'datax'=> $row[0],
            'datay'=> $row[1]
        ]);
    }
}
