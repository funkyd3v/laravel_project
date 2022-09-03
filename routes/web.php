<?php

use App\Http\Controllers\Front\UrdanController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [
    'uses' => '\App\Http\Controllers\Front\UrdanController@index',
    'as' => '/'
]);

Route::get('/category-page/{id}', [
    'uses' => '\App\Http\Controllers\Front\UrdanController@categoryPage',
    'as' => 'category-page'
]);

// Route::get('/product-details', [
//     'uses' => '\App\Http\Controllers\Front\UrdanController@productDetailsPage',
//     'as' => 'product-details'
// ]);

Route::get('/product-details/{id}', [UrdanController::class, 'productDetailsPage'])->name('product-details');

Route::get('/get-product-info-for-modal', [
    'uses' => '\App\Http\Controllers\Front\UrdanController@getProductInfoForModal',
    'as' => 'get-product-info-for-modal'
]);

// cart routes 
Route::post('/add-to-cart', [
    'uses' => '\App\Http\Controllers\Front\CartController@addToCart',
    'as' => 'add-to-cart'
]);
Route::get('/view-cart', [
    'uses' => '\App\Http\Controllers\Front\CartController@viewCart',
    'as' => 'view-cart'
]);
Route::get('/remove-product-from-cart/{id}', [
    'uses' => '\App\Http\Controllers\Front\CartController@removeProductFromCart',
    'as' => 'remove-product-from-cart'
]);

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified'
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });

Route::get('/dashboard', [
    'uses' => '\App\Http\Controllers\Admin\AdminController@index',
    'as' => 'dashboard',
    'middleware' => ['auth:sanctum', 'verified'],
]);

Route::group(['middleware' => ['auth:sanctum', 'verified']], function() {
    // category routes
    Route::get('/add-category', [
        'uses' => '\App\Http\Controllers\Admin\CategoryController@addCategory',
        'as' => 'add-category',
    ]);
    Route::post('/new-category', [
        'uses' => '\App\Http\Controllers\Admin\CategoryController@newCategory',
        'as' => 'new-category',
    ]);
    Route::get('/manage-category', [
        'uses' => '\App\Http\Controllers\Admin\CategoryController@manageCategory',
        'as' => 'manage-category',
    ]);
    Route::get('/edit-category/{id}', [
        'uses' => '\App\Http\Controllers\Admin\CategoryController@editCategory',
        'as' => 'edit-category',
    ]);
    Route::post('/update-category', [
        'uses' => '\App\Http\Controllers\Admin\CategoryController@updateCategory',
        'as' => 'update-category',
    ]);
    Route::get('/delete-category/{id}', [
        'uses' => '\App\Http\Controllers\Admin\CategoryController@deleteCategory',
        'as' => 'delete-category',
    ]);

    // subcategory routes
    Route::get('/add-subcategory', [
        'uses' => '\App\Http\Controllers\Admin\SubCategoryController@addSubCategory',
        'as' => 'add-subcategory',
    ]);
    Route::post('/new-subcategory', [
        'uses' => '\App\Http\Controllers\Admin\SubCategoryController@newSubCategory',
        'as' => 'new-subcategory',
    ]);
    Route::get('/manage-subcategory', [
        'uses' => '\App\Http\Controllers\Admin\SubCategoryController@manageSubCategory',
        'as' => 'manage-subcategory',
    ]);
    Route::get('/edit-subcategory/{id}', [
        'uses' => '\App\Http\Controllers\Admin\SubCategoryController@editSubCategory',
        'as' => 'edit-subcategory',
    ]);
    Route::post('/update-subcategory', [
        'uses' => '\App\Http\Controllers\Admin\SubCategoryController@updateSubCategory',
        'as' => 'update-subcategory',
    ]);
    Route::get('/delete-subcategory/{id}', [
        'uses' => '\App\Http\Controllers\Admin\SubCategoryController@deleteSubCategory',
        'as' => 'delete-subcategory',
    ]);

    // brand routes
    Route::get('/add-brand', [
        'uses' => '\App\Http\Controllers\Admin\BrandController@addBrand',
        'as' => 'add-brand',
    ]);
    Route::post('/new-brand', [
        'uses' => '\App\Http\Controllers\Admin\BrandController@newBrand',
        'as' => 'new-brand',
    ]);
    Route::get('/manage-brand', [
        'uses' => '\App\Http\Controllers\Admin\BrandController@manageBrand',
        'as' => 'manage-brand',
    ]);
    Route::get('/edit-brand/{id}', [
        'uses' => '\App\Http\Controllers\Admin\BrandController@editBrand',
        'as' => 'edit-brand',
    ]);
    Route::post('/update-brand', [
        'uses' => '\App\Http\Controllers\Admin\BrandController@updateBrand',
        'as' => 'update-brand',
    ]);
    Route::get('/delete-brand/{id}', [
        'uses' => '\App\Http\Controllers\Admin\BrandController@deleteBrand',
        'as' => 'delete-brand',
    ]);

    // unit routes
    Route::get('/add-unit',[
        'uses' => '\App\Http\Controllers\Admin\UnitController@addUnit',
        'as' => 'add-unit',
    ]);
    Route::post('/new-unit', [
        'uses' => '\App\Http\Controllers\Admin\UnitController@newUnit',
        'as' => 'new-unit',
    ]);

    // products route
    Route::get('/add-product', [
        'uses' => '\App\Http\Controllers\Admin\ProductController@addProduct',
        'as' => 'add-product',
    ]);
    Route::post('/new-product', [
        'uses' => '\App\Http\Controllers\Admin\ProductController@newProduct',
        'as' => 'new-product',
    ]);
    Route::get('/get-sub-category-by-category-id/{id}', [
        'uses' => '\App\Http\Controllers\Admin\ProductController@getCategoryId',
        'as' => 'get-sub-category-by-category-id',
    ]);
});