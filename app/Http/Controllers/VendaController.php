<?php

namespace App\Http\Controllers;

use App\Models\Forma;
use App\Models\Produto;
use App\Models\ProdutoVenda;
use App\Models\Venda;
use Illuminate\Http\Request;

class VendaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vendas=Venda::with('items.produto')->get();
        return view('vendas', compact('vendas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $produtos = Produto::where('estoque', '>=', 1)->get();
        return view('realizarvenda', compact('produtos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $novaVenda = new Venda();
        $novaVenda->valor_final = session('valorTotal');
        $novaVenda->forma=$request->forma;
        $novaVenda->data = now();
        $novaVenda->save();
        $carrinho = session('carrinho');

        foreach($carrinho as $id=>$item){
            $produtoVenda = new ProdutoVenda();
            $produtoVenda->produto_id = $item['produto']->id;
            $produtoVenda->venda_id = $novaVenda->id;
            $produtoVenda->quantidade = $item['qtd'];
            $produtoVenda->valor_total = $item['qtd']*$item['produto']->preco;
            $produtoVenda->produto_preco = $item['produto']->preco;
            $produtoVenda->forma = $novaVenda->forma;
            $produtoVenda->data = now();
            $produtoVenda->save();
            $produto = Produto::find($item['produto']->id);
            $novoEstoque['estoque'] =$produto->estoque - $item['qtd'];
            $produto->update($novoEstoque);
        }
        

        session()->forget('carrinho');
        session()->forget('valorTotal');

        return redirect()->route('vendas.create')->with('vendasuccess', 'Venda feita com sucesso');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
