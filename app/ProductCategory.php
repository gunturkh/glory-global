<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{

	protected $table = 'product_categories';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'product_id'
    ];

    protected $dates = [
    	'created_at','updated_at'
    ];

    public function product()
    {
        return $this->belongsTo('App\Product', 'product_id');
    }

    public function subcategories()
    {
        return $this->hasMany('App\ProductSubCategory');
    }

    public function items()
    {
        return $this->hasManyThrough('App\Item', 'App\ProductSubCategory', 'product_category_id', 'product_sub_category_id', 'id', 'id');
    }
}
