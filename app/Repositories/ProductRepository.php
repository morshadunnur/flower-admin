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

    public function get(array $selected_fields = ['*'],array $relations = [], bool $paginate = false)
    {
        $products =  $this->model
            ->select($selected_fields)
            ->with($relations);
        return $paginate ? $products->paginate(10) : $products->get();
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function store(array $data)
    {
        return $this->model->create([
           'title' => $data['title'],
           'slug' => Str::slug($data['title']),
           'description' => $data['description'],
           'sku' => $data['sku'],
           'category_id' => $data['category_id'],
           'feature_image' => config('flower.product_image.base_path').config('flower.product_image.original').$data['image']['file_name'],
           'status' => $data['status'],
           'published_by' => $data['published_by'],
        ]);
    }

    public function update($id, array $data)
    {
        // TODO: Implement update() method.
    }

    public function destroy($id)
    {
        return $this->model->destroy($id);
    }

    public function detailsById($product_id, array $selected_fields = ['*'],array $relations = [])
    {
        return $this->model->select($selected_fields)
            ->where('id', $product_id)
            ->with($relations)
            ->first();
    }
}