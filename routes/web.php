<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Brand\BrandController;
use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\SubCategory\SubCategoryController;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';













// Admin Part Start



Route::get('/admin/login',[AdminController::class,'AdminLoginFrom']);
Route::post('/admin/login',[AdminController::class,'AdminLogin'])->name('admin.login');

Route::middleware(['auth','role:admin'])->group(function(){


Route::get('/admin/dashboard',[AdminController::class,'AdminDashboard'])->name('admin.dashboard');

Route::get('/admin/profile',[AdminController::class,'AdminProfile'])->name('admin.profile');

Route::post('/admin/profile/store',[AdminController::class,'AdminProfileStore'])->name('admin.profile.store');

Route::get('/admin/logout',[AdminController::class,'AdminLogout'])->name('admin.logout');

}); // end Admin middleware group


// Category Part


Route::get('/category/create',[CategoryController::class,'createCategory'])->name('create.category');
Route::post('/category/store',[CategoryController::class,'storeCategory'])->name('store.category');

Route::get('/category/all',[CategoryController::class,'allCategory'])->name('all.category');

Route::get('/category/delete/{id}',[CategoryController::class,'DeleteCategory'])->name('delete.category');


// SubCategory Part
Route::get('/subcategory/create',[SubCategoryController::class,'createSubCategory'])->name('create.subcategory');
Route::post('/subcategory/store',[SubCategoryController::class,'storeSubCategory'])->name('store.subcategory');

Route::get('/subcategory/all',[SubCategoryController::class,'allSubCategory'])->name('all.subcategory');

Route::get('/subcategory/ajax/{category_id}',[SubCategoryController::class,'GetSubCategory']);
//Route::get('/subcategory/ajax/{category_id}' , 'GetSubCategory');


// SubCategory Part
Route::get('/brand/create',[BrandController::class,'createBrand'])->name('create.brand');
Route::post('/brand/store',[BrandController::class,'StoreBrand'])->name('store.brand');

Route::get('/brand/all',[BrandController::class,'allBrand'])->name('all.brand');
Route::get('/brand/delete/{id}',[BrandController::class,'DeleteBrand'])->name('delete.brand');



// Product Part
Route::get('/product/create',[ProductController::class,'createProduct'])->name('create.product');
Route::post('/product/store',[ProductController::class,'storeProduct'])->name('store.product');

Route::get('/product/all',[ProductController::class,'allProduct'])->name('all.product');