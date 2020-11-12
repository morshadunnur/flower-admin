<?php

namespace App\Http\Controllers;

use App\Contracts\CategoryRepositoryInterface;
use App\Contracts\ProductRepositoryInterface;
use App\Traits\UploadFile;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ProductController extends Controller
{
    use UploadFile;
    /**
     * @var Request
     */
    private $request;

    /**
     * ProductController constructor.
     * @param Request $request
     */
    public function __construct(Request $request)
    {

        $this->request = $request;
    }
    public function index(CategoryRepositoryInterface $categoryRepository)
    {
        $data['categories'] = $categoryRepository->get(false);
        $data['categories'] = $data['categories']->pluck('name', 'id')->toArray();
        return view('product.index', $data);
    }

    /**
     * @param ProductRepositoryInterface $productRepository
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(ProductRepositoryInterface $productRepository)
    {
        try {
            $data = $this->validate($this->request, [
                'title' => 'required|string|max:255',
                'category_id' => 'required|integer|min:1|exists:categories,id',
                'description' => 'nullable|string',
                'sku' => 'required|string|unique:products,sku',
                'status' => 'required|numeric|min:1|max:3',
                'feature_image' => ['required','image', 'mimes:jpg,png,jpeg,svg','max:2048']
            ]);
            $data['published_by'] = auth()->user()->id;
            $data['image'] = $this->uploadSingleImage($data['feature_image'], '/products', 'public', true, 200);
            $productRepository->store($data);
            return response()->json([
                'message' => 'Products Added'
            ], 201);
        }catch (ValidationException $exception){
            return response()->json(['message' => $exception->getMessage()]);
        }catch (QueryException|\Exception $exception){
            dd($exception->getMessage());
            return response()->json(['message' => 'Something went wrong']);
        }
    }
}
