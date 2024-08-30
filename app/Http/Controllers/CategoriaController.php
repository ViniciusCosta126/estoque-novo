<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index(Request $request)
    {
        $mensagemSucesso = $request->session()->get("mensagem.sucesso");
        $categorias = Categoria::paginate(10);
        return view('Pages.categorias.index')->with("categorias", $categorias)->with('mensagemSucesso', $mensagemSucesso);
    }

    public function store(Request $request)
    {
        $categoria = Categoria::create($request->all());
        return to_route('categorias.index')->with('mensagem.sucesso', "Categoria: $categoria->nome criado com sucesso!");
    }

    public function update(Request $request, $id)
    {
        $categoria = Categoria::find($id);
        $categoria->fill($request->all());
        $categoria->save();
        return to_route('categorias.index')->with("mensagem.sucesso", "Categoria atualizada com sucesso!");
    }
    public function destroy($id)
    {
        $categoria = Categoria::find($id);
        $categoria->delete();
        return to_route('categorias.index')->with("mensagem.sucesso", "Categoria excluida com sucesso!");
    }
}
