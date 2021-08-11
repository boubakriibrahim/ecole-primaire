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
    return view('welcome');
});

Route::get('/test', function () {
    return view('test');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/admin/logout', [AdminController::class, 'Logout'])->name('admin.logout');

// user managment

Route::prefix('admin')->group(function(){

    Route::get('/view', [UserController::class, 'UserView'])->name('admin.view');
    Route::get('/add', [UserController::class, 'UserAdd'])->name('admins.add');
    Route::post('/store', [UserController::class, 'AdminStore'])->name('admins.store');
    Route::get('/edit/{id}', [UserController::class, 'UserEdit'])->name('admin.edit');
    Route::post('/miseajour/{id}', [UserController::class, 'AdminUpdate'])->name('admin.miseajour');
    Route::get('/effacer/{id}', [UserController::class, 'AdminDelete'])->name('admin.delete');

});

Route::prefix('maitre')->group(function(){

    Route::get('/view', [UserController::class, 'UserView'])->name('maitre.view');
    Route::get('/add', [UserController::class, 'UserAdd'])->name('maitres.add');
    Route::post('/store', [UserController::class, 'MaitreStore'])->name('maitres.store');
    Route::get('/edit/{id}', [UserController::class, 'UserEdit'])->name('maitre.edit');
    Route::post('/miseajour/{id}', [UserController::class, 'MaitreUpdate'])->name('maitre.miseajour');
    Route::get('/effacer/{id}', [UserController::class, 'MaitreDelete'])->name('maitre.delete');

});

Route::prefix('eleve')->group(function(){

    Route::get('/view', [UserController::class, 'UserView'])->name('eleve.view');
    Route::get('/add', [UserController::class, 'UserAdd'])->name('eleves.add');
    Route::post('/store', [UserController::class, 'EleveStore'])->name('eleves.store');
    Route::get('/edit/{id}', [UserController::class, 'UserEdit'])->name('eleve.edit');
    Route::post('/miseajour/{id}', [UserController::class, 'EleveUpdate'])->name('eleve.miseajour');
    Route::get('/effacer/{id}', [UserController::class, 'EleveDelete'])->name('eleve.delete');

});