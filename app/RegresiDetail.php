<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RegresiDetail extends Model
{
    public $timestamps = false;
    protected $guarded = [];
    
    public function regresi(){
        return $this->belongsTo('App\Regresi', 'id_regresi');
    }

    public function powX2(){
        return pow($this->datax,2);
    }

    public function powY2(){
        return pow($this->datay,2);
    }

    public function XY(){
        return $this->datax * $this->datay;
    }
}
