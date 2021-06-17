<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentsController;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Customers;
use App\Http\Livewire\Cart;
use App\Http\Livewire\Coaches;
use App\Http\Livewire\Product;
use App\Http\Livewire\Turnamens;


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

/*Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
*/

// Route::get('/home',[HomeController::class,'index'])->middleware(['auth:sanctum','verified']);
Route::group(['middleware'=>['auth:sanctum','verified']],
function(){
    Route::get('/dashboard',[HomeController::class,'dashboard'])->name('dashboard')->middleware(['auth:sanctum','verified',]);
    Route::resource('student',StudentsController::class);
    Route::get('/cari', [StudentsController::class, 'cari']);
    Route::get('/customer', Customers::class)->name('customer');
    Route::get('/product', Product::class)->name('product');
    Route::get('/cart', Cart::class)->name('cart');
    Route::get('/coach',Coaches::class)->name('coach');
    Route::get('/turnamen',Turnamens::class)->name('turnamen');
});


