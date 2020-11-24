<?php


namespace App\Models\Products;


use Illuminate\Database\Eloquent\Model;

class ProductsModel extends Model
{
    protected $fillable = ['name','type_product_id','description','value','minimum_order'];
}
