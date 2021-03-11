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
        <div class="form-group">
            <label for="input-ID">ID</label>
            <input type="text" class="form-control" id="input-ID" value={{$endereco->id}} disabled>
        </div>
        <div class="form-group">
            <label for="Input-bairro">Bairro</label>
            <input type="text" class="form-control" id="Input-bairro" aria-describedby="bairro-Help" value={{$endereco->bairro}} disabled>
        </div>
      
        <div class="form-group">
            <label for="Input-rua">Nome da rua</label>
            <input type="text" class="form-control" id="Input-rua"  value={{$endereco->logradouro}} disabled>
        </div>

        <div class="form-group">
            <label for="Input-id-casa">Numero da casa</label>
            <input type="text" class="form-control" id="Input-id-casa"  value={{$endereco->numero}} disabled>
        </div>

        <div class="form-group">
            <label for="Input-comp">Complemento</label>
            <input type="text" class="form-control" id="Input-comp" value={{$endereco->complemento}} disabled>
        </div>

        <div class="form-group">
            <input class="form-control" id="input-Users-id" value={{$endereco->Users_id}} disabled>
        </div>

      <a href="{{route('endereco.index')}}" class="btn btn-primary">Voltar</a>
</div>

     <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
 
</body>
</html>