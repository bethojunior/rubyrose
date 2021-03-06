<?php

namespace App\Http\Controllers;

use App\Constants\SalesStatus;
use App\Services\Sales\SalesService;
use App\Services\User\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    private $userService;
    private $salesService;

    /**
     * HomeController constructor.
     * @param UserService $userService
     * @param SalesService $salesService
     */
    public function __construct(UserService $userService, SalesService $salesService)
    {
        $this->userService = $userService;
        $this->salesService = $salesService;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $user = Auth::user();

        $salesman = $this->userService
            ->getAllSalesMan();

        $totalSales = $this->salesService
            ->countSales();

        $totalSalesFinished = $this->salesService
            ->countSalesByStatus(SalesStatus::FINALIZADO);

        $totalSalesCanceled = $this->salesService
            ->countSalesByStatus(SalesStatus::CANCELADO);

        $totalSalesWait = $this->salesService
            ->countSalesByStatus(SalesStatus::EM_ABERTO);

        return view('home.home')
            ->with
            (
                [
                    'salesman' => $salesman,
                    'totalSales' => $totalSales,
                    'totalSalesFinished' => $totalSalesFinished,
                    'totalSalesCanceled' => $totalSalesCanceled,
                    'totalSalesWait' => $totalSalesWait,
                ]
            );
    }
}
