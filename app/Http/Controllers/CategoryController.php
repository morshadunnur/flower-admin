<?php

namespace App\Http\Controllers;

use App\Contracts\CategoryRepositoryInterface;
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
                'name' => 'required|string|unique:categories|min:3|max:255'
            ]);
            $categoryRepository->store($data);
            return response()->json([
                'message' => 'Category Added'
            ], 201);
        }catch (ValidationException $exception){
            return response()->json(['message' => $exception->getMessage()]);
        }
    }
}
