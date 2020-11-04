<?php
/**
 * @author Author Name: Md Morshadun Nur
 * @email  Email: morshadunnur@gmail.com
 */

namespace App\Repositories;


use App\Contracts\ProductRepositoryInterface;
use App\Models\Product;
use Illuminate\Support\Str;

class ProductRepository implements ProductRepositoryInterface
{
    /**
     * @var Product
     */
    private $model;

    /**
     * ProductRepository constructor.
     * @param Product $model
     */
    public function __construct(Product $model)
    {

        $this->model = $model;
    }

    public function get()
    {
        // TODO: Implement get() method.
    }

    public function find($id)
    {
        // TODO: Implement find() method.
    }

    public function store(array $data)
    {
        return $this->model->create([
           'title' => $data['title'],
           'slug' => Str::slug($data['title']),
           'description' => $data['description'],
           'sku' => $data['sku'],
           'category_id' => $data['category_id'],
           'status' => $data['status'],
           'published_by' => $data['published_by'],
        ]);
    }

    public function update($id, array $data)
    {
        // TODO: Implement update() method.
    }
}