<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CustomersController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\ProductsController;



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});




// Prikazuje sve proizvode
Route::get('/products', [ProductsController::class, 'index']);

// Dodaje novi proizvod
Route::post('/products', [ProductsController::class, 'store']);

// Prikazuje određeni proizvod
Route::get('/products/{ProductID}', [ProductsController::class, 'show']);

// Ažurira određeni proizvod
Route::put('/product/{ProductID}', [ProductsController::class, 'update']);

// Briše određeni proizvod
Route::delete('/products/{ProductID}', [ProductsController::class, 'destroy']);




// Prikazuje sve proizvode
Route::get('/customers', [CustomersController::class, 'index']);

// Dodaje novi proizvod
Route::post('/customers', [CustomersController::class, 'store']);

// Prikazuje određeni proizvod
Route::get('/customers/{CustomerID}', [CustomersController::class, 'show']);

// Ažurira određeni proizvod
Route::put('/customer/{CustomerID}', [CustomersController::class, 'update']);

// Briše određeni proizvod
Route::delete('/customers/{CustomerID}', [CustomersController::class, 'destroy']);





// Prikazuje sve proizvode
Route::get('/orders', [OrdersController::class, 'index']);

// Dodaje novi proizvod
Route::post('/orders', [OrdersController::class, 'store']);

// Prikazuje određeni proizvod
Route::get('/orders/{OrderID}', [OrdersController::class, 'show']);

// Ažurira određeni proizvod
Route::put('/order/{OrderID}', [OrdersController::class, 'update']);

// Briše određeni proizvod
Route::delete('/orders/{OrderID}', [OrdersController::class, 'destroy']);
