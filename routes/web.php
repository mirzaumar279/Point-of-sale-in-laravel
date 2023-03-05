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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
//product
Route::get('productview','App\Http\Controllers\ProductController@show');
Route::get('productdelete/{id}','App\Http\Controllers\ProductController@destroy');
Route::get('productadd','App\Http\Controllers\ProductController@create');
Route::post('productsubmit','App\Http\Controllers\ProductController@store');
Route::get('productdetail/{id}','App\Http\Controllers\ProductController@index');

//Product Orders
Route::get('orderview','App\Http\Controllers\OrderController@show');
Route::get('orderdelete/{id}','App\Http\Controllers\OrderController@destroy');
Route::get('orderdeleteall','App\Http\Controllers\OrderController@delete');
Route::get('orderadd','App\Http\Controllers\OrderController@create');
Route::post('ordersubmit','App\Http\Controllers\OrderController@store');
// Route::get('orderedit/{id}','App\Http\Controllers\OrderController@edit');
// Route::post('orderupdate/{id}','App\Http\Controllers\OrderController@update');

//print
Route::get('printview','App\Http\Controllers\PrintController@show');
Route::get('returnprintview','App\Http\Controllers\PrintController@returnprint');

//history
Route::get('historyview','App\Http\Controllers\HistoryController@show');


//transaction
Route::get('transactionview','App\Http\Controllers\TransactionController@show');
Route::post('transactionsubmit','App\Http\Controllers\OrderController@transactionstore');
Route::get('transactionprint/{id}','App\Http\Controllers\TransactionController@index');

//vendor
Route::get('vendorview','App\Http\Controllers\VendorController@show');
Route::get('vendoradd','App\Http\Controllers\VendorController@create');
Route::post('vendorsubmit','App\Http\Controllers\VendorController@store');
Route::get('vendoredit/{id}','App\Http\Controllers\VendorController@edit');
Route::post('vendorupdate/{id}','App\Http\Controllers\VendorController@update');
Route::get('vendordelete/{id}','App\Http\Controllers\VendorController@destroy');
Route::get('vendordetail/{id}','App\Http\Controllers\VendorController@index');

//inventory
Route::get('inventoryview','App\Http\Controllers\InventoryController@show');
Route::get('inventoryadd','App\Http\Controllers\InventoryController@create');
Route::post('inventorysubmit','App\Http\Controllers\InventoryController@store');

//returnproduct
Route::get('returnview','App\Http\Controllers\ReturnproductController@show');
Route::get('returndelete/{id}','App\Http\Controllers\ReturnproductController@destroy');
Route::get('returndeleteall','App\Http\Controllers\ReturnproductController@delete');
Route::get('returnadd','App\Http\Controllers\ReturnproductController@create');
Route::post('returnsubmit','App\Http\Controllers\ReturnproductController@store');


//return transaction
Route::get('returntransactionview','App\Http\Controllers\ReturntransactionController@show');
Route::post('returntransactionsubmit','App\Http\Controllers\ReturnproductController@transactionstore');
Route::get('returntransactionprint/{id}','App\Http\Controllers\ReturntransactionController@index');

//return history
Route::get('returnhistoryview','App\Http\Controllers\ReturnhistoryController@show');

//asigned
Route::get('assignedview','App\Http\Controllers\AssignedController@show');
Route::get('assignedadd','App\Http\Controllers\AssignedController@create');
Route::post('assignedsubmit','App\Http\Controllers\AssignedController@store');
Route::get('assigneddelete/{id}','App\Http\Controllers\AssignedController@destroy');

//purchaseinvoiceitems
Route::get('purchaseinvoiceitemview','App\Http\Controllers\PurchaseinvoiceitemController@show');
Route::get('purchaseinvoiceitemadd','App\Http\Controllers\PurchaseinvoiceitemController@create');
Route::post('purchaseinvoiceitemsubmit','App\Http\Controllers\PurchaseinvoiceitemController@store');
Route::get('purchaseinvoiceitemdelete/{id}','App\Http\Controllers\PurchaseinvoiceitemController@destroy');

//purchaseinvoice
Route::get('purchaseinvoiceview','App\Http\Controllers\PurchaseinvoiceController@show');
Route::get('purchaseinvoiceadd','App\Http\Controllers\PurchaseinvoiceController@create');
Route::post('purchaseinvoicesubmit','App\Http\Controllers\PurchaseinvoiceController@store');
Route::get('purchaseinvoicedelete/{id}','App\Http\Controllers\PurchaseinvoiceController@destroy');