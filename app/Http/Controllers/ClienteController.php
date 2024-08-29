<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index(Request $request)
    {
        $mensagemSucesso = $request->session()->get("mensagem.sucesso");
        $clientes = Cliente::paginate(10);
        return view('Pages.clientes.index')->with('clientes', $clientes)->with("mensagemSucesso", $mensagemSucesso);
    }

    public function store(Request $request)
    {
        $cliente = Cliente::create($request->all());
        return to_route('clientes.index')->with('mensagem.sucesso', "Cliente: {$cliente->nome} criado com sucesso!!");
    }

    public function update(Request $request, Cliente $cliente)
    {
        $cliente->fill($request->all());
        $cliente->save();
        return to_route('clientes.index')->with('mensagem.sucesso', "Cliente: {$cliente->nome} atualizado com sucesso!!");
    }

    public function destroy(Cliente $cliente)
    {
        $cliente->delete();
        return to_route('clientes.index')->with('mensagem.sucesso', "Cliente excluido com sucesso!!");
    }
}
