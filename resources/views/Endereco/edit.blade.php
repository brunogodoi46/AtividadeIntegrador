<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
   
{{-- comentar--}}

    <title>Edit de Produto</title>
</head>
<body>
<div class="container">
   <form method="POST" action={{Route('endereco.update', $endereco->id)}}>
      @csrf
     <input name="_method" type="hidden" value="PUT">
        <div class="form-group">
          <label for="input-ID">ID</label>
          <input type="text" class="form-control" id="input-ID" value={{$endereco->id}} disabled>
        </div>

        <div class="form-group">
          <label for="Input-bairro">Bairro</label>
          <input name="bairro" type="text" class="form-control" id="Input-bairro" aria-describedby="bairro-Help" placeholder="Informe o nome do bairro" value={{$endereco->bairro}}>
          <small id="bairro-Help" class="form-text text-muted"></small>
        </div>
      
        <div class="form-group">
          <label for="Input-rua">Nome da rua</label>
          <input name="logradouro" type="text" class="form-control" id="Input-rua" aria-describedby="rua-Help" placeholder="Informe o nome da rua" value={{$endereco->logradouro}}>
          <small id="rua-Help" class="form-text text-muted"></small>
        </div>

        <div class="form-group">
          <label for="Input-id-casa">Numero da casa</label>
          <input name="numero" type="text" class="form-control" id="Input-id-casa" aria-describedby="casa-id-Help" placeholder="Informe o numero da casa" value={{$endereco->numero}}>
          <small id="casa-id-Help" class="form-text text-muted"></small>
        </div>

        <div class="form-group">
          <label for="Input-comp">Complemento</label>
          <input name="complemento" type="text" class="form-control" id="Input-comp" aria-describedby="comp-Help" placeholder="Informe o complemento" value={{$endereco->complemento}}>
          <small id="comp-Help" class="form-text text-muted"></small>
        </div>
        <div class="form-group">
          <input name="Users_id" class="form-control" id="input-Users-id" value={{$endereco->Users_id}}>
      </div>

      <button type="submit" class="btn btn-primary">Enviar</button>
      <a href={{route('endereco.index')}} class="btn btn-primary">Voltar</a>
    </form>
</div>

     <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
 
</body>
</html>