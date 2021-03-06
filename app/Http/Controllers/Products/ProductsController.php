<?php


namespace App\Http\Controllers\Products;


use App\Http\Controllers\Controller;
use App\Http\Responses\ApiResponse;
use App\Services\Products\ProductsImageService;
use App\Services\Products\ProductsService;
use App\Services\TypeProduct\TypeProductService;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    private $service;
    private $typeProduct;

    /**
     * ProductsController constructor.
     * @param ProductsService $productsService
     * @param TypeProductService $typeProductService
     */
    public function __construct(ProductsService $productsService,TypeProductService $typeProductService)
    {
        $this->service = $productsService;
        $this->typeProduct = $typeProductService;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $types = $this->typeProduct
            ->getAll();
        return view('products.index')->with(['types' => $types]);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show()
    {
        $products = $this->service
            ->findAllShow();
        return view('products.show')->with(['products' => $products]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function insert(Request $request)
    {
        try{
             $this
                ->service
                ->insert($request->all());
        }catch (\Exception $exception){
            return redirect()->route('products.show')
                ->with('error', $exception->getMessage());
        }
        return redirect()->route('products.show')
            ->with('success', 'Produto inserido com sucesso');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        try{
            $this
                ->service
                ->updateStatus($request->all());
        }catch (\Exception $exception){
            return redirect()->route('products.show')
                ->with('error', $exception->getMessage());
        }
        return redirect()->route('products.show')
            ->with('success', 'Status do produto alterado com sucesso');
    }

    /**
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(int $id)
    {
        $product = $this->service
            ->find($id);
        $types = $this->typeProduct
            ->getAll();
        return view('products.edit')->with(['product' => $product[0],'types' => $types]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateProduct($id,Request $request)
    {
        try{
            $this
                ->service
                ->update($id,$request->all());
        }catch (\Exception $exception){
            return redirect()->route('products.show')
                ->with('error', $exception->getMessage());
        }
        return redirect()->route('products.show')
            ->with('success', 'Produto alterado com sucesso');
    }

    /**
     * @param int $id
     * @param ProductsImageService $productsImageService
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteImage(int $id , ProductsImageService $productsImageService)
    {
        try{
            $return = $productsImageService->delete($id);
        }catch (\Exception $exception){
            return ApiResponse::error('',$exception->getMessage());
        }
        return ApiResponse::success($return,'Excluido com sucesso');
    }

}
