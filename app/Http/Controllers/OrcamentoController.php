<?php

namespace App\Http\Controllers;

use App\Repositories\OrcamentoRepository;
use Illuminate\Http\Request;

class OrcamentoController extends Controller
{
    private $repository;

    public function __construct(OrcamentoRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        $orcamentos = $this->repository->all();
        return view('Pages.orcamentos.index')->with('orcamentos', $orcamentos);
    }
    public function create()
    {
        $dados = $this->repository->create();

        $produtos = $dados['produtos'];
        $clientes = $dados['clientes'];
        return view('Pages.orcamentos.create')->with('produtos', $produtos)->with('clientes', $clientes);
    }
}
