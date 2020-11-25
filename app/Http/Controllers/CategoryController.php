<?php

namespace App\Http\Controllers;

use App\Contracts\CategoryRepositoryInterface;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class CategoryController extends Controller
{
    /**
     * @var Request
     */
    private $request;

    /**
     * CategoryController constructor.
     * @param Request $request
     */
    public function __construct(Request $request)
    {

        $this->request = $request;
    }
    public function index()
    {
        return view('category.index');
    }

    /**
     * @param CategoryRepositoryInterface $categoryRepository
     * @return \Illuminate\Http\JsonResponse
     */
    public function addCategory(CategoryRepositoryInterface $categoryRepository)
    {
        try {
            $data = $this->validate($this->request, [
                'name' => 'required|string|unique:categories|min:3|max:255',
                'parent_id' => 'nullable|numeric|exists:categories,id',
                'status' => 'required|numeric|min:0|max:1'
            ]);
            $categoryRepository->store($data);
            return response()->json([
                'message' => 'Category Added'
            ], 201);
        }catch (ValidationException $exception){
            return response()->json(['message' => $exception->getMessage()]);
        }
    }

    /**
     * @param CategoryRepositoryInterface $categoryRepository
     * @return \Illuminate\Http\JsonResponse
     */
    public function getCategoryList(CategoryRepositoryInterface $categoryRepository)
    {
        try{
            $categories = $categoryRepository->get(true);
            return response()->json([
                'message' => 'Category List',
                'data' => $categories
            ], 200);
        }catch (QueryException|\Exception $exception){
            return response()->json(['message' => $exception->getMessage()]);
        }
    }

    public function allCategory(CategoryRepositoryInterface $categoryRepository)
    {
        try{
            $categories = $categoryRepository->get(false);
            return response()->json([
                'message' => 'Category List',
                'data' => $categories
            ], 200);
        }catch (QueryException|\Exception $exception){
            return response()->json(['message' => $exception->getMessage()]);
        }
    }

    /**
     * @param $id
     * @param Request $request
     * @param CategoryRepositoryInterface $categoryRepository
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateCategory($id, Request $request, CategoryRepositoryInterface $categoryRepository)
    {
        if(!$categoryRepository->find($id)) return response()->json(['message' => 'Category Not found']);
        try {
            $data = $this->validate($this->request, [
                'name' => 'required|string|unique:categories,name|min:3|max:255',
                'slug' => 'required|string|unique:categories,slug,'.$id,
            ]);
            $categoryRepository->update($id, $data);
            return response()->json([
                'message' => 'Category updated.'
            ], 201);
        }catch (ValidationException $exception){
            return response()->json(['message' => $exception->getMessage()]);
        }
    }

    public function deleteCategory($id, CategoryRepositoryInterface  $categoryRepository)
    {
        if(!$categoryRepository->find($id)) return response()->json(['message' => 'Category Not found']);
        try {
            $categoryRepository->destroy($id);
            return response()->json([
                'message' => 'Category deleted.'
            ], 204);
        }catch (QueryException|\Exception $exception){
            return response()->json(['message' => $exception->getMessage()]);
        }
    }
}
