<?php

use App\Http\Controllers\ProdutoController;
use App\Models\Produto;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/estoque', [ProdutoController::class, 'index'])->name('produtos.index');
