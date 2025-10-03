<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    public function variacoes(){
        return $this->hasMany(Variacao::class);
    }
}
