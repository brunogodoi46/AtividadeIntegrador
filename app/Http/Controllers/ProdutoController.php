<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Produto;
use App\TipoProduto;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        {   
             
            return $this->indexMessage(null);
         }
     
    }
    private function indexMessage($message)
    {
    {      //Buscar os dados que estão na tabela Proddutos

            $Produtos = DB::select("select Produtos.id, Produtos.nome, Produtos.preco,
             Tipo_Produtos.descricao from Produtos join Tipo_Produtos on Produtos.Tipo_Produtos_id = Tipo_Produtos.id");
             
            return view('Produto.index')->with('Produtos', $Produtos)->with('message', $message);
         }
     
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipoProdutos = DB::select('select * from Tipo_Produtos');
        return view('Produto.create')->with('tipoProdutos', $tipoProdutos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $Produto = new Produto();
        $Produto->nome = $request->nome;
        $Produto->preco = $request->preco;
        $Produto->Tipo_Produtos_id = $request->Tipo_Produtos_id;

        try{
            $Produto->save();
        } catch(\Throwable $th) {
            $message['type'] = 'danger';
            $message['message'] = 'Problema ao salvar o recurso: ' . $th->getMessage();
            return $this->indexMessage($message);        
        }
        
       
        $message['type'] = 'success';
        $message['message'] = 'Recurso salvo com sucesso';
        return $this->indexMessage($message);     
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $produto = Produto::find($id);
        if(isset($produto))
        {     
        $tipoProduto = TipoProduto::find($produto->Tipo_Produtos_id);
        return view('Produto.show')->with('produto', $produto)->with('tipoProduto', $tipoProduto);
         }
        
         $message['type'] = 'danger';
         $message['message'] = 'Recurso não encontrado';
         return $this->indexMessage($message); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   $produto = Produto::find($id);
        if(isset($produto))
        {
        $tipoProdutos = DB::select('select * from Tipo_Produtos');
        return view('Produto.edit')->with('produto', $produto)->with('tipoProdutos', $tipoProdutos);
        }
        $message['type'] = 'danger';
        $message['message'] = 'Recurso não encontrado';
        return $this->indexMessage($message); 
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
        $produto = Produto::find($id);
        if(isset($produto))

        $produto->nome = $request->nome;
        $produto->preco = $request->preco;
        $produto->Tipo_Produtos_id = $request->Tipo_Produtos_id;
        {
            try{
                $produto->update();
            } catch(\Throwable $th) {
                $message['type'] = 'danger';
                $message['message'] = 'Problema ao atualizar o recurso: ' . $th->getMessage();
                return $this->indexMessage($message);        
            }


            $message['type'] = 'success';
            $message['message'] = 'Recurso atualizado com sucesso';
            return $this->indexMessage($message); 
        
        }
       
        $message['type'] = 'danger';
        $message['message'] = 'Recurso não encontrado';
        return $this->indexMessage($message); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $produto = Produto::find($id);
        if(isset($produto))
        {

            
            try{
                $produto->delete();
            } catch(\Throwable $th) {
                $message['type'] = 'danger';
                $message['message'] = 'Problema ao remover o recurso: ' . $th->getMessage();
                return $this->indexMessage($message);        
            }
            
            $message['type'] = 'success';
            $message['message'] = 'Recurso removido com sucesso';
            return $this->indexMessage($message); 
        
        }
        $message['type'] = 'danger';
        $message['message'] = 'Recurso não encontrado';
        return $this->indexMessage($message); 
    }
}
