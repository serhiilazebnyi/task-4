<?php

namespace App\Repositories;

interface ProductRepositoryInterface
{
    /**
     * [getList description]
     * @param  [type] $limit      [description]
     * @param  [type] $categoryId [description]
     * @return [type]             [description]
     */
    public function getList(int $limit = null, int $categoryId = null);

    /**
     * [getById description]
     * @param  int    $id [description]
     * @return [type]     [description]
     */
    public function getProduct(int $id);

    public function newProduct(array $data);

    public function editProduct(array $data);
}
