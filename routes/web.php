<?php

use App\Http\Controllers\ModuleController;
use App\Http\Controllers\WebController;
use Illuminate\Support\Facades\Route;

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

Route::get('/module', [ModuleController::class,'index']);
Route::get('/module/delete/{id}', [ModuleController::class,'delete'])->name('delete');
Route::get('/module/create', [ModuleController::class,'create'])->name('create_module_form');
Route::post('/module/create', [ModuleController::class,'store'])->name('create_module');




Route::get('/web',[WebController::class,'index']);
Route::get('/web/delete/{id}',[WebController::class,'delete'])->name('web_delete');
Route::get('/web/crete',[WebController::class,'create'])->name('web_create');
Route::post('/web/crete',[WebController::class,'store'])->name('web_store');



