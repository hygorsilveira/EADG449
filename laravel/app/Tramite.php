<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tramite extends Model
{
    public function processo(){
        return $this->belongTo('App\Processo');
    }
    public function unidade(){
        return $this->belongTo('App\Unidade');
    }
}
