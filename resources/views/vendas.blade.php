@extends('layout.main')
@section('title', 'Vendas')
<style>
    .linhavenda{
        overflow: hidden;
        max-height: 13vh;
        transition: max-height 0.4s ease;
    }
</style>
@section('content')
        @foreach ($vendas as $venda )
            <div id="div{{$loop->index}}" class="conainer text-center sahdow border rounded m-2 linhavenda ">
                <div class="row  p-3 gap-2">
                    <div class="col alert alert-dark">
                        <label for="">Valor total:</label><br>
                        {{$venda->valor_final}}
                    </div>
                    <div class="col alert alert-dark">
                        <label for="">Data e hora:</label><br>
                        {{$venda->data}}
                    </div>
                    <div class="col alert alert-dark">
                        <label for="">Forma:</label><br>
                        {{ucfirst($venda->forma)}}
                    </div>
                    <div class="col">
                        <button onclick="mostrarProdutos('{{$loop->index}}')" id="btn{{$loop->index}}" type="button" class="btn btn-primary bi bi-arrow-down"></button>
                    </div>
                </div>
                <div class="row p-3">
                    <div class="col">
                        <label class="alert alert-success" for="">Nome</label>
                    </div>
                    <div class="col">
                        <label class="alert alert-success" for="">Preço</label>
                    </div>
                    <div class="col">
                        <label class="alert alert-success" for="">Quantidade</label>
                    </div>
                    <div class="col">
                        <label class="alert alert-success" for="">Valor total</label>
                    </div>
                    <div class="col"></div>
                </div>
                @foreach ($venda->items as $item )
                    <div class="row border rounded p-3">
                        <div class="col">
                            {{$item->produto->nome}}
                        </div>
                            <div class="col">
                            {{$item->produto_preco}}
                        </div>
                        <div class="col">
                            {{$item->quantidade}}
                        </div>
                            <div class="col">
                            {{$item->valor_total}}
                        </div>
                        <div class="col">
                            <img style="height: 7vh;" src="{{$item->produto->imagem}}" alt="">
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach
    <script>
        function mostrarProdutos(index){
            let outrasLinhas = document.querySelectorAll('.linhavenda')
            let btn = document.getElementById('btn'+index)
            let linhaselecionada = document.getElementById('div'+index)

            if(btn.classList.contains('btn-primary')){
                for(let linha of outrasLinhas){
                    linha.style.maxHeight="13vh";
                    let btnlinha = linha.querySelector('.btn-danger');
                    if (btnlinha) {
                        btnlinha.classList.replace('btn-danger', 'btn-primary');
                        btnlinha.classList.replace('bi-arrow-up', 'bi-arrow-down');
                    }
                }
                linhaselecionada.style.maxHeight = linhaselecionada.scrollHeight + "px";
                btn.classList.replace('btn-primary', 'btn-danger')
                btn.classList.replace('bi-arrow-down', 'bi-arrow-up') 
            }
            else{
                let btnlinha = linhaselecionada.querySelector('.btn-danger')
                btnlinha.classList.replace('btn-danger', 'btn-primary')
                btnlinha.classList.replace('bi-arrow-up', 'bi-arrow-down')
                linhaselecionada.style.maxHeight="13vh";
            }

        }
    </script>
@endsection