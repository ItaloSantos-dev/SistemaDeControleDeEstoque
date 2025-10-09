<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class CarrinhoController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function limpar(){
        session()->flush();
        return redirect()->route('vendas.create')->with('info', 'Carrinho limpo');
    }
    public function calcValorTotal(){
        $carrinho=session('carrinho');
        $valorTotal=0;
        foreach ($carrinho as $id=>$item ){
            $valorTotal += $carrinho[$id]['produto']->preco * $carrinho[$id]['qtd'];
        }
        return $valorTotal;
    }
    public function add($id){
        $carrinho = session('carrinho', []);
        if(isset($carrinho[$id])){
            if($carrinho[$id]['produto']->estoque==$carrinho[$id]['qtd']){
                $with="Você ja alcançou o limite de quantidade deste produto";
            }
            else{
                $carrinho[$id]['qtd']=$carrinho[$id]['qtd']+1; 
                $with="Item icrementado com sucesso";
            }
        }
        else{
            $carrinho[$id]['produto']=Produto::find($id);
            $carrinho[$id]['qtd']=1;
            $with="Item adicionado com sucesso";
        }
        session()->put('carrinho',$carrinho);
        $valorTotal = $this->calcValorTotal();
        session()->put('valorTotal', $valorTotal);
        return redirect()->route('vendas.create')->with('info', $with)->with('abrirLateral', 'chegou');
    }

    public function remove($id){
        $carrinho=session('carrinho', []);
        $carrinho[$id]['qtd']-=1;
        if($carrinho[$id]['qtd']==0){
            unset($carrinho[$id]);
        }
        if(empty($carrinho)){
            session()->forget('carrinho');
        }
        else{
            session()->put('carrinho', $carrinho);
            $valorTotal=$this->calcValorTotal();
            session()->put('valorTotal', $valorTotal);
        }
        
        
        return redirect()->route('vendas.create')->with('info', 'Produto removido com sucesso')->with('abrirLateral', 'chegou');

    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
