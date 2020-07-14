<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{

	protected $table = 'items';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'filename', 'mime', 'original_filename', 'product_sub_category_id'
    ];

    protected $dates = [
    	'created_at','updated_at'
    ];

    public function subcategory()
    {
        return $this->belongsTo('App\ProductSubCategory', 'product_sub_category_id');
    }
}
