<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Arquivo extends Model
{
    public function processo(){
        return $this->belongsTo('App\Processo');
    }
}
