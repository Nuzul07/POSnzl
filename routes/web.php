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

Route::get('/', function () {
    return redirect()->route('home');
});

Auth::routes();

Route::group(["middleware" => "auth"], function () {
    Route::get('home', 'HomeController@index')->name('home');
    Route::resource('profile', 'ProfileController',['only' => ['index','update']]);
});

Route::group(["middleware" => ["admutama","auth"]], function () {
    Route::resource("informasiToko", "InformasiTokoController");
    Route::resource("users", "UserController");
});

Route::group(["middleware" => ["admgudang","auth"]], function () {
    Route::resource("currencies", "CurrencyController", ['only' => ['index', 'store', 'update', 'destroy']]);
    Route::resource("ppn", "PpnController", ['only' => ['index', 'store', 'update', 'destroy']]);
    Route::resource("units", "UnitController", ['only' => ['index', 'store', 'update', 'destroy']]);
    Route::resource("profit", "ProfitPercentageController", ['only' => ['index', 'store', 'update', 'destroy']]);
    Route::resource("category", "CategoryController", ['only' => ['index', 'store', 'update', 'destroy']]);
    Route::resource("product", "ProductController");
    Route::resource("emptyProduct", "EmptyProductController");
    Route::resource("productIn", "ProductInController", ['only' => 'index']);
});

Route::group(["middleware" => ["kasir","auth"]], function () {
    Route::resource('transaction', 'TransactionController');
    Route::resource("product", "ProductController");
    Route::get('clean', 'TransactionController@clean')->name('clean');
    Route::resource('transactionDetail', 'TranscationDetailController');
    Route::resource('invoice', 'InvoiceController');
});

Route::group(["prefix" => "export"], function () {
    Route::get('/pdfuser', 'UserController@pdf')->name('pdfuser');
    Route::get('/pdfcategory', 'CategoryController@pdf')->name('pdfcategory');
    Route::get('/pdfcurrency', 'CurrencyController@pdf')->name('pdfcurrency');
    Route::get('/pdfunit', 'UnitController@pdf')->name('pdfunit');
    Route::get('/pdfemptyProduct', 'EmptyProductController@pdf')->name('pdfemptyProduct');
    Route::get('/pdfppn', 'PpnController@pdf')->name('pdfppn');
    Route::get('/pdfproduct', 'ProductController@pdf')->name('pdfproduct');
    Route::get('/pdfproductIn', 'ProductInController@pdf')->name('pdfproductIn');
    Route::get('/pdfprofit', 'ProfitPercentageController@pdf')->name('pdfprofit');
    Route::get('/pdfhistory', 'InvoiceController@pdf')->name('pdfhistory');
});