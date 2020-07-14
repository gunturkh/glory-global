<?php

namespace App\Http\Controllers;

// use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Product;
use App\ProductCategory;
use App\Item;
use Validator;
use Response;
use Illuminate\Http\Response as Res;

class MainController extends Controller
{
    public function getAbout()
    {
        return view('about');
    }

    public function getLayanan()
    {
        return view('layanan');
    }

    public function getTransaksi()
    {
    	return view('transaksi');
    }

    public function getFaq()
    {
    	return view('faq');
    }

    public function getContact()
    {
        return view('contact');
    }

    public function getProduk()
    {
        $products = Product::with('categories.subCategories')->get();
        $categories = ProductCategory::all()->random(8);
        $others = Item::all()->random(12);
        // dd($products);
        return view('produk',
        [
            'products' => $products, 
            'others' => $others, 
            'related_categories' => $categories
        ]);
    }
}
