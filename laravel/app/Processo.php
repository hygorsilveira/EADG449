<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Processo extends Model
{
    public function arquivos(){
        return $this->hasMany('App\Arquivo');
    }
    public function assunto(){
        return $this->belongsTo('App\Assunto');
    }
    public function tramites(){
        return $this->hasMany('App\Tramite');
    }
}
