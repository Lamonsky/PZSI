<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PrintersModelsController;
use App\Http\Controllers\PrintersInventoryController;
use App\Http\Controllers\LocationsController;
use App\Http\Controllers\RentingController;
use App\Http\Controllers\InvoicesController;
use App\Http\Controllers\SuppliesController;
use App\Http\Controllers\ContractorsController;
use App\Http\Controllers\RepairsController;
use App\Http\Controllers\ShopsController;

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get("/", [HomeController::class, "index"]);


Route::get('/printers-models',[PrintersModelsController::class, 'index'])->name('printersmodels.index');
Route::get('/printers-models/create',[PrintersModelsController::class, 'create']);
Route::post('/printers-models/add-to-db',[PrintersModelsController::class, 'addToDb']);
Route::get('/printers-models/edit/{id}',[PrintersModelsController::class, 'edit']);
Route::post('/printers-models/update/{id}',[PrintersModelsController::class, 'update']);
Route::get('/printers-models/delete/{id}',[PrintersModelsController::class, 'delete']);


Route::get('/contractors',[ContractorsController::class, 'index'])->name('contractors.index');
Route::get('/contractors/create',[ContractorsController::class, 'create']);
Route::post('/contractors/add-to-db',[ContractorsController::class, 'addToDb']);
Route::get('/contractors/edit/{id}',[ContractorsController::class, 'edit']);
Route::post('/contractors/update/{id}',[ContractorsController::class, 'update']);
Route::get('/contractors/delete/{id}',[ContractorsController::class, 'delete']);



Route::get('/shops',[ShopsController::class, 'index'])->name('shops.index');
Route::get('/shops/create',[ShopsController::class, 'create']);
Route::post('/shops/add-to-db',[ShopsController::class, 'addToDb']);
Route::get('/shops/edit/{id}',[ShopsController::class, 'edit']);
Route::post('/shops/update/{id}',[ShopsController::class, 'update']);
Route::get('/shops/delete/{id}',[ShopsController::class, 'delete']);


Route::get('/printers-inventory',[PrintersInventoryController::class, 'index'])->name('printersinventory.index');
Route::get('/printers-inventory/create',[PrintersInventoryController::class, 'create']);
Route::post('/printers-inventory/add-to-db',[PrintersInventoryController::class, 'addToDb']);
Route::get('/printers-inventory/edit/{id}',[PrintersInventoryController::class, 'edit']);
Route::post('/printers-inventory/update/{id}',[PrintersInventoryController::class, 'update']);
Route::get('/printers-inventory/delete/{id}',[PrintersInventoryController::class, 'delete']);


Route::get('/locations',[LocationsController::class, 'index'])->name('locations.index');
Route::get('/locations/create',[LocationsController::class, 'create']);
Route::post('/locations/add-to-db',[LocationsController::class, 'addToDb']);
Route::get('/locations/edit/{id}',[LocationsController::class, 'edit']);
Route::post('/locations/update/{id}',[LocationsController::class, 'update']);
Route::get('/locations/delete/{id}',[LocationsController::class, 'delete']);


Route::get('/renting',[RentingController::class, 'index'])->name('renting.index');
Route::get('/renting/create',[RentingController::class, 'create']);
Route::post('/renting/add-to-db',[RentingController::class, 'addToDb']);
Route::get('/renting/edit/{id}',[RentingController::class, 'edit']);
Route::post('/renting/update/{id}',[RentingController::class, 'update']);
Route::get('/renting/delete/{id}',[RentingController::class, 'delete']);

Route::get('/invoices',[InvoicesController::class, 'index'])->name('invoices.index');
Route::get('/invoices/create',[InvoicesController::class, 'create']);
Route::post('/invoices/add-to-db',[InvoicesController::class, 'addToDb']);
Route::get('/invoices/edit/{id}',[InvoicesController::class, 'edit']);
Route::post('/invoices/update/{id}',[InvoicesController::class, 'update']);
Route::get('/invoices/delete/{id}',[InvoicesController::class, 'delete']);

Route::get('/repairs',[RepairsController::class, 'index'])->name('repairs.index');
Route::get('/repairs/create',[RepairsController::class, 'create']);
Route::post('/repairs/add-to-db',[RepairsController::class, 'addToDb']);
Route::get('/repairs/edit/{id}',[RepairsController::class, 'edit']);
Route::post('/repairs/update/{id}',[RepairsController::class, 'update']);
Route::get('/repairs/delete/{id}',[RepairsController::class, 'delete']);


Route::get('/supplies',[SuppliesController::class, 'index'])->name('supplies.index');
Route::get('/supplies/create',[SuppliesController::class, 'create']);
Route::post('/supplies/add-to-db',[SuppliesController::class, 'addToDb']);
Route::get('/supplies/edit/{id}',[SuppliesController::class, 'edit']);
Route::post('/supplies/update/{id}',[SuppliesController::class, 'update']);
Route::get('/supplies/delete/{id}',[SuppliesController::class, 'delete']);