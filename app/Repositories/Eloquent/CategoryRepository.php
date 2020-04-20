<?php

namespace App\Repositories\Eloquent;

use App\Category;
use App\Repositories\CategoryRepositoryInterface;

class CategoryRepository extends AbstractRepository implements CategoryRepositoryInterface
{
    protected $model;
    protected $columns = ['id', 'name'];
    protected $products = ['products:product_id,name'];

    public function __construct(Category $category)
    {
        $this->model = $category;
    }

    public function getList(int $limit = null)
    {
        $categories = $this->model
            ->select($this->columns)
            ->with($this->products)
            ->limit($limit)
            ->get();

        foreach ($categories as $category) {
            $category->products->transform(function ($item) {
                return $item->makeHidden(['pivot']);
            });
        }

        return $categories->toJson();
    }

    public function getCategory(int $id)
    {
        $category = $this->model
            ->select($this->columns)
            ->where('id', $id)
            ->with($this->products)
            ->first();

        $category->products->transform(function ($item) {
            return $item->makeHidden(['pivot']);
        });

        return $category->toJson();
    }

    public function newCategory(array $data)
    {
        $category = $this->getNew($data);
        $category->save();
    }

    public function editCategory(array $data)
    {
        $category = $this->model->where('id', $data['id'])->first();
        $category->update($data);
    }
}
