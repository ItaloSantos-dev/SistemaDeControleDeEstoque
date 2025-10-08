<?php

use App\Http\Controllers\CarrinhoController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\VendaController;
use App\Models\Produto;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/vendas', [VendaController::class, 'index'])->name('vendas.index');
Route::post('/vendas', [VendaController::class, 'store'])->name('vendas.store');


Route::get('/estoque', [ProdutoController::class, 'index'])->name('produtos.index');
Route::get('/estoque/cadastrarproduto', [ProdutoController::class, 'create'])->name('produtos.create');
Route::get('/estoque/{id}', [ProdutoController::class, 'edit'])->name('produtos.edit');
Route::put('/estoque/{produto}', [ProdutoController::class, 'update'])->name('produtos.update');
Route::post('/estoque/cadastrarproduto', [ProdutoController::class, 'store'])->name('produtos.store');
Route::delete('/estoque/{id}', [ProdutoController::class, 'destroy'])->name('produtos.destroy');

Route::get('/realizarvenda', [VendaController::class, 'create'])->name('vendas.create');
Route::post('/realizarvenda', [VendaController::class, 'store'])->name('vendas.store');

Route::post('/carrinho/{id}', [CarrinhoController::class, 'add'])->name('carrinho.add');
Route::post('/carrinho', [CarrinhoController::class, 'limpar'])->name('carrinho.limpar');
Route::delete('/carrinho/{id}', [CarrinhoController::class, 'remove'])->name('carrinho.remove');


