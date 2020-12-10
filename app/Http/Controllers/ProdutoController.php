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
            $Produtos = DB::select("select Produtos.id, Produtos.nome, Produtos.preco, Tipo_Produtos.descricao from Produtos join Tipo_Produtos on Produtos.Tipo_Produtos_id = Tipo_Produtos.id");
             
            return view('Produto.index')->with('Produtos', $Produtos);
         }
     
    }
    public function indexError($error)
    {
        {   
            $Produtos = DB::select("select Produtos.id, Produtos.nome, Produtos.preco, Tipo_Produtos.descricao from Produtos join Tipo_Produtos on Produtos.Tipo_Produtos_id = Tipo_Produtos.id");
             
            return view('Produto.index')->with('Produtos', $Produtos)->with('error', $error);
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
        $Produto->save();


        try{
            $Produto->store();
        } catch(\Throwable $th) {
            $error['type'] = 'danger';
            $error['message'] = 'Problema ao salvaar o recurso: ' . $th->getMessage();
            return $this->indexError($error);        
        }
        
       
        return $this->index(); 
    
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
        
         $error['type'] = 'danger';
         $error['message'] = 'Recurso não encontrado';
         return $this->indexError($error); 
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
        $error['type'] = 'danger';
        $error['message'] = 'Recurso não encontrado';
        return $this->indexError($error); 
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
        {
            try{
                $produto->update();
            } catch(\Throwable $th) {
                $error['type'] = 'danger';
                $error['message'] = 'Problema ao atualizar o recurso: ' . $th->getMessage();
                return $this->indexError($error);        
            }

        $produto->nome = $request->nome;
        $produto->preco = $request->preco;
        $produto->Tipo_Produtos_id = $request->Tipo_Produtos_id;
        $produto->update();
        $produto->save();
        return $this->index(); 
        }
       
        $error['type'] = 'danger';
        $error['message'] = 'Recurso não encontrado';
        return $this->indexError($error); 
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
                $error['type'] = 'danger';
                $error['message'] = 'Problema ao remover o recurso: ' . $th->getMessage();
                return $this->indexError($error);        
            }
            
            return $this->index();
        }
        $error['type'] = 'danger';
        $error['message'] = 'Recurso não encontrado';
        return $this->indexError($error); 
    }
}
