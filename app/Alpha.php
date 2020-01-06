<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alpha extends Model
{
    public $timestamps = false;
    protected $guarded = [];
    
    public function regresi(){
        return $this->hasMany('App\Regresi', 'id');
    }
    
    public function tabelf(){
        return $this->hasMany('App\TabelF', 'id');
    }
}
