@extends('layout.main')
@section('title', 'Realizar venda')
<style>
    #menulateral{
        height: 100vh;
        position: absolute;
        z-index: 3;
        width: 85vw;
        left: -100%;
        transition-duration: .5s;
        
    }
    .start-auto{
        top: 1%;
        left: 50%;
    }

</style>
@section('header-content')
<div id="menulateral" class="container bg-dark shadow text-center">
        <button onclick="abrirMenuLateral(0)" class="bi bi-arrow-left start-auto position-relative translate-middle-x m-2 btn btn-primary"></button>

            @if (session()->has('info'))
                <div class=" text-center m-2 row alert alert-info">
                    <h3>{{session('info')}}</h3>
                </div>
            @endif
            
        @if (session()->has('carrinho'))
            <div class="row m-2 shadow bg-white">
                <div class="col">
                    Nome
                    <br>
                    &darr;
                    
                </div>
                <div class="col">
                    Preço
                    <br>
                    &darr;
                    
                </div>
                <div class="col">
                    Quantidade
                    <br>
                    &darr;
                </div>
                <div class="col">
                    Valor total
                    <br>
                    &darr;
                </div>
                <div class="col"></div>
            </div>
            @foreach (session('carrinho') as $id=> $item )
                <div class="row m-2 shadow bg-white">
                    <div class="col">
                        {{$item['produto']->nome}}
                    </div>
                    <div class="col">
                        R$ {{$item['produto']->preco}}
                    </div>
                    <div class="col">
                        {{$item['qtd']}}
                    </div>
                    <div class="col">
                        R$ {{$item['qtd']*$item['produto']->preco}}
                    </div>
                    <div class="col  d-flex  gap-3">
                        <form action="{{route('carrinho.add', $item['produto']->id)}}" method="post">
                            @csrf
                            <button class="bi bi-plus btn btn-success" type="submit"></button>
                        </form>

                        <form action="{{route('carrinho.remove', $item['produto']->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="bi bi-dash btn btn-danger" type="submit"></button>
                        </form>
                    </div>
                </div>
                
            @endforeach
            <div class="row m-2  shadow bg-white">
                <div class="col mt-3 ">
                    <form class="" action="{{route('carrinho.limpar')}}" method="post">
                        @csrf
                        <button class="btn btn-danger" type="submit">Limpar</button>
                    </form>
                </div>

                <div class="col mt-3 ">
                    Valor final: R$ {{session('valorTotal')}}
                </div>

                <div class="col mt-3 ">
                    <form  action="{{route('vendas.store')}}" method="post">
                        @csrf
                        <select class="form-control" name="forma" id="forma" onchange="liberarBtnConf()">
                            <option  value="">Forma</option>
                            <option  value="pix">PIX</option>
                            <option  value="crédito">Crédito</option>
                            <option  value="débito">Débito</option>
                            <option  value="dinheiro">Espécie</option>
                        </select>

                        <button disabled id="btnConf" class="mt-2 btn btn-success" type="submit">Confirmar</button>
                    </form>
                </div>
            </div>
        @else
            <div class=" text-center m-2 row alert alert-info">
                <h3>Nada aqui</h3>
            </div>
            <img style="height: auto; width: auto;" src="https://arubrasil.com.br/site/images/empty_cart.gif" alt="">
            
        @endif
        
</div>
<button onclick="abrirMenuLateral(1)" class="btn btn-primary bi bi-cart2 position-absolute m-1"></button>
@endsection
@section('content')
    <div class="container">
        @if (session()->has('vendasuccess'))
                <div class=" text-center m-2 row alert alert-info">
                    <h3>{{session('vendasuccess')}}</h3>
                </div>
            @endif
        <div class="row ">
            @foreach($produtos as $produto)
                <div class="col-md-2 mb-3 mt-3">
                    <div class="card  h-100 text-center shadow">
                        <img class="card-img-top p-3" style="height: 25vh;" src="{{$produto->imagem}}" alt="">
                        <div class="card-body">
                            <h5 class="card-title">{{$produto->nome}}</h5>
                            <div class="border">
                                <p class="card-text">R$ {{$produto->preco}}</p>
                                <p class="card-text">{{floor($produto->quantidade)}} {{$produto->unidade}}</p>
                            </div>
                        </div>
                        <div class="card-footer d-flex gap-2 text-center justify-content-center">
                            <form action="{{route('carrinho.add', $produto->id)}}" method="post">
                                @csrf
                                <button type="submit" value="" class="btn btn-success">Adicionar</button>
                            </form>
                            
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <script>
    function abrirMenuLateral(acao){
        let menu = document.getElementById('menulateral');
        if(acao==1){
            menu.style.left="0%"
        }
        else{
            menu.style.left="-100%"
        }
    }
    function liberarBtnConf() {
    const btnConf = document.getElementById('btnConf'); // seu botão
    const forma = document.getElementById('forma').value;
    btnConf.disabled = (forma === "");
    }

</script>

@if (session()->has('abrirLateral'))
    <script>
        abrirMenuLateral(1);
    </script>
@endif
@endsection