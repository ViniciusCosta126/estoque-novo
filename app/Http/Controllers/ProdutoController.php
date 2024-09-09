<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Produto;
use App\Repositories\ProdutoRepository;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public $repository;

    public function __construct(ProdutoRepository $repository)
    {
        $this->repository = $repository;
    }
    public function index(Request $request)
    {
        $dados = $this->repository->all();
        $categorias = $dados['categorias'];

        $mensagemSucesso = '';
        if ($request->session()->has("mensagem.sucesso")) {
            $mensagemSucesso = $request->session()->get("mensagem.sucesso");
        }

        if (session()->has('produtos')) {
            $produtos = $request->session()->get('produtos');
            return view('pages.produtos.index')->with("mensagemSucesso", $mensagemSucesso)->with('produtos', $produtos)->with("categorias", $categorias);
        }

        $produtos = $dados['produtos'];
        return view('pages.produtos.index')->with("mensagemSucesso", $mensagemSucesso)->with('produtos', $produtos)->with("categorias", $categorias);
    }

    public function createProduct()
    {
        $categorias = [];
        return view('pages.produtos.create')->with('categorias', $categorias);
    }

    public function store(Request $request)
    {
        $produto = $this->repository->create($request->all());
        return to_route('produtos.index')->with('mensagem.sucesso', "Produto: $produto->nome criado com sucesso!!");
    }

    public function update(Request $request, $id)
    {
        $produto = $this->repository->update($request->all(), $id);
        return to_route('produtos.index')->with('mensagem.sucesso', "Produto {$produto->nome} alterado com sucesso!");
    }

    public function destroy($id)
    {
        $this->repository->delete($id);
        return to_route("produtos.index")->with("mensagem.sucesso", "Produto excluido com sucesso!");
    }

    public function filterProducts(Request $request)
    {
        $dados = $this->repository->filterProducts($request);
        $produtos = $dados['produtos'];
        $mensagemSucesso = $dados['mensagemSucesso'];

        return to_route('produtos.index')->with('mensagem.sucesso', $mensagemSucesso)->with('produtos', $produtos);
    }
}
