<?php

namespace App\Repositories;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaRepository
{
    private $model;

    public function __construct()
    {
        $this->model = new Categoria();
    }

    public function all()
    {
        $categorias = Categoria::where('status', 1)->paginate(10);
        return $categorias;
    }

    public function getInativos()
    {
        $categorias = Categoria::where('status', 0)->paginate(10);
        return $categorias;
    }

    public function create($request)
    {
        $categoria = Categoria::create($request->all());
        $mensagemSucesso = "Categoria: $categoria->nome criado com sucesso!";
        return $mensagemSucesso;
    }

    function update($request, $id)
    {
        $categoria = Categoria::find($id);
        $categoria->fill($request->all());
        $categoria->save();
        return $categoria;
    }

    function destroy($id)
    {
        $categoria = Categoria::find($id);
        $categoria->delete();
    }
}
