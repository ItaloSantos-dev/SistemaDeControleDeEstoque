<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{
    public function items(){
        return $this->hasMany(ProdutoVenda::class);
    }
}
