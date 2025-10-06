@extends('layout.main')
@section('title', 'Cadastrar Produto')
<style>
footer {
    position: fixed;
    bottom: 0;
    left: 0;
    width: 100%;
    background-color: #f8f9fa; /* cor de fundo */
    text-align: center;
    padding: 10px 0;
    box-shadow: 0 -2px 5px rgba(0,0,0,0.1);
}
</style>
@section('content')
    <form class="container form-group text-center rounded shadow border mt-2 mb-2 p-2 position-absolute translate-middle top-50 start-50" method="post" action="{{route('produtos.store')}}" enctype="multipart/form-data">
        @csrf


        

        <div class="row">
            <h1>Cadastrar produto</h1>
        </div>
        <div class="row m-1">
            <div class="col">
                <label class="form-label" for="nome">Nome do produto</label>
                <input class="form-control" type="text" name="nome" id="nome">
            </div>

            <div class="col">
                <label class="form-label" for="categoria_id">Categoria</label>
                <select name="categoria_id" id="categoria" class="form-control">
                    <option value="">Selecione</option>
                    @foreach ($categorias as $categoria )
                        <option value="{{$categoria->id}}">{{ucfirst($categoria->nome)}}</option>
                    @endforeach
                </select>
            </div>

            <div class="row m-1">
                <div class="col">
                    <div class="input-group">
                        <label class="form-label m-1 " for="arquivo">Enviar imagem</label>
                        <input onfocus="imgForma(0)"  class="form-radio " type="radio" name="img" id="arquivo">
                        <label class="fomr-label m-1 " for="url">URL</label>
                        <input onfocus="imgForma(1)" class="form-radio " type="radio" name="img" id="url" checked>
                    </div>
                    <input class="form-control d-none" type="file" name="imgfile" id="imgfile">
                    <input  placeholder="URL da imagem aqui" class="form-control d-block" type="url" name="imgurl" id="imgurl" >
                </div>
            </div>



        </div>

        <div class="row m-1">
            <div class="col">
                <label class="form-label" for="preco">Preço</label>
                <input class="form-control" type="number" name="preco" id="preco" step="0.01">
            </div>

            <div class="col">
                <label class="form-label" for="estoque">Estoque</label>
                <input class="form-control" type="number" name="estoque" id="estoque" >
            </div>
        </div>

        <div class="row m-1">
            <div class="col">
                <label class="form-label" for="quantidade">Quantidade</label>
                <input class="form-control" type="number" name="quantidade" id="quantidade" step="0.01">
            </div>

            <div class="col">
                <label class="form-label" for="unidade">Unidade</label>
                <input class="form-control" type="text" name="unidade" id="unidade" >
            </div>
        </div>

        <div class="row mt-2">
            <div class="col">
                <input type="submit" value="Enviar" name="enviar" class="btn btn-success">
            </div>
        </div>

        



    </form>

    <script>
        function imgForma(acao){
            let file = document.getElementById('imgfile')
            let url = document.getElementById('imgurl')

            if (acao===1){
                file.classList.replace('d-block', 'd-none')
                url.classList.replace('d-none','d-block')

            }
            else if(acao==0){
                url.classList.replace('d-block', 'd-none')
                file.classList.replace('d-none','d-block')
            }
        }
    </script>
@endsection