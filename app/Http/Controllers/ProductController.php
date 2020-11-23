<?php

namespace App\Http\Controllers;

use App\Contracts\CategoryRepositoryInterface;
use App\Contracts\ProductImageRepositoryInterface;
use App\Contracts\ProductPriceRepositoryInterface;
use App\Contracts\ProductRepositoryInterface;
use App\Traits\UploadFile;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
    public function index()
    {
        return view('product.index');
    }

    public function create(CategoryRepositoryInterface $categoryRepository)
    {
        $data['categories'] = $categoryRepository->get(false);
        $data['categories'] = $data['categories']->pluck('name', 'id')->toArray();
        return view('product.create', $data);
    }

    /**
     * @param ProductRepositoryInterface $productRepository
     * @param ProductImageRepositoryInterface $productImageRepository
     * @param ProductPriceRepositoryInterface $productPriceRepository
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(ProductRepositoryInterface $productRepository, ProductImageRepositoryInterface $productImageRepository, ProductPriceRepositoryInterface $productPriceRepository)
    {
        try {
            $data = $this->validate($this->request, [
                'title' => 'required|string|max:255',
                'category_id' => 'required|integer|min:1|exists:categories,id',
                'description' => 'nullable|string',
                'sku' => 'required|string|unique:products,sku',
                'status' => 'required|numeric|min:1|max:3',
                'feature_image' => ['required','image', 'mimes:jpg,png,jpeg,svg','max:12048'],
                'cost_price' => 'required|numeric',
                'selling_price' => 'required|numeric|gt:cost_price',
                'quantity' => 'required|numeric',
                'gallery'  => ['nullable', 'array', 'max:20', function($attribute, $value, $fail){
                    if (!$this->request->file('gallery')){
                        $fail('Allow only file type');
                    }
                }]
            ]);

            $data['published_by'] = auth()->user()->id;
            $data['image'] = $this->uploadSingleImage($data['feature_image'], '/products', 'public', true, 200);
            $data['images'] = [];
            foreach ($data['gallery'] as $gallery){
                $data['images'][] = $this->uploadSingleImage($gallery, '/gallery', 'public', true);
            }
            DB::beginTransaction();
            try {
                $product = $productRepository->store($data);
                $data['product_id'] = $product->id;

            }catch (QueryException $exception){
                DB::rollBack();
                app('log')->debug("product query", [$exception]);
                return response()->json([
                    'message' => 'Products add failed!!'
                ], 406);
            }
            try {
                $price = $productPriceRepository->store($data);
            }catch (QueryException $exception){
                DB::rollBack();
                app('log')->debug("price query", [$exception]);
                return response()->json([
                    'message' => 'Products add failed!!'
                ], 406);
            }
            try {
                $gallery = $productImageRepository->store($data);
            }catch (QueryException $exception){
                DB::rollBack();
                app('log')->debug("gallery query", [$exception]);
                return response()->json([
                    'message' => 'Products add failed!!'
                ], 406);
            }

            DB::commit();

            return response()->json([
                'message' => 'Products Added'
            ], 201);
        }catch (ValidationException $exception){
            return response()->json(['message' => $exception->getMessage()]);
        }catch (QueryException|\Exception $exception){
            return response()->json(['message' => 'Something went wrong']);
        }
    }

    public function getProductList(Request $request, ProductRepositoryInterface $productRepository)
    {
        try{
            $products = $productRepository->get(['id','category_id','title','sku','feature_image','status'], ['prices', 'images','category'], true);
            return response()->json([
                'message' => 'Product List',
                'data' => $products
            ], 200);
        }catch (QueryException|\Exception $exception){
            return response()->json(['message' => $exception->getMessage()]);
        }
    }
}
