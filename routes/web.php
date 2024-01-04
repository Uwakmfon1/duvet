<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

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
//     return view('home.userpage');
// });


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


route::get('/view_product',[AdminController::class,'view_product']);

route::post('/add_product',[AdminController::class,'add_product']);

route::get('/show_product',[ AdminController::class,'show_product']);

route::get('/show_categories',[ AdminController::class,'show_categories']);

route::post('/add_category',[AdminController::class,'add_categories']);

route::get('/delete_category/{id}',[AdminController::class,'delete_category']);

route::get('/update_product/{id}',[AdminController::class,'update_product']);

route::get('/delete_product/{id}',[AdminController::class,'delete_product']);

route::get('/update_product_confirm/{id}',[ AdminController::class,'update_product_confirm']);

route::get('show_orders',[AdminController::class,'show_orders']);

route::get('/order',[AdminController::class,'order']);







route::get('/',[HomeController::class,'index']);

route::get('/view_products',[HomeController::class,'view_products']);

route::get('/show_particular_item/{id}',[HomeController::class,'show_particular_item']);

route::get('/redirect',[HomeController::class,'redirect']);

Route::post('add_cart/{id}',[HomeController::class,'add_cart']);

route::get('/cart',[HomeController::class,'view_cart']);

route::get('/remove_cart/{id}',[HomeController::class,'remove_cart']);

route::get('/cash_order',[HomeController::class,'cash_order']);

route::get('/stripe/{totalPrice}',[HomeController::class,'stripe']);

Route::post('stripe/{totalPrice}',[HomeController::class,'stripePost'])->name('stripe.post');


