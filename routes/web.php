<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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



Route::get('/',[HomeController::class,'index']);

Route::post('/add_recipe',[HomeController::class,'add_recipe']);

Route::get('show_recipe',[HomeController::class,'show_recipe']);

Route::get('delete_recipe/{id}',[HomeController::class,'delete_recipe']);

Route::get('update_recipe/{id}', [HomeController::class,'update_recipe']);

Route::post('edit_recipe/{id}', [HomeController::class,'edit_recipe']);

Route::get('/search', [HomeController::class, 'search'])->name('search');

