<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashBoardController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ProductModelController;


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

Route::get('/', function () {
    return view('welcome');
});

Route::get("/home",[HomeController::class,"showHomePage"]);
Route::get("dashboard",[DashBoardController::class,"index"])->name('dashboard');
Route::get("report",[DashBoardController::class,"dasboard_report"]);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {

    /*Product Category Routing */
    Route::get("/product_category",[ProductCategoryController::class,"create"])->name("product_category");
    Route::post("/product_category",[ProductCategoryController::class,"store"])->name("category-save");
    Route::get("/product_edit/{id}",[ProductCategoryController::class,"edit"])->name("edit");
    Route::put("/product_edit/{id}",[ProductCategoryController::class,"update"])->name("update");
    Route::delete("/product_delete/{id}",[ProductCategoryController::class,"destroy"])->name("delete");
    Route::get("/product_view/{id}",[ProductCategoryController::class,"show"])->name("show");   
    
    /*Product Brand Routing */
    Route::get("product_brand",[BrandController::class,"create"])->name("product_brand");
    Route::post("store_brand",[BrandController::class,"store"])->name("store_brand");   
    Route::get("view_brand/{id}",[BrandController::class,"show"])->name("view_brand");
    Route::get("edit_brand/{id}",[BrandController::class,"edit"])->name("edit_brand");
    Route::put("update_brand/{id}",[BrandController::class,"update"])->name("update_brand");
    Route::delete("delete_brand/{id}",[BrandController::class,"destroy"])->name("delete_brand");
    
    /*Product Model Routing */
    Route::get("productModel",[ProductModelController::class,"create"])->name("productModel");
    Route::post("store_productModel",[ProductModelController::class,"store"])->name("store_productModel");
    Route::get("view_productModel/{id}",[ProductModelController::class,"show"])->name("view_productModel");
    Route::get("edit_productModel/{id}",[ProductModelController::class,"edit"])->name("edit_productModel");
    Route::put("update_productModel/{id}",[ProductModelController::class,"update"])->name("update_productModel");
    Route::delete("delete_productModel/{id}",[ProductModelController::class,"destroy"])->name("delete_productModel");

    /*Product Routing */
    Route::get("product",[ProductController::class,"index"])->name("product");
    Route::post("product",[ProductController::class,"store"])->name("product.store");
    Route::get("manage_product",[ProductController::class,"show"])->name("manage_product");
    Route::get("view_product/{id}",[ProductController::class,"view_product"])->name("view_product");
    Route::get("edit_product/{id}",[ProductController::class,"edit"])->name("edit_product");
    Route::put("update_product/{id}",[ProductController::class,"update"])->name("update_product");
    Route::delete("delete_product/{id}",[ProductController::class,"destroy"])->name("delete_product");
   

});
