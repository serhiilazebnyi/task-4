<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\ProductRepositoryInterface;
use Illuminate\Http\Request;

class ProductController extends BaseController
{
    protected $product;

    public function __construct(ProductRepositoryInterface $product)
    {
        $this->product = $product;
    }

    public function getList(Request $request)
    {
        $limit = $request->limit;
        $categoryId = $request->categoryId;

        $products = $this->product->getList($limit, $categoryId);
        return $this->responseJson($products);
    }

    public function getProduct($id)
    {
        $product = $this->product->getProduct($id);
        return $this->responseJson($product);
    }

    public function newProduct(Request $request)
    {
        $data = json_decode($request->data, true);
        $this->product->newProduct($data);
    }

    public function editProduct(Request $request)
    {
        $data = json_decode($request->data, true);
        $this->product->editProduct($data);
    }
}
