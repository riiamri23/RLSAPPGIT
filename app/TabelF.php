<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TabelF extends Model
{
    public $timestamps = false;
    protected $guarded = [];
    
    public function alpha(){
        return $this->belongsTo('App\Alpha', 'id_alpha');
    }
}
