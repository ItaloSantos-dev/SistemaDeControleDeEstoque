<?php

use App\Http\Controllers\ProdutoController;
use App\Models\Produto;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/estoque', [ProdutoController::class, 'index'])->name('produtos.index');

Route::get('/estoque/cadastrarproduto', [ProdutoController::class, 'create'])->name('produtos.create');

Route::post('/estoque/cadastrarproduto', [ProdutoController::class, 'store'])->name('produtos.store');


