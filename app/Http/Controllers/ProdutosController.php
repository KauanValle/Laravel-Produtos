<?php

namespace App\Http\Controllers;

use App\Service\ProdutoService;
use Illuminate\Http\Request;

class ProdutosController extends Controller
{
    // TODO: Criar resource para padronização dos responses.

    public $service;

    public function __construct()
    {
        $this->service = new ProdutoService();
    }

    public function index()
    {
        return response()->json([
            'data'=> $this->service->pegarProdutos()
        ], 200);
    }

    public function store(Request $request)
    {
        $produto = $this->service->salvarProduto($request);
        if(!$produto['code'])
        {
            $produto['code'] = 200;
        }
        return response()->json([
            "data" => [
                "message" => $produto['message']
            ]
        ],  $produto['code']);
    }

    public function show($id)
    {
        $dados = $this->service->pegarProdutoById($id);
        $dados['message']->imagem = base64_encode($dados['message']->imagem);

        return response()->json([
            "data" => $dados['message']
        ], $dados['code']);
    }

    public function update(Request $request, $id)
    {
        $dados = $this->service->atualizarProduto($request, $id);
        return response()->json([
            "data" => [
                "message" => $dados['message']
            ]
        ], $dados['code']);
    }

    public function destroy($id)
    {
        $dados = $this->service->deletarProduto($id);

        return response()->json([
            "data" => [
                "message" => $dados['message']
            ]
        ], $dados['code']);
    }
}
