<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\Api\CustomerController as ApiCustomerController;

# User Routes
Route::get('/', function () {
    return redirect()->route('customers.index');
});
Route::resource('customers', CustomerController::class);
Route::get('/customermap', [CustomerController::class, 'map'])->name('customers.map');

# API Routes
Route::get('/getcustomers', [ApiCustomerController::class, 'index']);
Route::post('/storecustomers', [ApiCustomerController::class, 'store']);
Route::put('/updatecustomers/{id}', [ApiCustomerController::class, 'update']);
