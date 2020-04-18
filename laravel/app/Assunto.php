<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assunto extends Model
{
    public function processos(){
        return $this->hasMany('App\Processo');
    }
}
