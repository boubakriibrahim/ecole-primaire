<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\UserController;

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
    return view('admin/index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/admin/logout', [AdminController::class, 'Logout'])->name('admin.logout');

// user managment

Route::prefix('Enseignant')->group(function(){

    Route::get('/view', [App\Http\controllers\ensgController::class, 'EnsView'])->name('Ens.view');
    Route::get('/add', [App\Http\controllers\ensgController::class, 'EnsAdd'])->name('Ens.add');
    Route::post('/store', [App\Http\controllers\ensgController::class, 'EnsStore'])->name('Ens.store');

});
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('admin/index');
})->name('dashboard');
