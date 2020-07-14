<?php

namespace App\Http\Controllers;

// use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Item;
use App\Product;
use App\ProductCategory;
use App\ProductSubCategory;
use Validator;
use DataTables;
use Response;
use Illuminate\Http\Response as Res;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;

class ItemController extends Controller
{
    public function respond($data, $headers = [])
    {
        return Response::json($data, $this->getStatusCode(), $headers);
    }

    public function getStatusCode()
    {
        return $this->status_code;
    }

    public function setStatusCode($status_code)
    {
        $this->status_code = $status_code;
    }

    public function respondModelNotFound($message)
    {
        $this->setStatusCode(Res::HTTP_UNPROCESSABLE_ENTITY);

        return $this->respond([
            'status' => 'error',
            'status_code' => $this->getStatusCode(),
            'message' => $message
        ]);
    }

    public function getItem()
    {
        if(request()->ajax())
        {
            return DataTables::of(Item::with('subcategory.category.product')->get())
                ->addColumn('action', function($data){
                    $button = '<a href="update-item/'.$data->id.'"><button type="button" name="edit" id="'.$data->id.'" class="edit btn btn-primary btn-xs" data-toggle="modal" data-target="#editSubCategoryModal" data-id="'.$data->id.'" data-name="'.$data->name.'" data-product_id="'.$data->product_id.'"><i class="icon icon-round-brush"></i></button></a>';
                    $button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-default btn-xs" data-toggle="modal" data-target="#deleteItemModal" data-id="'.$data->id.'"><i class="icon icon-trash2"></i></button>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true); 
        }
        $products = Item::with('subcategory.category.product')->get();
        // dd($products);
        return view('admin.item', ['products' => $products]);
        // $items = Item::all()->sortBy('updated_at');
        // return view('admin.item')->with('products', $items);
    }

    public function getUpdateItem($item_id)
    {
        $item = Item::where('id', $item_id)->first();
        $subcategories = ProductSubCategory::all(['id','name']);
        return view('admin.update_item',['product' => $item, 'subcategories' => $subcategories]);
    }

    public function getAddItem()
    {
        $subcategories = ProductSubCategory::all(['id','name']);
        return view('admin.add_item', ['subcategories' => $subcategories]);
    }

    public function getSearch()
    {
        $items = Item::all()->random(8);
        return view('search')->with('items', $items);
    }

    public function getItemsByProduct($slug)
    {
        $categories = Product::whereSlug($slug)->with('categories')->get()->pluck('categories')->flatten();
        $subcategories = Product::whereSlug($slug)->with('subCategories')->get()->pluck('subCategories')->flatten();

        $items = [];

        foreach ($subcategories as $subcategory) {
            $items = $subcategory->items;
        }

        $products = Product::with('categories.subCategories')->get();
        $others = Item::all()->random(8);

        return view('produk')->with(['products' => $products, 'items' => $items, 'related_products' => $categories, 'others' => $others]);
    }

    public function getItemsbyCategory($slug)
    {
        $items = ProductCategory::whereSlug($slug)->with('items')->get()->pluck('items')->flatten();
        $products = Product::with('categories.subCategories')->get();

        $related = ProductCategory::whereSlug($slug)->first();
        $related = ProductSubCategory::where('product_category_id', $related->id)->get();

        // dd($related);

        $others = Item::all()->random(8);

        return view('produk')->with(['products' => $products, 'items' => $items, 'related_sub_categories' => $related, 'others' => $others]);
    }

    public function getItemsBySubCategory($slug)
    {
        $items = ProductSubCategory::whereSlug($slug)->with('items')->get();
        $related = ProductSubCategory::whereSlug($slug)->with('category')->first();
        $related = ProductSubCategory::where('product_category_id', $related->category->id)->get();

        $products = Product::with('categories.subCategories')->get();
        $items = $items->pluck('items')->flatten();

        $others = Item::all()->random(8);

        return view('produk')->with(['products' => $products, 'items' => $items, 'related_sub_categories' => $related, 'others' => $others]);
    }

    public function getItemsBySlug($slug)
    {
        $item = Item::whereSlug($slug)->first();
        $related = ProductSubCategory::whereId($item->product_sub_category_id)->with('category')->first();
        $related = ProductSubCategory::where('product_category_id', $related->category->id)->get();
        
        $others = Item::all()->random(8);

        return view('item')->with(['item' => $item, 'related_sub_categories' => $related, 'others' => $others]);
    }

    public function getViewProduct($slug)
    {
        $item = Item::where('slug', $slug)->firstOrFail();
        return response()->json($item);
    }

    public function postUpdateItem($item_id, Request $request)
    {

        // dd($request->all());

        $validator = Validator::make(request()->all(), [
            'product_name'  => 'required|max:100',
            'product_description' => 'required',
            'product_subcategory' => 'required|not_in:Choose...',
            'product_price' => 'required|numeric',
            'product_price2' => 'required|numeric',
            'top_product' => 'required|numeric',
            // 'product_image' => 'image|mimes:jpeg,png,jpg|max:2056'
        ]);
        
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        if($request->top_product !== 0){
            $item = Item::where('top', $request->top_product)->first();
            if($item){
                $item->top = false;
                $item->update();
            }
        }

        $item = item::where('id', $item_id)->first();

        $existing_filename = public_path('products/').$item->filename;

        if($request->file('product_image')) {
            $cover = $request->file('product_image');
            $extension = $cover->getClientOriginalExtension();
            Storage::disk('public')->put($cover->getFilename().'.'.$extension,  File::get($cover));
            if(File::exists($existing_filename)){
                //Found existing file then delete
                File::delete($existing_filename);  // or unlink($filename);
            }
            // return ;

              //update filename to database
            $item->mime = $cover->getClientMimeType();
            $item->original_filename = $cover->getClientOriginalName();
            $item->filename = $cover->getFilename().'.'.$extension;
            
        }

        $item->name = $request->product_name;
        $item->slug = $this->createSlug($request->product_name, 0, $item);
        $item->product_sub_category_id = $request->product_subcategory;
        $item->description = $request->product_description;
        $item->price = $request->product_price;
        $item->price2 = $request->product_price2;
        $item->top = $request->top_product;
        $item->update();

        return redirect()->route('item')
            ->with('message','Sukses! Produk berhasil diperbaharui ke data terbaru!');
    }

    public function postAddItem(Request $request)
    {

        $validator = Validator::make(request()->all(), [
            'product_name'  => 'required|max:100',
            'product_description' => 'required',
            'product_image' => 'required|image|mimes:jpeg,png,jpg|max:2056',
            'product_subcategory' => 'required',
            'product_price' => 'required|numeric',
            'product_price2' => 'required|numeric',
            'top_product' => 'required|numeric',
        ]);
        
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $cover = $request->file('product_image');
        $extension = $cover->getClientOriginalExtension();
        Storage::disk('public')->put($cover->getFilename().'.'.$extension,  File::get($cover));

        $item = new Item();
        $item->name = $request->product_name;
        $item->slug = $this->createSlug($request->product_name, 0, $item);
        $item->description = $request->product_description;
        $item->product_sub_category_id = $request->product_subcategory;
        $item->price = $request->product_price;
        $item->price2 = $request->product_price2;
        $item->mime = $cover->getClientMimeType();
        $item->original_filename = $cover->getClientOriginalName();
        $item->filename = $cover->getFilename().'.'.$extension;
        
        if($request->top_product !== 0){
            $existing_item = Item::where('top', $request->top_product)->first();
            if($existing_item){
                $existing_item->top = false;
                $existing_item->update();
            }
        }

        $item->top = $request->top_product;
        $item->save();

        return redirect()->route('item')
            ->with('message','Sukses! Produk baru berhasil dimasukkan kedalam database!');
    }

    public function deleteItem(Request $request)
    {
        $item = Item::findOrFail($request->_del_item_id);

        // dd($product);

        if($item == null){
            return route('product')->with('message', 'Maaf!, Produk tidak ditemukan!');
        }

        $existing_filename = public_path('products/').$item->filename;
        File::delete($existing_filename);
        $item->delete();
        return redirect()->route('item')->with('message', 'Sukses!, Produk berhasil dihapus dari database!');
    }

    // public function createSlug($item_name, $id = 0)
    // {
    //     $slug = str_slug($item_name);

    //     $allSlugs = $this->getRelatedSlugs($slug, $id);

    //     if(!$allSlugs->contains('slug',$slug)){
    //         return $slug;
    //     }

    //     for($i = 0; $i <= 10; $i++)
    //     {
    //         $newSlug = $slug.'-'.$i;
    //         if(!$allSlugs->contains('slug',$newSlug)){
    //             return $newSlug;
    //         }
    //     }

    //     throw new \Exception('Can not create a unique slug');
    // }

    // protected function getRelatedSlugs($slug, $id = 0)
    // {
    //     return Item::select('slug')->where('slug','like', $slug.'%')
    //                                   ->where('id','<>',$id)
    //                                   ->get();
    // }

    public function searchItem(Request $request)
    {

        $keyword = $request->keyword;

        if(empty($keyword)){
            $filter_items = Item::all()->random(8);
        } else {
            $filter_items = Item::where('name', 'like', '%'.$keyword.'%')
                                    ->orWhere('description', 'like', '%'.$keyword.'%')->get();
        }
        // dd($filter_items);
        return view('search')->with('items', $filter_items);

        // if($filter_items->count())
        // {
        //     $this->setStatusCode(Res::HTTP_OK);
        //     return $this->respond([
        //         'status' => 'success',
        //         'status_code' => $this->getStatusCode(),
        //         'message' => 'Menampilkan '. $filter_items->count() .' produk yang dicari',
        //         'data' => $filter_items
        //     ]);
        // } else {
        //     $this->setStatusCode(Res::HTTP_OK);
        //     return $this->respond([
        //         'status' => 'no model',
        //         'status_code' => $this->getStatusCode(),
        //         'message' => 'Produk yang dicari belum terdaftar dalam database. Kontak team kami untuk mendapatkannya',
        //         'data' => null,
        //     ]);
        // }
    }
}
