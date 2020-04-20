<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\ProductRepositoryInterface;
use App\Repositories\CategoryRepositoryInterface;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    protected $category;
    protected $product;

    public function __construct(
        ProductRepositoryInterface $product,
        CategoryRepositoryInterface $category
    ) {
        $this->product = $product;
        $this->category = $category;
    }

    public function responseJson($json)
    {
        return response($json, 200)->header('Content-type', 'application/json');
    }

    public function index()
    {
        return view('api.form');
    }
}
