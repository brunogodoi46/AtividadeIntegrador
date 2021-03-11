<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use App\Endereco;
use App\Pedido;
use Carbon\Carbon;

class EnderecoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = 1;
        //Buscar os dados que estão na tabela Enderecos
        $Enderecos = DB::select("SELECT enderecos.id,enderecos.bairro, enderecos.logradouro,
        enderecos.numero,enderecos.complemento,enderecos.users_id FROM enderecos join users on enderecos.users_id = users.id where users_id = :user_id", ['user_id'=> $user_id]);
        return view('Endereco.index')->with('Enderecos', $Enderecos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user_id = 2;
    //Buscar os dados que estão na tabela Enderecos
        $enderecos = DB::select("SELECT * FROM enderecos join users on enderecos.users_id = users.id where users_id = :user_id", ['user_id'=> $user_id]);
        return view('Endereco.create')->with('enderecos', $enderecos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
       $endereco = new Endereco();
       $endereco->bairro = $request->bairro;
       $endereco->logradouro = $request->logradouro;
       $endereco->numero = $request->numero;
       $endereco->complemento = $request->complemento;
       $endereco->Users_id = $request->Users_id;
       $endereco->save();

      //retornar a execução do método
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
       // buscar dados da tabela Enderecos
       $endereco = Endereco::find($id);
    
        return view('Endereco.show')->with('endereco', $endereco);

       
     //# TODO
        return 'Não encontrado';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $endereco = Endereco::find($id);
        if(isset($endereco))
         return view('Endereco.edit')->with('endereco', $endereco);
      //# TODO
         return 'Não encontrado';
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
        $endereco = Endereco::find($id);
        if(isset($endereco))
        {
            $endereco->bairro = $request->bairro;
            $endereco->logradouro = $request->logradouro;
            $endereco->numero = $request->numero;
            $endereco->complemento = $request->complemento;
            $endereco->Users_id = $request->Users_id;
            $endereco->update();

            //retornar a execução do método
            return $this->index();
                }
         
            //# TODO
            return 'Não encontrado';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $endereco = Endereco::find($id);
        if(isset($endereco)){
            $endereco->DELETE();
            //retornar a execução do método
            return $this->index();
        }

        return " Não encontrado";
    }
}
