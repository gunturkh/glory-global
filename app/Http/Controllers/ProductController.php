<?php

namespace App\Http\Controllers;

// use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Item;
use App\Product;
use App\ProductCategory;
use App\ProductSubCategory;
use App\DataTables\ProductDataTable;
use Validator;
use DataTables;
use Response;
use Illuminate\Http\Response as Res;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function getItems($product_id)
    {
        $items = Product::find($product_id)->items();

        // dd($items);
    }

    public function getKategori()
    {
    	if(request()->ajax())
    	{
    		return DataTables::of(Product::all())
    			->addColumn('action', function($data){
    				$button = '<button type="button" name="edit" id="'.$data->id.'" class="edit btn btn-primary btn-xs" data-toggle="modal" data-target="#editCategoryModal" data-id="'.$data->id.'" data-name="'.$data->name.'" data-icon="'.$data->icon.'"><i class="icon icon-round-brush"></i></button>';
    				$button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-default btn-xs" data-toggle="modal" data-target="#deleteCategoryModal" data-id="'.$data->id.'"><i class="icon icon-trash2"></i></button>';
    				return $button;
    			})
    			->rawColumns(['action'])
    			->make(true);
    	}

    	return view('admin.product');
    }

    public function getSubKategori()
    {
        if(request()->ajax())
        {
            return DataTables::of(ProductCategory::with('product')->get())
                ->addColumn('action', function($data){
                    $button = '<button type="button" name="edit" id="'.$data->id.'" class="edit btn btn-primary btn-xs" data-toggle="modal" data-target="#editSubCategoryModal" data-id="'.$data->id.'" data-name="'.$data->name.'" data-product_id="'.$data->product_id.'"><i class="icon icon-round-brush"></i></button>';
                    $button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-default btn-xs" data-toggle="modal" data-target="#deleteSubCategoryModal" data-id="'.$data->id.'"><i class="icon icon-trash2"></i></button>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true); 
        }
        $products = Product::all(['id','name']);
        return view('admin.product_sub', ['products' => $products]);
    }

    public function getProduk()
    {
        if(request()->ajax())
        {
            return DataTables::of(ProductSubCategory::with('category.product')->get())
                ->addColumn('action', function($data){
                    $button = '<button type="button" name="edit" id="'.$data->id.'" class="edit btn btn-primary btn-xs" data-toggle="modal" data-target="#editProdukModal" data-id="'.$data->id.'" data-product_name="'.$data->name.'" data-sub_product_id="'.$data->product_category_id.'"><i class="icon icon-round-brush"></i></button>';
                    $button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-default btn-xs" data-toggle="modal" data-target="#deleteProdukModal" data-id="'.$data->id.'"><i class="icon icon-trash2"></i></button>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        $sub_products = ProductCategory::all(['id','name']);
        return view('admin.products', ['sub_products' => $sub_products]);
    }

    // Add new Model on ProductSubCategory
    public function addSubCategories(Request $request)
    {
        $validator = Validator::make(request()->all(), [
            '_add_name'  => 'required|max:100',
            '_add_product_category' => 'required|not_in:Choose...',
        ]);
        
        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }

        $productSubCategory = new ProductSubCategory();
        $productSubCategory->name = $request->_add_name;
        $productSubCategory->slug = $this->createSlug($request->_add_name,0,$productSubCategory);
        $productSubCategory->product_category_id = $request->_add_product_category;
        $productSubCategory->save();

        return back()->with('message','Sukses! Produk baru berhasil ditambah ke dalam database!');
    }

    // Update Selected Model on ProductSubCategory
    public function updateSubCategories(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make(request()->all(), [
            'name'  => 'required|max:100',
            'product_category' => 'required|not_in:Choose...',
        ]);
        
        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }

        $productSubCategory = ProductSubCategory::findOrFail($request->sub_cat_id);
        $productSubCategory->name = $request->name;
        $productSubCategory->slug = $this->createSlug($request->name,0,$productSubCategory);
        $productSubCategory->product_category_id = $request->product_category;
        $productSubCategory->update();

        return back()->with('message','Sukses! Produk berhasil diperbaharui ke data terbaru!');
    }

    // Delete Selected Model on ProductSubCategory
    public function deleteSubCategories(Request $request)
    {
        $productSubCategory = ProductSubCategory::findOrFail($request->_del_sub_cat_id);
        $productSubCategory->delete();

        return back()->with('message','Sukses! Produk berhasil dihapus dari dalam database!');
    }

    // Add new Model on ProductCategory
    public function addCategory(Request $request)
    {
        $validator = Validator::make(request()->all(), [
            '_add_name'  => 'required|max:100',
            '_add_category' => 'required|not_in:Choose...',
        ]);
        
        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }

        $productCategory = new ProductCategory();
        $productCategory->name = $request->_add_name;
        $productCategory->slug = $this->createSlug($request->_add_name,0,$productCategory);
        $productCategory->product_id = $request->_add_category;
        $productCategory->save();

        return back()->with('message','Sukses! Sub-Kategori baru berhasil ditambah ke dalam database!');
    }

    // Update Selected Model on ProductCategory
    public function updateCategory(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make(request()->all(), [
            '_edit_name'  => 'required|max:100',
            '_edit_category' => 'required|not_in:Choose...',
        ]);
        
        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }

        $productCategory = ProductCategory::findOrFail($request->cat_id);
        $productCategory->name = $request->_edit_name;
        $productCategory->slug = $this->createSlug($request->_edit_name,0,$productCategory);
        $productCategory->product_id = $request->_edit_category;
        $productCategory->update();

        return back()->with('message','Sukses! Sub-Kategori berhasil diperbaharui ke data terbaru!');
    }

    // Delete Selected Model on ProductCategory
    public function deleteCategory(Request $request)
    {
        $productCategory = ProductCategory::findOrFail($request->_del_cat_id);
        $productCategory->delete();

        return back()->with('message','Sukses! Sub-Kategori berhasil dihapus dari dalam database!');
    }

    // Add new Model on Product
    public function addProduct(Request $request)
    {
        $validator = Validator::make(request()->all(), [
            '_add_name'  => 'required|max:100',
            '_add_product_icon' => 'required|not_in:Choose...',
        ]);
        
        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }

        $product = new Product();
        $product->name = $request->_add_name;
        $product->slug = $this->createSlug($request->_add_name,0,$product);
        $product->icon = $request->_add_product_icon;
        $product->save();

        return back()->with('message','Sukses! Kategori baru berhasil ditambah ke dalam database!');
    }

    // Update Selected Model on Product
    public function updateProduct(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make(request()->all(), [
            '_edit_name'  => 'required|max:100',
            '_edit_product_icon' => 'required|not_in:Choose...',
        ]);
        
        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }

        $product = Product::findOrFail($request->_edit_product_id);
        $product->name = $request->_edit_name;
        $product->slug = $this->createSlug($request->_edit_name,0,$product);
        $product->icon = $request->_edit_product_icon;
        $product->update();

        return back()->with('message','Sukses! Kategori berhasil diperbaharui ke data terbaru!');
    }

    // Delete Selected Model on Product
    public function deleteProduct(Request $request)
    {
        $product = Product::findOrFail($request->_del_product_id);
        $product->delete();

        return back()->with('message','Sukses! Kategori berhasil dihapus dari dalam database!');
    }

}
