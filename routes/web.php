<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\CustomerController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::inertia('/', 'Home')->name('/');
Route::get('/customers', [CustomerController::class, 'customers']);

Route::post('/add', [CustomerController::class, 'add']);

Route::post('/updateCustomer', [CustomerController::class, 'updateCustomer']);

Route::delete('/deleteCustomer/{id}', [CustomerController::class, 'deleteCustomer'])->name('delete.customer');
