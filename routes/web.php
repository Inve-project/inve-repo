<?php

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
Auth::routes();

Route::get('/', function () {
    // return view('welcome');
    return view('auth.login');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'dashboard'])->name('dashboard');

  /*                              Rawmaterial Route
                     ##########################################*/
Route::get('/RawmaterialCategory', [App\Http\Controllers\Rawmaterial\RawmaterialCategoryController::class, 'RawmaterialCategory']);
Route::post('/AddRawmaterialCategory', [App\Http\Controllers\Rawmaterial\RawmaterialCategoryController::class, 'AddRawmaterialCategory']);
Route::get('/ListRawmaterialCategory', [App\Http\Controllers\Rawmaterial\RawmaterialCategoryController::class, 'ListRawmaterialCategory']);
Route::get('/editRawmaterialCategory/{id}', [App\Http\Controllers\Rawmaterial\RawmaterialCategoryController::class, 'editRawmaterialCategory']);
Route::get('/deleteRawmaterialCategory/{id}', [App\Http\Controllers\Rawmaterial\RawmaterialCategoryController::class, 'deleteRawmaterialCategory']);
Route::post('/updateRawmaterialCategory/{id}', [App\Http\Controllers\Rawmaterial\RawmaterialCategoryController::class, 'updateRawmaterialCategory']);

Route::get('/RawmaterialUnits', [App\Http\Controllers\Rawmaterial\RawmaterialUnitsController::class, 'RawmaterialUnits']);
Route::post('/AddRawmaterialUnits', [App\Http\Controllers\Rawmaterial\RawmaterialUnitsController::class, 'AddRawmaterialUnits']);
Route::get('/ListRawmaterialUnits', [App\Http\Controllers\Rawmaterial\RawmaterialUnitsController::class, 'ListRawmaterialUnits']);
Route::get('/editRawmaterialUnits/{id}', [App\Http\Controllers\Rawmaterial\RawmaterialUnitsController::class, 'editRawmaterialUnits']);
Route::get('/deleteRawmaterialUnits/{id}', [App\Http\Controllers\Rawmaterial\RawmaterialUnitsController::class, 'deleteRawmaterialUnits']);
Route::post('/updateRawmaterialUnits/{id}', [App\Http\Controllers\Rawmaterial\RawmaterialUnitsController::class, 'updateRawmaterialUnits']);

Route::get('/Rawmaterial', [App\Http\Controllers\Rawmaterial\RawmaterialController::class, 'Rawmaterial']);
Route::post('/AddRawmaterial', [App\Http\Controllers\Rawmaterial\RawmaterialController::class, 'AddRawmaterial']);
Route::get('/ListRawmaterial', [App\Http\Controllers\Rawmaterial\RawmaterialController::class, 'ListRawmaterial']);
Route::get('/editRawmaterial/{id}', [App\Http\Controllers\Rawmaterial\RawmaterialController::class, 'editRawmaterial']);
Route::get('/deleteRawmaterial/{id}', [App\Http\Controllers\Rawmaterial\RawmaterialController::class, 'deleteRawmaterial']);
Route::post('/updateRawmaterial/{id}', [App\Http\Controllers\Rawmaterial\RawmaterialController::class, 'updateRawmaterial']);




 /*                               Product Route
                     ##########################################*/
Route::get('/ProductCategory', [App\Http\Controllers\Product\ProductCategoryController::class, 'ProductCategory']);
Route::post('/AddProductCategory', [App\Http\Controllers\Product\ProductCategoryController::class, 'AddProductCategory']);
Route::get('/ListProductCategory', [App\Http\Controllers\Product\ProductCategoryController::class, 'ListProductCategory']);
Route::get('/editProductCategory/{id}', [App\Http\Controllers\Product\ProductCategoryController::class, 'editProductCategory']);
Route::get('/deleteProductCategory/{id}', [App\Http\Controllers\Product\ProductCategoryController::class, 'deleteProductCategory']);
Route::post('/updateProductCategory/{id}', [App\Http\Controllers\Product\ProductCategoryController::class, 'updateProductCategory']);

Route::get('/Product', [App\Http\Controllers\Product\ProductController::class, 'Product']);
Route::post('/AddProduct', [App\Http\Controllers\Product\ProductController::class, 'AddProduct']);
Route::get('/ListProduct', [App\Http\Controllers\Product\ProductController::class, 'ListProduct']);
Route::get('/editProduct/{id}', [App\Http\Controllers\Product\ProductController::class, 'editProduct']);
Route::get('/deleteProduct/{id}', [App\Http\Controllers\Product\ProductController::class, 'deleteProduct']);
Route::post('/updateProduct/{id}', [App\Http\Controllers\Product\ProductController::class, 'updateProduct']);

Route::get('/ProductUnits', [App\Http\Controllers\Product\ProductUnitsController::class, 'ProductUnits']);
Route::post('/AddProductUnits', [App\Http\Controllers\Product\ProductUnitsController::class, 'AddProductUnits']);
Route::get('/ListProductUnits', [App\Http\Controllers\Product\ProductUnitsController::class, 'ListProductUnits']);
Route::get('/editProductUnits/{id}', [App\Http\Controllers\Product\ProductUnitsController::class, 'editProductUnits']);
Route::get('/deleteProductUnits/{id}', [App\Http\Controllers\Product\ProductUnitsController::class, 'deleteProductUnits']);
Route::post('/updateProductUnits/{id}', [App\Http\Controllers\Product\ProductUnitsController::class, 'updateProductUnits']);



  /*                               Payment Route
                     ##########################################*/
Route::get('/Payment', [App\Http\Controllers\Payment\PaymentController::class, 'Payment']);
Route::post('/AddPayment', [App\Http\Controllers\Payment\PaymentController::class, 'AddPayment']);
Route::get('/ListPayment', [App\Http\Controllers\Payment\PaymentController::class, 'ListPayment']);
Route::get('/viewPayment/{id}', [App\Http\Controllers\Payment\PaymentController::class, 'viewPayment']);



  /*                               UsedRawmaterial Route
                   ##########################################*/
Route::get('/UsedRawmaterial', [App\Http\Controllers\UsedRawmaterial\UsedRawmaterialController::class, 'UsedRawmaterial']);
Route::post('/AddUsedRawmaterial', [App\Http\Controllers\UsedRawmaterial\UsedRawmaterialController::class, 'AddUsedRawmaterial']);
Route::get('/ListUsedRawmaterial', [App\Http\Controllers\UsedRawmaterial\UsedRawmaterialController::class, 'ListUsedRawmaterial']);
Route::get('/viewUsedRawmaterial/{id}', [App\Http\Controllers\UsedRawmaterial\UsedRawmaterialController::class, 'viewUsedRawmaterial']);



  /*                               manufactured
                   ##########################################*/
Route::get('/ManufacturedProduct', [App\Http\Controllers\Manufactured\ManufacturedProductController::class, 'ManufacturedProduct']);
Route::post('/AddManufacturedProduct', [App\Http\Controllers\Manufactured\ManufacturedProductController::class, 'AddManufacturedProduct']);
Route::get('/ListManufacturedProduct', [App\Http\Controllers\Manufactured\ManufacturedProductController::class, 'ListManufacturedProduct']);



  /*                             Request Product
                   ##########################################*/
Route::get('/RequestProduct', [App\Http\Controllers\Request\RequestProductController::class, 'RequestProduct']);
Route::post('/AddRequestProduct', [App\Http\Controllers\Request\RequestProductController::class, 'AddRequestProduct']);
Route::get('/ListRequestProduct', [App\Http\Controllers\Request\RequestProductController::class, 'ListRequestProduct']);




Route::get('logs', [\Rap2hpoutre\LaravelLogViewer\LogViewerController::class, 'index']);