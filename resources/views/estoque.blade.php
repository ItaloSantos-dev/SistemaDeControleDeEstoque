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
                <a class="btn btn-success" href="{{route('produtos.create')}}">Adicionar um produto</a>
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
                        <img class="card-img-top p-3" style="height: 25vh;" src="{{$produto->imagem}}" alt="">
                        <div class="card-body">
                            <h5 class="card-title">{{$produto->nome}}</h5>
                            <div class="border">
                                <p class="card-text">R$ {{$produto->preco}}</p>
                                <p class="card-text">{{floor($produto->quantidade)}} {{$produto->unidade}}</p>
                                <p class="card-text">Estoque: {{$produto->estoque}}</p>
                            </div>
                        </div>
                        <div class="card-footer d-flex gap-2 text-center justify-content-center">
                            <form action="{{route('produtos.edit', $produto->id)}}" method="get">
                                @csrf
                                <button type="submit" value="" class="btn btn-primary bi bi-pencil-square"> </button>
                            </form>
                            <form action="{{route('produtos.destroy', $produto->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" value="" class="btn btn-danger bi bi-trash3"> </button>

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
            menu.style.left="-30%"
        }
    }
</script>

@endsection