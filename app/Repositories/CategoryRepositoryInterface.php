<?php

namespace App\Repositories;

interface CategoryRepositoryInterface
{
    /**
     * [getList description]
     * @param  [type] $limit [description]
     * @return [type]        [description]
     */
    public function getList(int $limit = null);

    /**
     * [getCategory description]
     * @param  int    $id [description]
     * @return [type]     [description]
     */
    public function getCategory(int $id);

    public function newCategory(array $data);

    public function editCategory(array $data);
}
