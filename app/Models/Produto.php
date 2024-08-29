<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'descricao',
        'preco',
        'preco_custo',
        'qtd_estoque',
        'qtd_minima',
        'categoria_id'
    ];

    // Relacionamento de Produto com Categoria (muitos para um)
    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
}
