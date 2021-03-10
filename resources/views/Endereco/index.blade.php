<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
   
    <title>Show de Produto</title>
</head>
<body>
<div class="container">
    <form method="POST" action={{route("Endereco.update")}}>
        @csrf
            <input name="_method" type="hidden" value="PUT">
        <div class="form-group">
            <label for="input-ID">id</label>
            <input type="text" class="form-control" id="input-ID" value={{$Endereco->id}} disabled>
        </div>
        <div class="form-group">
            <label for="input-bairro">bairro</label>
            <input name="bairro" type="text" class="form-control" id="input-bairro" placeholder="Informe o nome do recurso" value={{$Endereco->bairro}} >
        </div>
        <div class="form-group">
            <label for="input-preco">Preço</label>
            <input name="preco" type="text" class="form-control" id="input-preco" placeholder="Informe o preço do recurso" value={{$Endereco->logradouro}} >
        </div>
        <div class="form-group">
            <label for="input-tipo-produto">Tipo de Produto</label>
            <select id="input-tipo-produto" class="form-control" name="Tipo_Produtos_id">
                @foreach ($tipoProdutos as $tipoProduto)
                    @if ($tipoProduto->id == $produto->Tipo_Produtos_id)
                        <option value={{$tipoProduto->id}} selected>{{$tipoProduto->descricao}}</option> 
                    @else   
                        <option value={{$tipoProduto->id}}>{{$tipoProduto->descricao}}</option> 
                    @endif
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
        <a href={{route('produto.index')}} class="btn btn-primary">Voltar</a>
    </form>
</div>

     <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
 
</body>
</html>