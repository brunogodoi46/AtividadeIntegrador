<?php

namespace App\Http\Controllers;

use DB;
use App\TipoProduto;
use App\Produto;
use App\Pedido;
use App\Endereco;
use Illuminate\Http\Request;
use App\PedidoProduto;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB as FacadesDB;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //#TODO selecionar id de usuário com base no que esta logado.
        $user_id = 1;
       //Buscar os dados que estão na tabela Pedidos
        $pedidos = Pedido::where('Users_id', $user_id)->orderBy('Pedidos.id','DESC')->get();
        //Buscar os dados que estão na tabela Tipo_produtos
        $tipoProdutos = TipoProduto::all();
        // Buscar os produtos do primeiro tipo encontrado
        $produtos = [];
        if(!$tipoProdutos->isEmpty()){
            $firstTipoProduto = $tipoProdutos->first();
        //Buscar o produto com determinado id
        $produtos = Produto::where('Tipo_Produtos_id', $firstTipoProduto->id)->get();
        }
         //Buscar os endereços do usuário logado
         $enderecos = DB::select("SELECT * from Enderecos where Users_id = ? ", [$user_id]);
         //Buscar os produtos dentro de um determinado produto
         $produtosPedido = [];
         $totalPedido = 0;
         $estado = "";
         if(!$pedidos->isEmpty()){
            $ultimoPedidoRealizado = $pedidos->first();
            $produtosPedido = DB::select("SELECT Pedido_Produtos.Pedidos_id,Pedido_Produtos.Produtos_id,Pedido_Produtos.quantidade, Produtos.nome, Tipo_Produtos.descricao from Pedido_Produtos
                                        join Produtos on Pedido_Produtos.Produtos_id = Produtos.id
                                        join Tipo_Produtos on Produtos.Tipo_produtos_id = Tipo_Produtos.id
                                        where Pedido_Produtos.Pedidos_id = ?" , [$ultimoPedidoRealizado->id]);
                

                //calcula o total de R$ do pedido
            if(!empty($produtosPedido)){
                $totalPedido = DB::select("SELECT sum(Pedido_Produtos.quantidade * Produtos.preco) as total_pedido from Pedido_Produtos
                                            join Produtos on Pedido_Produtos.Produtos_id = Produtos.id
                                            where Pedido_Produtos.Pedidos_id = ?",[$ultimoPedidoRealizado->id])[0];
                    $totalPedido = $totalPedido->total_pedido;
                                        }

            //verifica o estado do pedido e envia para view
            switch ($ultimoPedidoRealizado->status) {
                case 'R':
                    $estado = "Recebido";
                    break;
                case 'C':
                    $estado = "Cancelado";
                    break;
                case 'P':
                    $estado = "Promoção";
                    break;
                case 'E':
                    $estado = "Enviado";
                    break;
                case 'A':
                    $estado = "Aberto";
                    break;
            }
         }
        return view('Pedido.index')->with('pedidos', $pedidos)->with('tipoProdutos', $tipoProdutos)
        ->with('produtos', $produtos)->with('enderecos', $enderecos)->with('produtosPedido', $produtosPedido)->with('totalPedido', $totalPedido)->with('estado', $estado);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request  $request, $endereco_id)
    {
        // pegue o id do usuário
        $user_id = 1;
        // Verificar se o conteúdo da variável $endereco_id é nulo ( se á variável foi definida)
        if(isset($endereco_id) && $endereco_id != 'null'){
            $endereco = Endereco::find($endereco_id);
            // Verifico se foi encontrado algo e se não foi encontrado pertence ao usuário logado
            if($endereco && $endereco->Users_id == $user_id)
            {
                $pedido = new Pedido();
                $pedido->dataEHora = Carbon::now()->toDateTimeString();
                $pedido->status = "A";
                $pedido->Users_id = $user_id;
                $pedido->Enderecos_id = $endereco_id;
                try {
                    $pedido->save();
                } catch (\Throwable $th) {
                    $response['success'] = false;
                    $response['message'] = "Erro ao salvar Pedido";
                    $response['return'] = [];
                    return response()->json($response, 507);  
                }
                

                $pedidos = Pedido::where('Users_id', $user_id)->orderBy('id','DESC')->get();

                $response['success'] = true;
                $response['message'] = "Pedido criado com sucesso.";
                $response['return'] = $pedidos;
                return response()->json($response, 201);              
            }   
                $response['success'] = false;
                $response['message'] = "Endereço não pertence o usuãrio";
                $response['return'] = [];
                return response()->json($response, 403);                       
           }   
                $pedido = new Pedido();
                $pedido->dataEHora = Carbon::now()->toDateTimeString();
                $pedido->status = "A";
                $pedido->Users_id = $user_id;
                $pedido->Enderecos_id = null;
                try {
                    $pedido->save();
                } catch (\Throwable $th) {
                    $response['success'] = false;
                    $response['message'] = "Erro ao salvar Pedido";
                    $response['return'] = [];
                    return response()->json($response, 507);   
                }

                $pedidos = Pedido::where('Users_id', $user_id)->orderBy('id','DESC')->get();

                $response['success'] = true;
                $response['message'] = "Pedido criado com sucesso.";
                $response['return'] = $pedidos;
                return response()->json($response, 201);     
        }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
