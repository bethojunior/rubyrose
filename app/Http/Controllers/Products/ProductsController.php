<?php


namespace App\Http\Controllers\Products;


use App\Http\Controllers\Controller;
use App\Services\Products\ProductsService;
use App\Services\TypeProduct\TypeProductService;

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

}
