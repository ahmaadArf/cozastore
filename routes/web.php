<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Site\SiteController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SizeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductImageController;

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

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function(){
    Route::get('/',[AdminController::class,'index'])->name('index');

    //categories
    Route::get('categories/trash', [CategoryController::class, 'trash'])->name('categories.trash');
    Route::get('categories/{id}/restore', [CategoryController::class, 'restore'])->name('categories.restore');
    Route::delete('categories/{id}/forcedelete', [CategoryController::class, 'forcedelete'])->name('categories.forcedelete');
    Route::resource('categories',CategoryController::class);

    //sliders
    Route::get('sliders/trash', [SliderController::class, 'trash'])->name('sliders.trash');
    Route::get('sliders/{id}/restore', [SliderController::class, 'restore'])->name('sliders.restore');
    Route::delete('sliders/{id}/forcedelete', [SliderController::class, 'forcedelete'])->name('sliders.forcedelete');
    Route::resource('sliders',SliderController::class);

    //products
    Route::get('products/trash', [ProductController::class, 'trash'])->name('products.trash');
    Route::get('products/{id}/restore', [ProductController::class, 'restore'])->name('products.restore');
    Route::delete('products/{id}/forcedelete', [ProductController::class, 'forcedelete'])->name('products.forcedelete');
    Route::resource('products',ProductController::class);

    //colors
    Route::get('colors/trash', [ColorController::class, 'trash'])->name('colors.trash');
    Route::get('colors/{id}/restore', [ColorController::class, 'restore'])->name('colors.restore');
    Route::delete('colors/{id}/forcedelete', [ColorController::class, 'forcedelete'])->name('colors.forcedelete');
    Route::resource('colors',ColorController::class);

    //sizes
    Route::get('sizes/trash', [SizeController::class, 'trash'])->name('sizes.trash');
    Route::get('sizes/{id}/restore', [SizeController::class, 'restore'])->name('sizes.restore');
    Route::delete('sizes/{id}/forcedelete', [SizeController::class, 'forcedelete'])->name('sizes.forcedelete');
    Route::resource('sizes',SizeController::class);

    //images
    Route::resource('productImages',ProductImageController::class);

    //User
    Route::resource('users',UserController::class);

    //Role
    Route::resource('roles',RoleController::class);
});

Route::get('/',[SiteController::class,'index'])->name('site.index');
Route::get('about',[SiteController::class,'about'])->name('site.about');
Route::get('product-detail/{id}',[SiteController::class,'product_detail'])->name('site.product_detail');
Route::get('category-detail/{id}',[SiteController::class,'category_detail'])->name('site.category_detail');
Route::get('contact',[SiteController::class,'contact'])->name('site.contact');
Route::get('product',[SiteController::class,'product'])->name('site.product');
Route::get('cart',[SiteController::class,'cart'])->name('site.cart');
Route::post('add-to-cart',[SiteController::class,'add_to_cart'])->name('site.add_to_cart');
Route::post('add-review',[SiteController::class,'add_review'])->name('site.add_review');
Route::get('search',[SiteController::class,'search'])->name('site.search');
Route::post('add-to-favorite',[SiteController::class,'add_to_favorite'])->name('site.add_to_favorite');


require __DIR__.'/auth.php';

