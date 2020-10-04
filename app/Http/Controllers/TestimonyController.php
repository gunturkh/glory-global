<?php

namespace App\Http\Controllers;

// use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Item;
use App\Product;
use App\ProductCategory;
use App\ProductSubCategory;
use App\Testimony;
use Validator;
use DataTables;
use Response;
use Illuminate\Http\Response as Res;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class TestimonyController extends Controller
{
    public function addTestimony (Request $request) {

        if ($request->hasFile('picture')) {
            //  Let's do everything here
            if ($request->file('picture')->isValid()) {
                //
                $validated = $request->validate([
                    'name' => 'string|max:40',
                    'picture' => 'mimes:jpeg,png|max:1014',
                ]);
                $cover = $request->file('picture');
                $extension = $cover->getClientOriginalExtension();
                $picture = $cover->getFilename().'.'.$extension;
                Storage::disk('public')->put($cover->getFilename().'.'.$extension,  File::get($cover));
                $testimony = Testimony::create([
                    'name' => $validated['name'],
                    'pictures' => $picture,
                ]);

                return redirect()->back()->with('message','Sukses! Testimony baru berhasil dimasukkan kedalam database!');
            }
        }
        abort(500, 'Could not upload image :(');
    }

    public function viewTestimonies () {
        if(request()->ajax())
        {
            return DataTables::of(Testimony::get())
                ->addColumn('action', function($data){
                    $button = '<a href="update-testimony/'.$data->id.'"><button type="button" name="edit" id="'.$data->id.'" class="edit btn btn-primary btn-xs" data-toggle="modal" data-target="#editSubCategoryModal" data-id="'.$data->id.'" data-name="'.$data->name.'" data-product_id="'.$data->product_id.'"><i class="icon icon-round-brush"></i></button></a>';
                    $button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-default btn-xs" data-toggle="modal" data-target="#deleteItemModal" data-id="'.$data->id.'"><i class="icon icon-trash2"></i></button>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true); 
        }
        /* $products = Item::with('subcategory.category.product')->get(); */
        /* // dd($products); */
        /* return view('admin.item', ['products' => $products]); */
        $pictures = Testimony::all();
        return view('admin.testimony')->with('pictures', $pictures);
    }

    public function getAddTestimony()
    {
        $pictures = Testimony::all();
        return view('admin.add_testimony', ['pictures' => $pictures]);
    }

    public function deleteTestimony(Request $request)
    {
        $testimony = Testimony::findOrFail($request->_del_testimony_id);

        // dd($product);

        if($testimony == null){
            return route('testimony')->with('message', 'Maaf!, Testimoni tidak ditemukan!');
        }

        $existing_picture = public_path('products/').$testimony->filename;
        File::delete($existing_picture);
        $testimony->delete();
        return redirect()->route('testimony')->with('message', 'Sukses!, Testimoni berhasil dihapus dari database!');
    }

    public function getUpdateTestimony($testimony_id)
    {
        $testimony = Testimony::where('id', $testimony_id)->first();
        return view('admin.update_testimony',['testimony' => $testimony]);
    }

    public function postUpdateTestimony($testimony_id, Request $request)
    {

        /* dd($request->all()); */

        $validator = Validator::make(request()->all(), [
            'name'  => 'string|max:40',
            'picture' => 'mimes:jpeg,png|max:1014',
            // 'product_image' => 'image|mimes:jpeg,png,jpg|max:2056'
        ]);
        
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }


        $testimony = Testimony::where('id', $testimony_id)->first();

        $existing_filename = public_path('products/').$testimony->filename;
        if($request->file('picture')) {
            $cover = $request->file('picture');
            $extension = $cover->getClientOriginalExtension();
            Storage::disk('public')->put($cover->getFilename().'.'.$extension,  File::get($cover));
            if(File::exists($existing_filename)){
                //Found existing file then delete
                File::delete($existing_filename);  // or unlink($filename);
            }

            /* dd($request->name); */
              //update filename to database
            $testimony->pictures = $cover->getFilename().'.'.$extension;
            $testimony->name = $request->name;
            
        }

        $testimony->name = $request->name;
        $testimony->update();

        return redirect()->route('testimony') ->with('message','Sukses! Testimoni berhasil diperbaharui ke data terbaru!'); }
}
