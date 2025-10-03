@extends('layout.main')
@section('title', 'Estoque')

<style>
    #menulateral{
        height: 100vh;
        position: absolute;
        z-index: 3;
        width: 45vh;
        left: -30%;
        transition-duration: .5s;
        
    }
    .start-auto{
        top: 1%;
        left: 50%;
    }
</style>

@section('header-content')
    <div id="menulateral" class="container bg-dark shadow text-center">
        <button onclick="abrirMenuLateral(0)" class="bi bi-arrow-left start-auto position-relative translate-middle-x btn btn-primary"></button>

        <div class="row mt-2">
            <div class="col">
                <a class="btn btn-success" href="">Adicionar um produto</a>
            </div>
        </div>
        
    </div>
    <button onclick="abrirMenuLateral(1)" type="button" class="bi bi-list btn btn-primary m-2"></button>
    
@endsection

@section('content')
    
    <div class="container">
        <div class="row ">
            @foreach($produtos as $produto)
                <div class="col-md-2 mb-3 mt-3">
                    <div class="card  h-100 text-center shadow">
                        <img class="card-img-top p-3" style="height: 18vh;" src="{{$produto->imagem}}" alt="">
                        <div class="card-body">
                            <h5 class="card-title">{{$produto->nome}}</h5>
                            <div class="border">
                                <p class="card-text">R$ {{$produto->variacoes->first()->preco}}</p>
                                <p class="card-text">{{floor($produto->quantidade)}} {{$produto->unidade}}</p>
                                <p class="card-text">Estoque: {{$produto->variacoes->first()->estoque}}</p>
                            </div>
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
            menu.style.left="-30%"
        }
    }
</script>

@endsection