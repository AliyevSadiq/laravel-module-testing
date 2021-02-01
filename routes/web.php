<?php

use App\Http\Controllers\ModuleController;
use App\Http\Controllers\SettingsController;
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

Route::get('/module', [ModuleController::class,'index'])->name('module_list');
Route::get('/module/delete/{id}', [ModuleController::class,'delete'])->name('delete');
Route::get('/module/setting/{id}', [ModuleController::class,'setting'])->name('module_settings');
Route::put('/module/setting/', [ModuleController::class,'moduleSetting'])->name('module_settings_store');
Route::get('/module/create', [ModuleController::class,'create'])->name('create_module_form');
Route::post('/module/create', [ModuleController::class,'store'])->name('create_module');




Route::get('/web',[WebController::class,'index']);
Route::get('/web/delete/{id}',[WebController::class,'delete'])->name('web_delete');
Route::get('/web/crete',[WebController::class,'create'])->name('web_create');
Route::post('/web/crete',[WebController::class,'store'])->name('web_store');



Route::get('/settings',[SettingsController::class,'index'])->name('settings_list');
Route::get('/settings/delete/{id}',[SettingsController::class,'delete'])->name('settings_delete');
Route::get('/settings/create',[SettingsController::class,'create'])->name('settings_create');
Route::post('/settings/create',[SettingsController::class,'store'])->name('settings_store');



