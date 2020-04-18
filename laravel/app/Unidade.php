<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unidade extends Model
{
    public function tramites() {
        return $this->hasMany('App\Tramite');
    }
}
