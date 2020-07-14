<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

	protected $table = 'products';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'icon'
    ];

    protected $dates = [
    	'created_at','updated_at'
    ];

    public function categories()
    {
        return $this->hasMany('App\ProductCategory');
    }

    public function subCategories()
    {
        return $this->hasManyThrough('App\ProductSubCategory', 'App\ProductCategory', 'product_id', 'product_category_id', 'id', 'id');
    }

    public function items()
    {
        $items = [];

        foreach($this->subCategories as $subcategory)
        {
            if($subcategory->items->count() > 0) $items[] = $subcategory->items;
        }

        return $items;

    }
}
