<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\CRegion;

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

Route::get('/', [\App\Http\Controllers\Controller::class, 'index']); 

Route::resource('admin', AdminController::class)->only([
    'index', 'create', 'show', 'edit', 'update', 'destroy'
]);

Route::get('login', [\App\Http\Controllers\AdminController::class, 'login'])->name('login');
Route::post('login', [\App\Http\Controllers\AdminController::class, 'loginAction'])->name('login.action');
Route::get('logout',[\App\Http\Controllers\AdminController::class,'logout'])->name('logout.action');

Route::get('/Region', [\App\Http\Controllers\CRegion::class, 'list']);
Route::post('/Insert_Region', [\App\Http\Controllers\CRegion::class, 'store']);



