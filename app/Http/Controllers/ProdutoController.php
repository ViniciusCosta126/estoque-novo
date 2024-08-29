<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function index(Request $request)
    {
        $categorias = Categoria::all();
        $mensagemSucesso = $request->session()->get("mensagem.sucesso");
        $produtos = Produto::paginate(10);
        return view('pages.produtos.index')->with("mensagemSucesso", $mensagemSucesso)->with('produtos', $produtos)->with("categorias", $categorias);
    }

    public function store(Request $request)
    {
        $produto = Produto::create($request->all());
        return to_route('produtos.index')->with('mensagem.sucesso', "Produto {$produto->nome} criado com sucesso!!");
    }

    public function update(Request $request, $id)
    {
        $produto = Produto::find($id);
        $produto->fill($request->all());
        $produto->save();
        return to_route('produtos.index')->with('mensagem.sucesso', "Produto {$produto->nome} alterado com sucesso!");
    }

    public function destroy($id)
    {
        $produto = Produto::find($id);
        $produto->delete();
        return to_route("produtos.index")->with("mensagem.sucesso", "Produto excluido com sucesso!");
    }
}
