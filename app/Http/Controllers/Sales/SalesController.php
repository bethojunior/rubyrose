<?php


namespace App\Http\Controllers\Sales;


use App\Http\Controllers\Controller;
use App\Http\Responses\ApiResponse;
use App\Services\Sales\SalesService;
use App\Services\User\UserService;
use Illuminate\Http\Request;

class SalesController extends Controller
{

    private $service;
    private $userService;

    /**
     * SalesController constructor.
     * @param SalesService $salesService
     * @param UserService $userService
     */
    public function __construct(SalesService $salesService , UserService $userService)
    {
        $this->service = $salesService;
        $this->userService = $userService;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $sales = $this->service
            ->getAll();
        $users = $this->userService
            ->getAllSalesMan();
        return view('sales.index')->with(['sales' => $sales,'users' => $users]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(Request $request)
    {
        try{
            $response = $this
                ->service
                ->create($request->all());
        }catch (\Exception $exception){
            return ApiResponse::error('',$exception->getMessage());
        }
        return ApiResponse::success($response,'Inserido com sucesso');
    }

}
