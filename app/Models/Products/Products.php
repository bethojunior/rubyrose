<?php


namespace App\Models\Products;


use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $fillable = ['name','type_product_id','description','value','minimum_order'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function images()
    {
        return $this->hasMany(ProductImage::class,'product_id');
    }
}
