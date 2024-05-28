<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerCustomerDemoController;
use App\Http\Controllers\CustomerDemographicsController;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\EmployeeTerritoriesController;
use App\Http\Controllers\OrderDetailsController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\ShippersController;
use App\Http\Controllers\SuppliersController;
use App\Http\Controllers\TerritoriesController;
use App\Models\CustomerCustomerDemo;
use App\Models\CustomerDemographics;

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
Route::get('/employees/{EmployeeID}/edit', [EmployeesController::class, 'edit'])->name('employees.edit');
Route::delete('/employees/{EmployeeID}', [EmployeesController::class, 'destroy'])->name('employees.destroy');
Route::put('/employees/{EmployeeID}', [EmployeesController::class, 'update'])->name('employees.update');

Route::resource('/region', RegionController::class);
Route::get('/regionn/{RegionID}/edit', [RegionController::class, 'edit'])->name('regionn.edit');
Route::delete('/region/{RegionID}', [RegionController::class, 'destroy'])->name('region.destroy');
Route::put('/region/{RegionID}', [RegionController::class, 'update'])->name('region.update');

Route::resource('/shippers', ShippersController::class);
Route::get('/shipper/{ShipperID}/edit', [ShippersController::class, 'edit'])->name('shipper.edit');
Route::delete('/shippers/{ShipperID}', [ShippersController::class, 'destroy'])->name('shippers.destroy');
Route::put('/shippers/{ShipperID}', [ShippersController::class, 'update'])->name('shippers.update');


Route::resource('/suppliers', SuppliersController::class);
Route::get('/supplier/{SupplierID}/edit', [SuppliersController::class, 'edit'])->name('supplier.edit');
Route::delete('/suppliers/{SupplierID}', [SuppliersController::class, 'destroy'])->name('suppliers.destroy');
Route::put('/suppliers/{SupplierID}', [SuppliersController::class, 'update'])->name('suppliers.update');


Route::resource('/orders', OrdersController::class);
Route::get('/order/{OrderID}/edit', [OrdersController::class, 'edit'])->name('order.edit');
Route::delete('/orders/{OrderID}', [OrdersController::class, 'destroy'])->name('orders.destroy');
Route::put('/orders/{OrderID}', [OrdersController::class, 'update'])->name('orders.update');


Route::resource('/territories', TerritoriesController::class);
Route::get('/territory/{TerritoryID}/edit', [TerritoriesController::class, 'edit'])->name('territory.edit');
Route::delete('/territories/{TerritoryID}', [TerritoriesController::class, 'destroy'])->name('territories.destroy');
Route::put('/territories/{TerritoryID}', [TerritoriesController::class, 'update'])->name('territories.update');


Route::resource('/products', ProductsController::class);
Route::get('/product/{ProductID}/edit', [ProductsController::class, 'edit'])->name('product.edit');
Route::delete('/products/{ProductID}', [ProductsController::class, 'destroy'])->name('products.destroy');
Route::put('/products/{ProductID}', [ProductsController::class, 'update'])->name('products.update');



Route::resource('/orderdetails', OrderDetailsController::class);
Route::get('/orderdetail/{OrderID}/edit', [OrderDetailsController::class, 'edit'])->name('orderdetail.edit');
Route::delete('/orderdetails/{OrderID}', [OrderDetailsController::class, 'destroy'])->name('orderdetails.destroy');
Route::put('/orderdetails/{OrderID}', [OrderDetailsController::class, 'update'])->name('orderdetails.update');

//Route::get('/customerdemographics', [CustomerDemographicsController::class, 'index']);
Route::resource('/customerdemographics', CustomerDemographicsController::class);
Route::get('/customerdemographic/{CustomerTypeID}/edit', [CustomerDemographicsController::class, 'edit'])->name('customerdemographic.edit');
Route::delete('/customerdemographics/{CustomerTypeID}', [CustomerDemographicsController::class, 'destroy'])->name('customerdemographics.destroy');
Route::put('/customerdemographics/{CustomerTypeID}', [CustomerDemographicsController::class, 'update'])->name('customerdemographics.update');


Route::resource('/customercustomerdemo', CustomerCustomerDemoController::class);
Route::get('/customercustomerdemoo/{CustomerTypeID}/edit', [CustomerCustomerDemoController::class, 'edit'])->name('customercustomerdemoo.edit');
Route::delete('/customercustomerdemo/{CustomerTypeID}', [CustomerCustomerDemoController::class, 'destroy'])->name('customercustomerdemo.destroy');
Route::put('/customercustomerdemo/{CustomerTypeID}', [CustomerCustomerDemoController::class, 'update'])->name('customercustomerdemo.update');


Route::resource('/employeeterritories', EmployeeTerritoriesController::class);
Route::get('/employeeterritory/{EmployeeID}/edit', [EmployeeTerritoriesController::class, 'edit'])->name('employeeterritory.edit');
Route::delete('/employeeterritories/{EmployeeID}', [EmployeeTerritoriesController::class, 'destroy'])->name('employeeterritories.destroy');
Route::put('/employeeterritories/{EmployeeID}', [EmployeeTerritoriesController::class, 'update'])->name('employeeterritories.update');
