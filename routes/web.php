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

Route::get('/', function () {
    return view('home.userpage');
});


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


route::get('/show_categories',[ AdminController::class,'show_categories']);

route::post('/add_category',[AdminController::class,'add_categories']);




// route::get('/view_product',[ AdminController::class,'view_product']);
// route::get('/view_product',[ AdminController::class,'view_product']);
// route::get('/view_product',[ AdminController::class,'view_product']);
// route::get('/view_product',[ AdminController::class,'view_product']);

route::get('/redirect',[HomeController::class,'redirect']);
route::get('/show_product',[HomeController::class,'show_product']);

