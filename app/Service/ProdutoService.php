<?php

namespace App\Service;

use App\Http\Validator\ProdutoValidator;
use App\Repository\ProdutoRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\MessageBag;

class ProdutoService
{
    public $repo;

    public function __construct()
    {
        $this->repo = new ProdutoRepository();
    }

    public function salvarProduto(Request $request)
    {
        $dadosValidados = ProdutoValidator::validate($request);
        if($dadosValidados instanceof MessageBag)
        {
            return [
                'message' => $dadosValidados,
                'code' => 401
            ];
        }
        $this->saveFile($request->imagem);

        if($this->repo->save($request->toArray()))
        {
            $dados['message'] = "Produto cadastrado com sucesso!";
            $dados['code'] = 201;
        }else
        {
            $dados['message'] = "Houve algum erro ao cadastrar o produto!";
            $dados['code'] = 400;
        }

        return $dados;
    }

    public function pegarProdutos()
    {
        return $this->repo->getAll();
    }

    public function pegarProdutoById($id)
    {
        return [
            'message' => $this->repo->getById($id),
            'code' => 200
        ];
    }

    public function deletarProduto($id)
    {
        if($this->repo->delete($id)) {
            $dados['message'] = "Produto deletado com sucesso!";
            $dados['code'] = 200;
        }else
        {
            $dados['message'] = "Houve algum erro ao deletar o produto!";
            $dados['code'] = 400;
        }
        return $dados;
    }

    public function atualizarProduto($request, $id)
    {
        $antigo = $this->repo->getById($id);
        $antigo->nome = $request->nome;
        $antigo->preco = $request->preco;
        $antigo->descricao = $request->descricao;
        $antigo->imagem = $request->imagem;

        if($this->repo->atualizar($antigo))
        {
            $dados['message'] = "Produto atualizado com sucesso!";
            $dados['code'] = 200;
        }else{
            $dados['message'] = "Houve algum erro ao atualizar o produto!";
            $dados['code'] = 400;
        }

        return $dados;
    }

    public function saveFile($base64)
    {
        $extensao = explode('/', $base64);
        $extensao = explode(';', $extensao[1]);
        $extensao = '.'.$extensao[0];

        $nome = time().$extensao;

        $separatorFile = explode(',', $base64);
        $arquivo = $separatorFile[1];
        $pathUpload = 'public/base64-files/';

        Storage::put($pathUpload.$nome, base64_decode($arquivo));
    }
}
