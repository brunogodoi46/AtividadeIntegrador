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
        //Buscar os dados que estão na tabela Enderecos
        $Enderecos = DB::select("SELECT enderecos.id, users.id, enderecos.bairro, enderecos.logradouro,
        enderecos.numero,enderecos.complemento FROM enderecos  join users where enderecos.id = users.id");
        return view('Endereco.index')->with('Enderecos', $Enderecos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    //Buscar os dados que estão na tabela Enderecos
        $Enderecos = DB::select("SELECT * from enderecos");
        return view('Endereco.create')->with('Enderecos', $Enderecos);
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

       //Buscar os dados que estão na tabela Enderecos
        $Enderecos = DB::select("SELECT * from enderecos");
        return view('Endereco.create')->with('Enderecos', $Enderecos);
       
       

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
