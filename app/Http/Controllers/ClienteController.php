<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Repositories\ClienteRepository;
use Illuminate\Http\Request;

class ClienteController extends Controller
{

    private $repository;

    public function __construct(ClienteRepository $repository)
    {
        $this->repository = $repository;
    }
    public function index(Request $request)
    {
        if ($request->session()->has('clientes') && $request->session()->has("mensagem.sucesso")) {
            $mensagemSucesso = $request->session()->get("mensagem.sucesso");
            $clientes = $request->session()->get('clientes');
            return view('pages.clientes.index')->with("mensagemSucesso", $mensagemSucesso)->with('clientes', $clientes);
        }

        $clientes = $this->repository->all();

        if ($request->session()->has("mensagem.sucesso")) {
            $mensagemSucesso = $request->session()->get("mensagem.sucesso");
            return view('Pages.clientes.index')->with('clientes', $clientes)->with("mensagemSucesso", $mensagemSucesso);
        }


        return view('Pages.clientes.index')->with('clientes', $clientes);
    }
    public function createCliente()
    {
        return view('Pages.clientes.create');
    }

    public function store(Request $request)
    {
        $cliente = $this->repository->create($request);
        return to_route('clientes.index')->with('mensagem.sucesso', "Cliente: {$cliente->nome} criado com sucesso!!");
    }

    public function update(Request $request,  $id)
    {
        $cliente = $this->repository->update($request, $id);
        return to_route('clientes.index')->with('mensagem.sucesso', "Cliente: {$cliente->nome} atualizado com sucesso!!");
    }

    public function destroy($id)
    {
        $this->repository->delete($id);
        return to_route('clientes.index')->with('mensagem.sucesso', "Cliente excluido com sucesso!!");
    }

    public function filterCliente(Request $request)
    {
        $dados = $this->repository->filterCliente($request);
        $clientes = $dados['clientes'];
        $mensagemSucesso = $dados['mensagemSucesso'];

        return to_route('clientes.index')->with('mensagem.sucesso', $mensagemSucesso)->with('clientes', $clientes);
    }
}
