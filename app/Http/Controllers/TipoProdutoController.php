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
       $tipoProdutos = DB::select('select * from Tipo_Produtos');
        return view('TipoProduto.index')->with('tipoProdutos', $tipoProdutos);
    }

       /**
     *
     * @return \Illuminate\Http\Response
     */
    private function indexError($error)
    {   
       $tipoProdutos = DB::select('select * from Tipo_Produtos');
        return view('TipoProduto.index')->with('tipoProdutos', $tipoProdutos)->with('error', $error);
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
            $error['type'] = 'danger';
            $error['message'] = 'Problema ao salvar o recurso: ' . $th->getMessage();
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
        $tipoProduto = TipoProduto::find($id);
        if(isset($tipoProduto))
        return view('TipoProduto.show')->with('tipoProduto', $tipoProduto);
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
    {
        $tipoProduto = TipoProduto::find($id);
        if(isset($tipoProduto))
        return view('TipoProduto.edit')->with('tipoProduto', $tipoProduto);
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
        $tipoProduto = TipoProduto::find($id);
        if(isset($tipoProduto))
         {
            try{
                $tipoProduto->update();
            } catch(\Throwable $th) {
                $error['type'] = 'danger';
                $error['message'] = 'Problema ao atualizar o recurso: ' . $th->getMessage();
                return $this->indexError($error);        
            }

            $tipoProduto->descricao = $request->descricao;
            $tipoProduto->update();
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
        $tipoProduto = TipoProduto::find($id);
        if(isset($tipoProduto))
        {
        
            try{
                $tipoProduto->delete();
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
