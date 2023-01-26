<?php

namespace App\Repository;

use App\ProdutoModel;

class ProdutoRepository
{
    public $model;

    public function __construct()
    {
        $this->model = new ProdutoModel();
    }

    public function save($produto)
    {
        $this->model->fill($produto);
        return $this->model->save();
    }

    public function getAll()
    {
        return $this->model->newQuery()->orderBy('nome')->get();
    }

    public function getById($id)
    {
        return $this->model->newQuery()->find($id);
    }

    public function delete($id)
    {
        $produto = $this->getById($id);
        if(!empty($produto))
        {
            $produto->delete();
            return true;
        }
        return false;
    }

    public function atualizar($request)
    {
        return $request->save();
    }
}
