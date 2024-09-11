<?php

namespace App\Repositories;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteRepository
{
    private $model;

    public function __construct()
    {
        $this->model = new Cliente();
    }

    public function all()
    {
        $clientes = Cliente::paginate(10);
        return $clientes;
    }

    public function create($payload)
    {
        $cliente = Cliente::create($payload->all());

        return $cliente;
    }

    public function update($payload, $id)
    {
        $cliente = Cliente::find($id);
        $cliente->fill($payload->all());
        $cliente->save();
        return $cliente;
    }

    public function delete($id)
    {
        $cliente = Cliente::find($id);
        $cliente->delete();
    }

    public function filterCliente($payload)
    {
        $clientes = Cliente::query();
        $request = $payload->all();
        if (!empty($request['nome'])) {
            $clientes = $clientes->where('nome', 'LIKE', '%' . $request['nome'] . '%');
        }

        if (!empty($request['cpf'])) {
            $clientes = $clientes->where('cpf', 'LIKE', '%' . $request['cpf'] . '%');
        }

        if (!empty($request['telefone'])) {
            $clientes = $clientes->where('telefone', 'LIKE', '%' . $request['telefone'] . '%');
        }

        if (!empty($request['endereco'])) {
            $clientes = $clientes->where('endereco', 'LIKE', '%' . $request['endereco'] . '%');
        }


        if (!empty($request['email'])) {
            $clientes = $clientes->where('email', 'LIKE', '%' . $request['email'] . '%');
        }

        $clientes = $clientes->paginate(10)->appends($payload->except('page'));

        $mensagemSucesso = "Clientes filtrados com sucesso!";
        $dados = array(
            "clientes" => $clientes,
            "mensagemSucesso" => $mensagemSucesso
        );
        return $dados;
    }
}
