<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function index(Request $request)
    {
        $mensagemSucesso = $request->session()->get("mensagem.sucesso");
        $produtos = Produto::paginate(10);
        return view('pages.produtos.index')->with("mensagemSucesso", $mensagemSucesso)->with('produtos', $produtos);
    }

    public function create()
    {
        return view('pages.produtos.create');
    }

    public function store(Request $request)
    {
        $produto = Produto::create($request->all());
        return to_route('produtos.index')->with('mensagem.sucesso', "Produto {$produto->nome} criado com sucesso!!");
    }

    public function update(Request $request, Produto $produto)
    {
        $produto->fill($request->all());
        $produto->save();
        return to_route('produtos.index')->with('mensagem.sucesso', "Produto {$produto->nome} alterado com sucesso!");
    }

    public function destroy(Produto $produto)
    {
        $produto->delete();
        return to_route("produtos.index")->with("mensagem.sucesso", "Produto excluido com sucesso!");
    }
}
