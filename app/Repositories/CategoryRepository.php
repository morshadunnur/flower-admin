<?php
/**
 * @author Author Name: Md Morshadun Nur
 * @email  Email: morshadunnur@gmail.com
 */

namespace App\Repositories;


use App\Contracts\CategoryRepositoryInterface;
use App\Models\Category;
use Illuminate\Support\Str;

class CategoryRepository implements CategoryRepositoryInterface
{
    /**
     * @var Category
     */
    private $model;

    /**
     * CategoryRepository constructor.
     * @param Category $model
     */
    public function __construct(Category $model)
    {

        $this->model = $model;
    }

    /**
     * @return mixed
     */
    public function get()
    {
        return $this->model->select('id','name', 'slug', 'status', 'parent_id')->where('parent_id', 0)
            ->with('childs')
            ->get();
    }


    /**
     * @param array $data
     * @return mixed
     */
    public function store(array $data)
    {
        return $this->model->create([
           'name' => $data['name'],
           'slug' => Str::slug($data['name']),
           'parent_id' => $data['parent_id'] ?? 0
        ]);
    }

    /**
     * @param $id
     * @param array $data
     * @return mixed
     */
    public function update($id, $data)
    {
        $category = $this->model->find($id);
        $category->update([
            'name' => $data['name'],
            'slug' => $data['slug']
        ]);
        return $category;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        return $this->model->find($id);
    }

    public function destroy($id)
    {
        return $this->model->destroy($id);
    }
}