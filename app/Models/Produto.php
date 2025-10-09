<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable = [
        'nome', 'categoria_id', 'preco', 'estoque', 'quantidade', 'unidade', 'imagem'
    ];

    public function categoria(){
        return $this->belongsTo(Categoria::class);
    }

    //Relação com a tabela pivo
    public function vendas(){
        return $this->belongsToMany(Venda::class, 'produto_venda')->withPivot('quantidade', 'produto_preco')->withTimestamps();
    }

}
