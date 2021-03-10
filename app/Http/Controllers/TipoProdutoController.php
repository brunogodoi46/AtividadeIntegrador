<?php

namespace App\Http\Controllers;

use App\TipoProduto;
use Illuminate\Http\Request;
use DB;
use PhpParser\Node\Stmt\TryCatch;

class TipoProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        return $this->indexMessage(null);
    }

       /**
     *
     * @return \Illuminate\Http\Response
     */
    private function indexMessage($message)
    {   
       $tipoProdutos = DB::select('SELECT * from Tipo_Produtos');
        return view('TipoProduto.index')->with('tipoProdutos', $tipoProdutos)->with('message', $message);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('TipoProduto.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $TipoProduto = new TipoProduto();
        $TipoProduto->descricao = $request->descricao;
        try{
            $TipoProduto->save();
        } catch(\Throwable $th) {
            $message['type'] = 'danger';
            $message['message'] = 'Problema ao salvar o recurso: ' . $th->getMessage();
            return $this->indexMessage($message);        
        }

        $message['type'] = 'success';
        $message['message'] = 'Recurso cadastrado com sucesso';
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
        $tipoProduto = TipoProduto::find($id);
        if(isset($tipoProduto))
        return view('TipoProduto.show')->with('tipoProduto', $tipoProduto);
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
    {
        $tipoProduto = TipoProduto::find($id);
        if(isset($tipoProduto))
        return view('TipoProduto.edit')->with('tipoProduto', $tipoProduto);
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
        $tipoProduto = TipoProduto::find($id);
        if(isset($tipoProduto))
         {
            $tipoProduto->descricao = $request->descricao;

            try{
                $tipoProduto->update();
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
        $tipoProduto = TipoProduto::find($id);
        if(isset($tipoProduto))
        {
        
            try{
                $tipoProduto->delete();
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
