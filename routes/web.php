<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\backend\UserController;
use App\Http\Controllers\ensController;
use App\Http\Controllers\MatiereController;
use App\Http\Controllers\SalleController;
use App\Http\Controllers\AffEnsController;
use App\Http\controllers\ProfilController;
use App\Http\controllers\eleveController;
use App\Http\controllers\listClassController;

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
    return view('test');
});

Route::get('/enseignant', function () {
    return view('enseignant/index');
});
Route::get('/test', function () {
    return view('welcome');
});


/* Route::get('/emploi', function () {
    return view('backend.view_emploi');
}); */


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/profil',[App\Http\controllers\ProfilController::class, 'AdminData'])->name('profil');


Route::get('/admin/logout', [AdminController::class, 'Logout'])->name('admin.logout');

// user managment

/* Route::prefix('admin')->group(function(){

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

}); */



Route::prefix('Enseignant')->group(function(){

    Route::get('/view', [App\Http\controllers\ensgController::class, 'EnsView'])->name('Ens.view');
    Route::post('/store', [App\Http\controllers\ensgController::class, 'EnsStore'])->name('Ens.store');
    Route::post('/miseajour/{id}', [App\Http\controllers\ensgController::class, 'EnsUpdate'])->name('Ens.miseajour');

    Route::get('/effacer/{id}', [App\Http\controllers\ensgController::class, 'EnsDelete'])->name('Ens.delete');

});


Route::prefix('Classe')->group(function(){

    Route::get('/view', [App\Http\controllers\ClasseController::class, 'ClasseView'])->name('classe.view');

    Route::post('/store', [App\Http\controllers\ClasseController::class, 'ClasseStore'])->name('classe.store');
    Route::post('/miseajour/{id}', [App\Http\controllers\ClasseController::class, 'ClasseUpdate'])->name('classe.miseajour');

    Route::get('/effacer/{id}', [App\Http\controllers\ClasseController::class, 'ClasseDelete'])->name('classe.delete');

});

Route::prefix('Matiere')->group(function(){

    Route::get('/view', [App\Http\controllers\MatiereController::class, 'MatiereView'])->name('matiere.view');

    Route::post('/store', [App\Http\controllers\MatiereController::class, 'MatiereStore'])->name('matiere.store');
    Route::post('/miseajour/{id}', [App\Http\controllers\MatiereController::class, 'MatiereUpdate'])->name('matiere.miseajour');

    Route::get('/effacer/{id}', [App\Http\controllers\MatiereController::class, 'MatiereDelete'])->name('matiere.delete');

});

Route::prefix('Salle')->group(function(){

    Route::get('/view', [App\Http\controllers\SalleController::class, 'SalleView'])->name('salle.view');

    Route::post('/store', [App\Http\controllers\SalleController::class, 'SalleStore'])->name('salle.store');
    Route::post('/miseajour/{id}', [App\Http\controllers\SalleController::class, 'SalleUpdate'])->name('salle.miseajour');

    Route::get('/effacer/{id}', [App\Http\controllers\SalleController::class, 'SalleDelete'])->name('salle.delete');

});


Route::prefix('Seance')->group(function(){

    Route::get('/view', [App\Http\controllers\SeanceController::class, 'SeanceView'])->name('seance.view');

    Route::post('/store', [App\Http\controllers\SeanceController::class, 'SeanceStore'])->name('seance.store');
    Route::post('/miseajour/{id}', [App\Http\controllers\SeanceController::class, 'SeanceUpdate'])->name('seance.miseajour');

    Route::get('/effacer/{id}', [App\Http\controllers\SeanceController::class, 'SeanceDelete'])->name('seance.delete');

});

Route::prefix('affectationEnseignant')->group(function(){

    Route::get('/view', [App\Http\controllers\AffEnsController::class, 'AffEnsView'])->name('affEns.view');
    Route::get('/add', [App\Http\controllers\AffEnsController::class, 'AffEnsAdd'])->name('AffEns.add');
    Route::post('/store', [App\Http\controllers\AffEnsController::class, 'AffEnsStore'])->name('AffEns.store');
    Route::get('/edit/{id}', [App\Http\controllers\AffEnsController::class, 'AffEnsEdit'])->name('AffEns.edit');
    Route::post('/miseajour/{id}', [App\Http\controllers\AffEnsController::class, 'AffEnsUpdate'])->name('AffEns.miseajour');
    Route::get('/effacer/{id}', [App\Http\controllers\AffEnsController::class, 'AffEnsDelete'])->name('AffEns.delete');

});



Route::prefix('Emplois')->group(function(){

    Route::get('/view/classes', [App\Http\controllers\EmploiController::class, 'EmploiClassesView'])->name('emploi.view.classes');

    Route::get('/view/enseignants', [App\Http\controllers\EmploiController::class, 'EmploiEnseignantsView'])->name('emploi.view.enseignants');

    Route::post('/select', [App\Http\controllers\EmploiController::class, 'EmploiSelect'])->name('emploi.select');

    Route::get('/add/classes', [App\Http\controllers\EmploiController::class, 'EmploiClassesAdd'])->name('emploi.add.classes');

    Route::get('/add/enseignants', [App\Http\controllers\EmploiController::class, 'EmploiEnseignantsAdd'])->name('emploi.add.enseignants');

    Route::post('/store/enseignant', [App\Http\controllers\EmploiController::class, 'EmploiEnseignantStore'])->name('emploi.store.enseignant');

    Route::post('/store/classe', [App\Http\controllers\EmploiController::class, 'EmploiClasseStore'])->name('emploi.store.classe');

    Route::get('/effacer/{id}', [App\Http\controllers\EmploiController::class, 'EmploiDelete'])->name('emploi.delete');

    Route::get('/view/one/{id}', [App\Http\controllers\EmploiController::class, 'EmploiViewOne'])->name('emploi.view.one');


});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('admin/index');
})->name('dashboard');


/*___________routes partie */


Route::prefix('eleve')->group(function(){

    Route::get('/view', [App\Http\controllers\eleveController::class, 'eleveView'])->name('eleve.view');

    Route::post('/store', [App\Http\controllers\eleveController::class, 'eleveStore'])->name('eleve.store');

    Route::post('/miseajour/{id}', [App\Http\controllers\eleveController::class, 'eleveUpdate'])->name('eleve.miseajour');

    Route::get('/effacer/{id}', [App\Http\controllers\eleveController::class, 'eleveDelete'])->name('eleve.delete');

});

Route::prefix('list')->group(function(){
    Route::get('/listClasses', [App\Http\controllers\listClassController::class, 'listClasses'])->name('classes.view');

    Route::get('/creeClasse/{id}', [App\Http\controllers\listClassController::class, 'listView'])->name('list.view');

    Route::post('/store', [App\Http\controllers\listClassController::class, 'listStore'])->name('list.store');

    Route::post('/miseajour/{id}', [App\Http\controllers\eleveController::class, 'eleveUpdate'])->name('eleve.miseajour');

    Route::get('/effacer/{id}', [App\Http\controllers\eleveController::class, 'eleveDelete'])->name('eleve.delete');

});