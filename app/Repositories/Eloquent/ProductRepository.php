<?php

namespace App\Repositories\Eloquent;

use App\Product;
use App\Repositories\ProductRepositoryInterface;

class ProductRepository extends AbstractRepository implements ProductRepositoryInterface
{
    protected $model;
    protected $columns = ['id', 'name'];
    protected $categories = ['categories:category_id,name'];

    public function __construct(Product $product)
    {
        $this->model = $product;
    }

    public function getList(int $limit = null, int $categoryId = null)
    {
        $products = $this->model
            ->select($this->columns)
            ->with($this->categories)
            ->limit($limit)
            ->get();

        foreach ($products as $product) {
            $product->categories->transfrom(function ($item){
                return $item->makeHidden(['pivot']);
            });
        }

        return $products->toJson();
    }

    public function getProduct(int $id)
    {
        $product = $this->model
            ->select($this->columns)
            ->where('id', $id)
            ->with($this->categories)
            ->get();

        $product->categories->transfrom(function ($item){
            return $item->makeHidden(['pivot']);
        });
        
        return $product->toJson();
    }

    public function newProduct(array $data)
    {
        $product = $this->getNew($data);
        $product->save();
    }

    public function editProduct(array $data)
    {
        $product = $this->model->where('id', $data['id'])->first();
        $product->update($data);

        $product->categories()->sync($data['categories']);
    }
}
