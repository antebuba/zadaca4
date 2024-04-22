<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\EmployeesController;

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

Route::resource('/categories', CategoryController::class);
Route::get('/category/{CategoryID}/edit', [CategoryController::class, 'edit'])->name('category.edit');
Route::delete('/categories/{CategoryID}', [CategoryController::class, 'destroy'])->name('categories.destroy');
Route::put('/categories/{CategoryID}', [CategoryController::class, 'update'])->name('categories.update');


Route::resource('/customers', CustomersController::class);
Route::get('/customer/{CustomerID}/edit', [CustomersController::class, 'edit'])->name('customer.edit');
Route::delete('/customers/{CustomerID}', [CustomersController::class, 'destroy'])->name('customers.destroy');
Route::put('/customers/{CustomerID}', [CustomersController::class, 'update'])->name('customers.update');


Route::resource('/employees', EmployeesController::class);
Route::get('/employ/{EmployeeID}/edit', [EmployeesController::class, 'edit'])->name('employ.edit');
Route::delete('/employees/{EmployeeID}', [EmployeesController::class, 'destroy'])->name('employees.destroy');
Route::put('/emoloyees/{EmployeeID}', [EmployeesController::class, 'update'])->name('employees.update');
