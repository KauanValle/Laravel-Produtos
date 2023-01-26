<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProdutoModel extends Model
{
    const NOME = 'nome';
    const PRECO = 'preco';
    const DESCRICAO = 'descricao';
    const IMAGEM = 'imagem';
    const TABLE = 'produtos';

    protected $table = self::TABLE;

    protected $fillable = [
        self::NOME,
        self::PRECO,
        self::DESCRICAO,
        self::IMAGEM
    ];
}
