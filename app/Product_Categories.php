<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product_Categories extends Model
{
    use SoftDeletes;
    protected $table = 'product_categories';
    protected $dates = ['deleted_at'];
    public function product_category_details()
    {
        return $this->hasMany('App/Product_Category_Details');
    }
}
