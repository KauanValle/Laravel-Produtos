<?php
namespace App\Http\Validator;

use App\Exceptions\ValidateException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;


class ProdutoValidator
{
    public static function roles()
    {
        return [
            'nome' => 'required',
            'preco' => 'required',
            'descricao' => 'required',
            'imagem' => 'required'
        ];
    }

    public static function messages()
    {
        return [
            'nome.required' => 'Informe o nome do produto!',
            'preco.required' => 'Informe o preço do produto!',
            'descricao.required' => 'Informe a descrição do produto!',
            'imagem.required' => 'Informe a imagem do produto!'
        ];
    }

    public static function validate($request)
    {
        $dadosValidados = Validator::make($request->all(), self::roles(), self::messages());
        if($dadosValidados->fails())
        {
            return $dadosValidados->errors();
        }
        return $dadosValidados;
    }
}
