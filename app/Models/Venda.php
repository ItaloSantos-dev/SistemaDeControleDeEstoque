<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Venda extends Model
{
    public function produtos(){
        return $this->belongsToMany(Produto::class, 'produto_venda')->withPivot('quantidade', 'produto_preco')->withTimestamps();
    }
}
