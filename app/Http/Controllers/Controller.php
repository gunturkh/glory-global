<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Item;
use App\Product;
use App\ProductCategory;
use App\ProductSubCategory;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct(){
    	$this->middleware(function ($request, $next) {
            if(Auth::check()){
                $this->user = Auth::user();

                // dd($this->user);
                View::share('user', $this->user);
            }
            return $next($request);
        });
    }

    public function createSlug($item_name, $id = 0, $model)
    {
        $slug = str_slug($item_name);

        $allSlugs = $this->getRelatedSlugs($slug, $id, $model);

        if(!$allSlugs->contains('slug',$slug)){
            return $slug;
        }

        for($i = 0; $i <= 10; $i++)
        {
            $newSlug = $slug.'_'.$i;
            if(!$allSlugs->contains('slug',$newSlug)){
                return $newSlug;
            }
        }

        throw new \Exception('Can not create a unique slug');
    }

    protected function getRelatedSlugs($slug, $id = 0, $model)
    {
        return $model::select('slug')->where('slug','like', $slug.'%')
                                      ->where('id','<>',$id)
                                      ->get();
    }

}
