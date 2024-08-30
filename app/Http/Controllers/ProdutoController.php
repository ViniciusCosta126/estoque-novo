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

    public function filterProducts(Request $request)
    {
        $produtos = Produto::query();

        if (!empty($request->preco_max) && !empty($request->preco_min)) {
            $produtos = $produtos->whereBetween('preco', [$request->preco_min, $request->preco_max]);
        }
        if (!empty($request->preco_min) && empty($request->preco_max)) {
            $produtos = $produtos->where('preco', '>=', $request->preco_min);
        }
        if (empty($request->preco_min) && !empty($request->preco_max)) {
            $produtos = $produtos->where('preco', '<=', $request->preco_max);
        }

        if (!empty($request->preco_custo_max) && !empty($request->preco_custo_min)) {
            $produtos = $produtos->whereBetween('preco_custo', [$request->preco_custo_min, $request->preco_custo_max]);
        }
        if (!empty($request->preco_custo_min) && empty($request->preco_custo_max)) {
            $produtos = $produtos->where('preco_custo', '>=', $request->preco_custo_min);
        }
        if (empty($request->preco_custo_min) && !empty($request->preco_custo_max)) {
            $produtos = $produtos->where('preco_custo', '<=', $request->preco_custo_max);
        }

        if (!empty($request->categoria)) {
            $produtos = $produtos->where('categoria_id', $request->categoria);
        }
        if (!empty($request->categoria)) {
            $produtos->where('categoria_id', $request->categoria);
        }
        $produtos = $produtos->paginate(10)->appends($request->except('page'));
        $categorias = Categoria::all();
        $mensagemSucesso = "Produtos filtrados com sucesso!";

        return view('pages.produtos.index')
            ->with('mensagemSucesso', $mensagemSucesso)
            ->with('produtos', $produtos)
            ->with('categorias', $categorias);
    }
}
