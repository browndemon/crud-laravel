<?php
namespace App\Http\Controllers;

use App\Cliente;
use Illuminate\Http\Request;
use Redirect;

class ClientesController extends Controller
{
    public function index(){

        $clientes = Cliente::get();

        return view('clientes.lista', ['clientes' => $clientes]);
    }

    public function new_client(){

        return view('clientes.form');
    }

    public function addclient(Request $request){
        $cliente = new Cliente();

        $cliente->create($request->all());

       \Session::flash('mensagem_sucesso', 'Cliente cadastrado com sucesso');

       return Redirect::to('/clientes/new');
    }

    public function editar($id){

        $cliente = Cliente::findOrFail($id);

        return view('clientes.form', ['cliente' => $cliente]);
    }

    public function update($id, Request $request){

        $cliente = Cliente::findOrFail($id);

        $cliente->update($request->all());

        \Session::flash('mensagem_sucesso', 'Cliente Atualizado com sucesso');

        return Redirect::to('/clientes/'.$cliente->id.'/editar');
    }

    public function delete($id){
        $cliente = Cliente::findOrFail($id);

        $cliente->delete();

        \Session::flash('mensagem_sucesso', 'Cliente Deletado com sucesso');

        return Redirect::to('/clientes');
    }

}
