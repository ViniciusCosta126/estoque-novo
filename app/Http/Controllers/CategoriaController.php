<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Repositories\CategoriaRepository;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{

    private $repository;
    public function __construct(CategoriaRepository $repository)
    {
        $this->repository = $repository;
    }
    public function index(Request $request)
    {
        $categorias = $this->repository->all();
        if ($request->session()->has('mensagem.sucesso')) {
            $mensagemSucesso = $request->session()->get("mensagem.sucesso");
            return view('Pages.categorias.index')->with("categorias", $categorias)->with('mensagemSucesso', $mensagemSucesso);
        }

        return view('Pages.categorias.index')->with("categorias", $categorias);
    }

    public function getInativos()
    {
        $categorias = $this->repository->getInativos();
        return view('Pages.categorias.inativos')->with("categorias", $categorias);
    }
    public function store(Request $request)
    {
        $categoria = $this->repository->create($request);
        return to_route('categorias.index')->with('mensagem.sucesso', $categoria);
    }

    public function update(Request $request, $id)
    {
        $this->repository->update($request, $id);
        return to_route('categorias.index')->with("mensagem.sucesso", "Categoria atualizada com sucesso!");
    }
    public function destroy($id)
    {
        $this->repository->destroy($id);
        return to_route('categorias.index')->with("mensagem.sucesso", "Categoria excluida com sucesso!");
    }
}
