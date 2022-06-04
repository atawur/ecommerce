<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashBoardController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductController;


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
Route::get("dashboard",[DashBoardController::class,"index"]);
Route::get("report",[DashBoardController::class,"dasboard_report"]);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {

    Route::get("/product_category",[ProductCategoryController::class,"create"])->name("product_category");
    Route::post("/product_category",[ProductCategoryController::class,"store"])->name("category-save");
    Route::get("/product_edit/{id}",[ProductCategoryController::class,"edit"])->name("edit");
    Route::put("/product_edit/{id}",[ProductCategoryController::class,"update"])->name("update");
    Route::delete("/product_delete/{id}",[ProductCategoryController::class,"destroy"])->name("delete");
    Route::get("/product_view/{id}",[ProductCategoryController::class,"show"])->name("show");
    Route::get("/product",[ProductController::class,"index"])->name("product");
    Route::get("/product_list",[ProductController::class,"all_product"])->name("product_list");
    Route::post("/product",[ProductController::class,"store"])->name("product.store");

});
