<?php
/**
 * @author Author Name: Md Morshadun Nur
 * @email  Email: morshadunnur@gmail.com
 */

namespace App\Repositories;


use App\Contracts\ProductImageRepositoryInterface;
use App\Models\ProductImage;
use Illuminate\Support\Str;

class ProductImageRepository implements ProductImageRepositoryInterface
{
    /**
     * @var ProductImage
     */
    private $model;

    /**
     * ProductImageRepository constructor.
     * @param ProductImage $model
     */
    public function __construct(ProductImage $model)
    {

        $this->model = $model;
    }

    public function store(array $data)
    {
        foreach ($data['images'] as $image){
            $this->model->create([
                'product_id' => $data['product_id'],
                'name' => $image['file_name'],
                'type' => 1,
            ]);
        }

    }

    public function get(bool $paginate)
    {
        // TODO: Implement get() method.
    }

    public function find($id)
    {
        // TODO: Implement find() method.
    }

    public function update($id, array $data)
    {
        // TODO: Implement update() method.
    }
}