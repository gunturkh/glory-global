<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::fallback(function () {
    abort(404);
});

Route::group(['middleware' => ['web']], function () {

	Route::get('/', 'UserController@getWelcome')->name('welcome');

	Route::post('signup', [
		'uses' => 'UserController@postSignUp',
		'as' => 'signup',
		// 'middleware' => 'auth'
	]);

	Route::get('products/{product_id}', 'ProductController@getItems')->name('getItemsFromProduct');

	Route::get('welcome', 'UserController@getWelcome')->name('welcome');

	Route::get('login', function () {
	    return view('login');
	})->name('login');

	Route::get('about', [
		'uses' => 'MainController@getAbout',
		'as' => 'about'
	]);

	Route::get('layanan', [
		'uses' => 'MainController@getLayanan',
		'as' => 'layanan'
	]);

	Route::get('transaksi', [
		'uses' => 'MainController@getTransaksi',
		'as' => 'transaksi'
	]);	

	Route::get('faq', [
		'uses' => 'MainController@getFaq',
		'as' => 'faq'
	]);	

	Route::get('contact-us', [
		'uses' => 'MainController@getContact',
		'as' => 'contact-us'
	]);	

	Route::get('produk', [
		'uses' => 'MainController@getProduk',
		'as' => 'produk'
	]);	

	Route::get('search', [
		'uses' => 'ItemController@getSearch',
		'as' => 'search'
	]);

	Route::get('search-kategori/{slug}', 'ItemController@getItemsByProduct')->name('search-kategori');

	Route::get('search-subkategori/{slug}', [
		'uses' => 'ItemController@getItemsByCategory',
		'as' => 'search-subkategori'
	]);

	Route::get('lihat-produk/{slug}', [
		'uses' => 'ItemController@getItemsBySlug',
		'as' => 'lihat-produk'
	]);

	Route::get('search-produk/{slug}', [
		'uses' => 'ItemController@getItemsBySubCategory',
		'as' => 'search-produk'
	]);

	// Route::get('filter/{keyword}', [
	// 	'uses' => 'ItemController@filterProduct',
	// 	'as' => 'filter',
	// ]);

	Route::get('search-item', [
		'uses' => 'ItemController@searchItem',
		'as' => 'search',
	]);

	Route::get('view-kategori/{slug}', [
		'uses' => 'MainController@viewKategori',
		'as' => 'view-kategori'
	]);

	Route::get('view-subkategori/{slug}', [
		'uses' => 'MainController@viewSubKategori',
		'as' => 'view-sub-kategori'
	]);

	Route::get('view-produk/{slug}', [
		'uses' => 'MainController@viewProduk',
		'as' => 'view-produk'
	]);



	Route::get('product/{slug}', [
		'uses' => 'ItemController@getViewProduct',
		'as' => 'view-product',
	]);

	Route::get('logout', [
		'uses' => 'UserController@logout',
		'as' => 'logout',
		'middleware' => 'auth'
	]);

	Route::post('add-produk', [
		'uses' => 'ProductController@addSubCategories',
		'as' => 'add-produk',
		'middleware' => 'auth'
	]);	

	Route::post('update-produk', [
		'uses' => 'ProductController@updateSubCategories',
		'as' => 'update-produk',
		'middleware' => 'auth'
	]);	

	Route::post('delete-produk', [
		'uses' => 'ProductController@deleteSubCategories',
		'as' => 'delete-produk',
		'middleware' => 'auth'
	]);

	Route::post('add-sub-category', [
		'uses' => 'ProductController@addCategory',
		'as' => 'add-sub-category',
		'middleware' => 'auth'
	]);	

	Route::post('update-sub-category', [
		'uses' => 'ProductController@updateCategory',
		'as' => 'update-sub-category',
		'middleware' => 'auth'
	]);	

	Route::post('delete-sub-category', [
		'uses' => 'ProductController@deleteCategory',
		'as' => 'delete-sub-category',
		'middleware' => 'auth'
	]);

	Route::post('add-category', [
		'uses' => 'ProductController@addProduct',
		'as' => 'add-category',
		'middleware' => 'auth'
	]);	

	Route::post('update-category', [
		'uses' => 'ProductController@updateProduct',
		'as' => 'update-category',
		'middleware' => 'auth'
	]);	

	Route::post('delete-category', [
		'uses' => 'ProductController@deleteProduct',
		'as' => 'delete-category',
		'middleware' => 'auth'
	]);

	Route::get('kategori', [
		'uses' => 'ProductController@getKategori',
		'as' => 'kategori',
		'middleware' => 'auth'
	]);	

	Route::get('sub-kategori', [
		'uses' => 'ProductController@getSubKategori',
		'as' => 'sub-kategori',
		'middleware' => 'auth'
	]);	

	Route::get('get-produk', [
		'uses' => 'ProductController@getProduk',
		'as' => 'get-produk',
		'middleware' => 'auth'
	]);	

	Route::post('signin', [
		'uses' => 'UserController@postSignIn',
		'as' => 'signin',
	]);

	Route::get('dashboard', [
		'uses' => 'UserController@getDashboard',
		'as' => 'admin.dashboard',
		'middleware' => 'auth'
	]);

	Route::get('item', [
		'uses' => 'ItemController@getItem',
		'as' => 'item',
		'middleware' => 'auth'
	]);

	Route::get('update-item/{item_id}', [
		'uses' => 'ItemController@getUpdateItem',
		'as' => 'update-item',
		'middleware' => 'auth'
	]);

	Route::get('add-item', [
		'uses' => 'ItemController@getAddItem',
		'as' => 'add-item',
		'middleware' => 'auth'
	]);

	Route::get('account', [
		'uses' => 'UserController@getAccount',
		'as' => 'account',
		'middleware' => 'auth'
	]);

	Route::post('account', [
		'uses' => 'UserController@postUpdateAccount',
		'as' => 'account',
		'middleware' => 'auth'
	]);

	Route::post('update-item/{item_id}', [
		'uses' => 'ItemController@postUpdateItem',
		'as' => 'update-item',
		'middleware' => 'auth'
	]);

	Route::post('add-item', [
		'uses' => 'ItemController@postAddItem',
		'as' => 'add-item',
		'middleware' => 'auth'
	]);

	Route::post('delete-item', [
		'uses' => 'ItemController@deleteItem',
		'as' => 'delete-item',
		'middleware' => 'auth',
	]);

	Route::get('/test', function()
	{
	    return view('test', ['name' => 'Andrew']);
	});
});


// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
