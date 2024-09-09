<?php

namespace App\Repositories;

use App\Models\Categoria;
use App\Models\Produto;
use Illuminate\Http\Request;


class ProdutoRepository
{
    private $model;

    public function __construct()
    {
        $this->model = new Produto();
    }

    public function all(){
        $categorias = Categoria::all();
        $produtos = Produto::paginate(10);
        $dados = array(
            'produtos' => $produtos,
            'categorias' => $categorias
        );
        return $dados;
    }
    public function create(array $payload)
    {
        return Produto::create($payload);;
    }

    public function update(array $payload, $id){
        $produto = Produto::find($id);
        $produto->fill($payload);
        $produto->save();
        return $produto;
    }

    public function delete($id){
        $produto = Produto::find($id);
        $produto->delete();
    }

    public function filterProducts($payload){
        $produtos = Produto::query();
        $request = $payload->all();
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

        if (!empty($request['categoria'])) {
            $produtos = $produtos->where('categoria_id', $request['categoria']);
        }

        $produtos = $produtos->paginate(10)->appends($payload->except('page'));
        $mensagemSucesso = "Produtos filtrados com sucesso!";
        $dados = array(
            "produtos"=>$produtos,
            "mensagemSucesso"=>$mensagemSucesso
        );
        return $dados;
    }

}
