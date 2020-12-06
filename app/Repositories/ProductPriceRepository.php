<?php
/**
 * @author Author Name: Md Morshadun Nur
 * @email  Email: morshadunnur@gmail.com
 */

namespace App\Repositories;


use App\Contracts\ProductPriceRepositoryInterface;
use App\Models\ProductPrice;
use Illuminate\Support\Str;

class ProductPriceRepository implements ProductPriceRepositoryInterface
{
    /**
     * @var ProductPrice
     */
    private $model;

    /**
     * ProductPriceRepository constructor.
     * @param ProductPrice $model
     */
    public function __construct(ProductPrice $model)
    {

        $this->model = $model;
    }

    public function store(array $data)
    {
        return $this->model->create([
            'product_id' => $data['product_id'],
            'sku_uuid' => Str::uuid(),
            'cost_price' => $data['cost_price'],
            'selling_price' => $data['selling_price'],
            'quantity' => $data['quantity'],
            'status' => 1,
        ]);
    }

    public function get(bool $paginate)
    {
        // TODO: Implement get() method.
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function update($id, array $data)
    {
        $price = $this->find($id);
        return $price->update([
            'cost_price' => $data['cost_price'],
            'selling_price' => $data['selling_price'],
            'quantity' => $data['quantity']
        ]);
    }
}