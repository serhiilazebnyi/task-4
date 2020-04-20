<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\CategoryRepositoryInterface;
use Illuminate\Http\Request;

class CategoryController extends BaseController
{
    protected $category;

    public function __construct(CategoryRepositoryInterface $category)
    {
        $this->category = $category;
    }

    public function getList(Request $request)
    {
        $limit = $request->limit;

        $categories = $this->category->getList($limit);
        return $this->responseJson($categories);
    }

    public function getCategory($id)
    {
        $category = $this->category->getCategory($id);
        return $this->responseJson($category);
    }

    public function newCategory(Request $request)
    {
        $data = json_decode($request->data, true);
        $this->category->newCategory($data);
    }

    public function editCategory(Request $request)
    {
        $data = json_decode($request->data, true);
        $this->category->editCategory($data);
    }
}
