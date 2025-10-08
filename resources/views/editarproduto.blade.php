@extends('layout.main')
@section('title', 'Editar produto')

@section('content')
@if(session()->has('info'))
    <div class="container text-center alert alert-info mt-1">
        <div class="row">
            <div class="col">
                
                    {{session('info')}}
                
            </div>
        </div>
    </div>
@endif
    <div class="container d-flex mt-3 mb-3 ">
        
        <div class=" card text-center p-3 shadow">
            <img src="{{ $produto->imagem }}" 
             alt="" 
             style="width: 450px; height: 450px;">
        </div>

        <form style="width: 35vw;" class=" text-center ms-3  border" action="{{route('produtos.update', $produto)}}" method="post">
            @csrf
            @method('PUT')
            <div class="row g-0 gap-2 p-3">
                <div class="col">
                    <label class="form-label" for="nome">Nome</label>
                    <input placeholder="{{$produto->nome}}" class="form-control" type="text" name="nome" id="nome">
                </div>

                <div class="col">
                    <label class="form-label" for="categoria_id">Categoria</label>
                    <select name="categoria_id" id="categoria" class="form-control">
                        <option value="">{{ucfirst($produto->categoria->nome)}}</option>|
                        @foreach ($categorias as $categoria )
                            <option value="{{$categoria->id}}">{{ucfirst($categoria->nome)}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="row g-0 p-3">
                
            </div>
            <div class="row row g-0 p-3">
                <div class="col">
                    <label for="imagem">URL da imagem</label>
                    <input placeholder="{{$produto->imagem}}" type="text" name="imagem" id="imagem" class="form-control">
                </div>
            </div>

            <div class="row g-0 gap-2 p-3">
                <div class="col">
                    <label for="preco" class="form-label">Preço</label>
                    <input placeholder="{{$produto->preco}}" type="number" name="preco" id="preco" class="form-control">
                </div>

                <div class="col">
                    <label for="estoque" class="form-label">Estoque</label>
                    <input placeholder="{{$produto->estoque}}" type="number" name="estoque" id="estoque" class="form-control">
                </div>
            </div>

            <div class="row g-0 gap-2 p-3">
                <div class="col">
                    <label for="quantidade" class="form-label">Quantidade</label>
                    <input placeholder="{{$produto->quantidade}}" type="number" name="quantidade" id="quantidade" class="form-control">
                </div>

                <div class="col">
                    <label for="unidade" class="form-label">Unidade</label>
                    <input placeholder="{{$produto->unidade}}" type="text" name="unidade" id="unidade" class="form-control">
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <button class="btn btn-success" type="submit">Salvar</button>
                </div>
                <div class="col">
                    <button type="button" onclick="limparCampos()" class="btn btn-danger">Limpar</button>
                </div>
            </div>
        </form>

    </div>
    <script>
        function limparCampos(){
            document.getElementById('nome').value=""
            document.getElementById('imagem').value=""
            document.getElementById('preco').value=""
            document.getElementById('estoque').value=""
            document.getElementById('quantidade').value=""
            document.getElementById('unidade').value=""

            


        }
    </script>
@endsection