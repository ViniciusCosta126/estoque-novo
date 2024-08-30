<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index()
    {
        $categorias = Categoria::paginate(10);
        return view('Pages.categorias.index')->with("categorias", $categorias);
    }
}
