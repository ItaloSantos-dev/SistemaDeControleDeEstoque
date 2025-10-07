<?php

use App\Http\Controllers\ProdutoController;
use App\Models\Produto;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/estoque', [ProdutoController::class, 'index'])->name('produtos.index');

Route::get('/estoque/cadastrarproduto', [ProdutoController::class, 'create'])->name('produtos.create');

Route::get('/estoque/{id}', [ProdutoController::class, 'edit'])->name('produtos.edit');


Route::put('/estoque/{id}', [ProdutoController::class, 'update'])->name('produtos.update');



Route::post('/estoque/cadastrarproduto', [ProdutoController::class, 'store'])->name('produtos.store');

Route::delete('/estoque/{id}', [ProdutoController::class, 'destroy'])->name('produtos.destroy');


