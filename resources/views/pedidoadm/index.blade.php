<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href={{ asset('css/pedido.css') }}>
    <title>Index de Pedidos</title>
</head>
<body>
 

   <div class="container">
        <div class="row my-3">
            {{--Parte da esquerda--}}
            <div class="col-lg-3">
                <a href="#" class="btn btn-primary w-100">Voltar</a>            
                <div id="list-pedidosadm" class="list-group my-3">
                    <a href="#" class="list-group-item list-group-item-light list-group-item-action active" data-toggle="list">pedido 10</a>
                    <a href="#" class="list-group-item list-group-item-warning list-group-item-action" data-toggle="list">pedido 9</a>
                    <a href="#" class="list-group-item list-group-item-warning list-group-item-action" data-toggle="list">pedido 8</a>
                    <a href="#" class="list-group-item list-group-item-danger list-group-item-action" data-toggle="list">pedido 7</a>
                    <a href="#" class="list-group-item list-group-item-primary list-group-item-action" data-toggle="list">pedido 6</a>
                    <a href="#" class="list-group-item list-group-item-primary list-group-item-action" data-toggle="list">pedido 5</a>
                    <a href="#" class="list-group-item list-group-item-success list-group-item-action" data-toggle="list">pedido 4</a>
                    <a href="#" class="list-group-item list-group-item-success list-group-item-action" data-toggle="list">pedido 3</a>
                    <a href="#" class="list-group-item list-group-item-danger list-group-item-action" data-toggle="list">pedido 2</a>
                    <a href="#" class="list-group-item list-group-item-success list-group-item-action" data-toggle="list">pedido 1</a>
                </div>
            </div>  
            
            
            {{--Parte da meio--}}
            <div class="col-lg-5">
                <h2 class="text-center">Pedido 8</h2>               
                <div id="list-produtosadm" class="list-group my-3">
                    <span href="#" class="list-group-item">Pizza - Pepperoi - 1x
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil icons-list-produto-laps" viewBox="0 0 16 16">
                            <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                        </svg> 
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash icons-list-produtoadm" viewBox="0 0 16 16">
                           <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                           <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                        </svg>
                    </span>
                    <span href="#" class="list-group-item">Suco - Laranja - 2x
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil icons-list-produto-laps" viewBox="0 0 16 16">
                            <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash icons-list-produtoadm" viewBox="0 0 16 16">
                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                        </svg>
                    </span>
                    <span href="#" class="list-group-item">Cerveja - Skol lata - 1x
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil icons-list-produto-laps" viewBox="0 0 16 16">
                            <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash icons-list-produtoadm" viewBox="0 0 16 16">
                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                        </svg>
                    </span>
                </div>
                <div class="input-group">
                    <input type="text" class="form-control" value="Valor total do pedido">
                    <div class="input-group-append">
                      <span class="input-group-text">R$</span>
                      <span class="input-group-text">0.00</span>
                    </div>
                </div>
            </div>


            {{--Parte da direita--}}
            <div class="col-lg-3">           
            {{--formulario de produto--}} 
            <form action="">
                @csrf
                <div class="form-group">
                    <select class="form-control">
                        <option>Pizza</option>
                        <option>Suco</option>
                        <option>Cerveja</option>
                    </select>
                </div>
            </form>
            {{--formulario de TipoProduto--}} 
            <form action="">
                @csrf
                <div class="form-group">
                    <select class="form-control">
                        <option>Calabresa</option>
                        <option>Quatro Queijo</option>
                    </select>
                </div>
            </form>
                {{--botão acidionar produto--}}
                <input id="spinner" name="value" value=1>  
            <form class="my-3" method="POST" action="#">
                @csrf
               <input type="submit" class="w-100" value="adicionar produto"> 
          </form> 
                 {{--formulario de Endereço--}} 
            <form action="">
                @csrf
                <div class="form-group">
                    <select class="form-control">
                        <option>Rua x</option>
                        <option>Rua y</option>
                    </select>
                </div>
            </form>
             {{--botão Confirmar pedido--}} 
             <form class="my-3" method="POST" action="#">
                 @csrf
                <input type="submit" class="btn btn-warning w-100" value="Confirmar pedido"> 
            </form> 
                 {{--botão imprimir comandos--}} 
            <form class="my-3" method="POST" action="#">
                @csrf
               <input type="submit" class="btn btn-info w-100" value="Imprimir comandos"> 
            </form> 
                {{--botão cancelar pedido--}} 
            <form class="my-3" method="POST" action="#">
                @csrf
               <input type="submit" class="btn btn-danger w-100" value="Cancelar pedido"> 
            </form> 
                {{--botão finalizar pedido--}} 
            <form class="my-3" method="POST" action="#">
                @csrf
               <input type="submit" class="btn btn-success w-100" value="Finalizar pedido"> 
            </form> 
            </div>
        </div>
   </div>
  


            
















    <!-- Modal -->
    <div class="modal fade" id="destroyModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Remover recurso</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
            Deseja realmente remover este recurso?
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <form id="destroyForm" method="POST" action="">
                @csrf
                <input name="_method" type="hidden" value="DELETE">
                <input type="submit" class="btn btn-danger" value="Confirmar">
            </form>
            </div>
        </div>
        </div>
    </div>

    <script>
        const destroyButtons = document.querySelectorAll(".destroyButton");
        const destroyForm = document.querySelector("#destroyForm");
        destroyButtons.forEach(destroyButton => {
            destroyButton.addEventListener('click', configureAction);
        });
        function configureAction(){
            destroyForm.setAttribute('action', this.getAttribute('value'));
        }
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
    <script src={{ asset('js/pedido.js') }}></script>
</body>
</html>