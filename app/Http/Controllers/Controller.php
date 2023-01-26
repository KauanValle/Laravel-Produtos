<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

/**
 * @OA\Info(title="API Produtos - Quest", version="0.1")
 *
 * @OA\Get(
 *     path="/api/produtos",
 *     description="Rota de consulta dos dados",
 *     @OA\Response(response="200", description="Retorno com sucesso!")
 * )
 *  * @OA\Get(
 *     path="/api/produtos/{id}",
 *     description="Rota de consulta para um produto especifico",
 *     @OA\Response(response="200", description="Retorno com sucesso!")
 * )
 *
 *  * @OA\Post(
 *     path="/api/produtos",
 *     description="Rota de cadastro do produto",
 *     @OA\Parameter(
 *          name="nome",
 *          in="path",
 *          required=true,
 *     ),
 *     @OA\Parameter(
 *          name="preco",
 *          in="path",
 *          required=true,
 *     ),
 *      @OA\Parameter(
 *          name="descricao",
 *          in="path",
 *          required=true,
 *     ),
 *     @OA\Parameter(
 *          name="imagem",
 *          in="path",
 *          required=true,
 *     ),
 *     @OA\Response(response="200", description="Retorno com sucesso!")
 * )
 */
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
