<?php


namespace App\Repositories\Sales;


use App\Constants\SalesStatus;
use App\Contracts\Repository\AbstractRepository;
use App\Models\Sales\Sales;

class SalesRepository extends AbstractRepository
{
    public function __construct()
    {
        $this->setModel(Sales::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model[]
     */
    public function findAll()
    {
        return $this->getModel()
            ::with('products')
            ->with('user')
            ->orderByDesc('id')
            ->get();
    }

    /**
     * @param $id
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model[]
     */
    public function getAllByUser($id)
    {
        return $this->getModel()
            ::with('products')
            ->with('user')
            ->where('user_id','=',$id)
            ->get();
    }

    /**
     * @param $id
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model[]
     */
    public function getAllByUserSalesNull($id)
    {
        return $this->getModel()
            ::with('products')
            ->with('user')
            ->where('user_id','=',$id)
            ->where('sale_id','=',0)
            ->get();
    }

    /**
     * @return int
     */
    public function countSales()
    {
        return $this->getModel()
            ::count('id');
    }

    /**
     * @return int
     */
    public function countSalesFinished()
    {
        return $this->getModel()
            ::where('status','=',SalesStatus::FINALIZADO)
            ->count('id');
    }

    /**
     * @param $params
     * @return bool|int
     */
    public function updateStatus($params)
    {
        return $this->getModel()
            ::where('sale_id','=',$params['sale_id'])
            ->update(['status' => $params['status']]);
    }
}
