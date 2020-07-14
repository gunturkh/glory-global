<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductSubCategory extends Model
{

	protected $table = 'product_sub_categories';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'product_category_id'
    ];

    protected $dates = [
    	'created_at','updated_at'
    ];

    public function product()
    {
        return $this->hasOneThrough('App\Product', 'App\ProductCategory', 'product_id', 'id', 'id', 'id');
    }

    public function category()
    {
        return $this->belongsTo('App\ProductCategory', 'product_category_id');
    }

    public function items()
    {
        return $this->hasMany('App\Item');
    }
    
}
