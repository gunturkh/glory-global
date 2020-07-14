<?php

namespace App\Http\Controllers;

use App\User;
use App\Product;
use App\ProductCategory;
use App\ProductSubCategory;
use App\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Validator;

class UserController extends Controller
{

	public function getDashboard()
	{
        $user = Auth::user();
        $product = Product::all()->count();
        $product_category = ProductCategory::all()->count();
        $product_sub_category = ProductSubCategory::all()->count();
        $item = Item::all()->count();

		return view('admin.dashboard')->with(['user' => $user, 'product' => $product, 'product_category' => $product_category, 'product_sub_category' => $product_sub_category, 'item' => $item]);
	}

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function getWelcome()
    {
        $items = Item::orderBy('created_at', 'desc')->take(3)->get();
        return view('welcome')->with('products',$items);
    }

    public function getAccount()
    {
        $user = Auth::user();
        return view('admin.account')->with('user',$user);
    }

    public function getItem()
    {
        return view('admin.item');
    }

    public function getUpdateItem()
    {
        return view('admin.update_item');
    }

    public function postSignUp(Request $request)
    {
    	$this->validate($request, [
    		'email' => 'required|unique:users|email',
    		'password' => 'required|max:255|min:4',
    		// 'name' => 'required|max:20',
    	]);

    	$email = $request['email'];
    	$password = bcrypt($request['password']);
    	$name = "admin";

    	$user = new User();
    	$user->email = $email;
    	$user->password = $password;
    	$user->name = $name;
    	$user->save();

    	Auth::login($user);

    	// dd('ok');
    	return redirect()->route('admin.dashboard');
    }

    public function postUpdateAccount(Request $request)
    {
        $validator = Validator::make(request()->all(), [
            'email' => 'required|email',
            'current_password' => 'required',
            'new_password' => 'required|min:8',
            'confirm_new_password' => 'required|min:8|same:new_password'
        ]);

        if($validator->fails()){
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $current_password = Auth::user()->password;

        if(Hash::check($request['current_password'], $current_password)){
            $user_id = Auth::user()->id;                       
            $obj_user = User::find($user_id);
            $obj_user->password = Hash::make($request['new_password']);;
            $obj_user->update();
            return redirect()->route('admin.account')->with('message','Perbaharui Akun Sukses!');
        } else {
            return redirect()->route('admin.account')->with('error','Perbaharui Akun Gagal! Mohon masukkan password sekarang dengan benar!');
        }

    }

    public function postSignIn(Request $request)
    {	

        $validator = Validator::make(request()->all(), [
            'email' => 'required',
            'password' => 'required'
        ]);

        if($validator-> fails()){
            return redirect()->back()->withInput()->withErrors($validator);
        }

    	if(Auth::attempt(['email' => $request['email'], 'password' => $request['password']])){
    		return redirect()->route('admin.dashboard');    		
    	}
    	$message = 'Invalid combination of username and password';
		// return redirect()->route('login', [ 'message' => $message ]);
		// return redirect('login')->with('message',$message);
        return redirect()->back()->withInput()->with('message', $message);
    	
    }
}
