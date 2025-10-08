<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Produto;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produtos=Produto::all();
        return view('estoque', compact('produtos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = Categoria::all();
        return view('cadastrarproduto', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $novoProduto = $request->validate([
            'nome' => 'required|string|max:100',
            'categoria_id' => 'required|numeric',
            'imgurl' => 'required|url',
            'preco'=>'numeric|required',
            'estoque'=>'integer|required',
            'quantidade'=>'required|numeric',
            'unidade' =>'required|string',

        ]);
        $novoProduto['imagem']= $request->imgurl;

        Produto::create($novoProduto);
        return redirect()->route('produtos.index');

        
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $produto = Produto::with('categoria')->find($id);
        $categorias = Categoria::all();

        return view('editarproduto', compact('produto', 'categorias'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produto $produto)
    {
        if($request->filled('nome')){
            $novosdados['nome']=$request->nome;
        }
        if($request->filled('categoria_id')){
            $novosdados['categoria_id']=$request->categoria_id;
        }
        if($request->filled('imagem')){
            $novosdados['imagem']=$request->imagem;
        }
        if($request->filled('preco')){
            $novosdados['preco']=$request->preco;
        }
        if($request->filled('estoque')){
            $novosdados['estoque']=$request->estoque;
        }
        if($request->filled('quantidade')){
            $novosdados['quantidade']=$request->quantidade;
        }
        if($request->filled('unidade')){
            $novosdados['unidade']=$request->unidade;
        }
        
        if($produto->update($novosdados)){
            return redirect()->route('produtos.edit', $produto->id)->with('info', 'Produto atualizado com sucesso');
        }
        else{
            return redirect()->route('produtos.edit', $produto->id)->with('info', 'Não foi possível atualizar o produto');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Produto::destroy($id);
        return redirect()->route('produtos.index')->with('info', 'produto apagado com sucesso');
    }
}
