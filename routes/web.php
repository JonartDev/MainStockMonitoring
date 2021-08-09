<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StocksController;
use App\Http\Controllers\StockRequestController;
use App\Http\Controllers\FileMaintenanceController;
use App\Http\Controllers\Auth\LoginController;

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

// Route::get('/', function () {
//     return view('auth.login');
// });

Auth::routes();
    Route::get('/logout', [LoginController::class, 'logout']);

// navbar tab
    Route::get('/', [HomeController::class, 'index'])->name('home');

// Home
    Route::get('/admin/joborder', [HomeController::class, 'joborder'])->name('joborder');
    Route::get('/admin/assembly', [HomeController::class, 'assembly'])->name('assembly');
    Route::get('/admin/pullout', [HomeController::class, 'pullout'])->name('pullout');
    Route::get('/admin/stockrequest', [HomeController::class, 'stockrequest'])->name('stockrequest');
    Route::get('/admin/filemaintenance', [HomeController::class, 'filemaintenance'])->name('filemaintenance');
    Route::get('/admin/users', [HomeController::class, 'users'])->name('users');

    Route::get('/homes',[HomeController::class,'homes']);
    Route::get('admin/userss',[HomeController::class,'userss']);

// Stocks
    Route::get('/stocks', [StocksController::class, 'stocks'])->name('stocks');
    Route::any('stocks/save',[StocksController::class,'store'])->name('stock.save');
    Route::any('stocks/update',[StocksController::class,'update'])->name('stock.update');
    Route::get('stockss',[StocksController::class,'stockss']);

    Route::get('/items',[StocksController::class,'items']);
    Route::get('/addStockitem',[StocksController::class,'addStockitem']);
    Route::get('/itemstrans',[StocksController::class,'itemstrans']);
    Route::get('/locations',[StocksController::class,'locations']);
    Route::get('/stocksAvailable',[StocksController::class,'stocksAvailable']);
    Route::get('/stockItem',[StocksController::class,'stockItem']);

// Stock Request
    Route::get('/admin/stockrequest', [StockRequestController::class, 'stocks'])->name('stocks');
    Route::get('/itemsreq', [StockRequestController::class, 'items'])->name('items');
    Route::post('/saveRequest',[StockRequestController::class,'saveRequest']);
    Route::get('/requestDetails', [StockRequestController::class, 'requestDetails']);
    Route::get('/deleteRequest', [StockRequestController::class, 'deleteRequest']);
    Route::any('/approvedRequest',[StockRequestController::class,'approvedRequest']);
    Route::any('/receivedRequest',[StockRequestController::class,'receivedRequest']);
    Route::any('/saveRequesttoStocks',[StockRequestController::class,'saveRequesttoStocks']);
    
//File maintenance
    Route::get('/admin/filemaintenance', [FileMaintenanceController::class, 'item'])->name('item');
    Route::get('/admin/filemaintenance/client', [FileMaintenanceController::class, 'client'])->name('client');
    //API
    Route::get('/itemtranss', [FileMaintenanceController::class, 'itemtranss'])->name('itemtranss');
    Route::any('/itemtrans/save',[FileMaintenanceController::class,'addtrans'])->name('trans.save');
    Route::get('/Fitems', [FileMaintenanceController::class, 'items'])->name('items');
    Route::get('/suppliers', [FileMaintenanceController::class, 'suppliers'])->name('suppliers');
    Route::any('/supplier/save',[FileMaintenanceController::class,'addSupplier'])->name('supplier.save');
    Route::any('/supplier/update',[FileMaintenanceController::class,'updateSupplier'])->name('supplier.update');
    Route::any('/items/save',[FileMaintenanceController::class,'addItem'])->name('items.save');
    Route::get('/clients', [FileMaintenanceController::class, 'clients'])->name('clients');
    Route::any('/client/save',[FileMaintenanceController::class,'addClient'])->name('client.save');
    Route::any('/client/update',[FileMaintenanceController::class,'updateClient'])->name('client.update');


// Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
