<?php

namespace App\Repositories;

use App\Models\Cliente;
use App\Models\Orcamento;
use App\Models\Produto;
use Illuminate\Http\Request;

class OrcamentoRepository
{
    private $model;

    public function __construct()
    {
        $this->model = new Orcamento();
    }

    public function all()
    {
        $orcamentos = Orcamento::paginate(10);
        return $orcamentos;
    }

    public function create()
    {
        $produtos = Produto::all();
        $clientes = Cliente::all();

        $dados = array(
            'produtos' => $produtos,
            'clientes' => $clientes
        );
        return $dados;
    }
}
