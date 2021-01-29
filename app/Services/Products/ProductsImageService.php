<?php


namespace App\Services\Products;


use App\Repositories\Products\ProductsImageRepository;
use Illuminate\Support\Facades\DB;

class ProductsImageService
{

    private $repository;

    /**
     * ProductsImageService constructor.
     * @param ProductsImageRepository $repository
     */
    public function __construct(ProductsImageRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param int $id
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|null
     * @throws \Exception
     */
    public function delete(int $id)
    {
        try{
            DB::beginTransaction();
            $result = $this->repository->find($id);
            $result->delete();
            DB::commit();
        }catch (\Exception $exception){
            DB::rollBack();
            throw $exception;
        }

        return $result;
    }


}
