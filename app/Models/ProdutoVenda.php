<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProdutoVenda extends Model
{
    protected $table = 'produto_venda';
    protected $fillable = [
        'venda_id',
        'produto_id',
        'quantidade',
        'valor_total',
        'produto_preco',
        'forma',
        'data',


    ];

    public function produto(){
        return $this->belongsTo(Produto::class);
    }
}
