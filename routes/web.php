<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ensController;
use App\Http\Controllers\MatiereController;
use App\Http\Controllers\SalleController;
use App\Http\Controllers\AffEnsController;
use App\Http\controllers\ProfilController;
use App\Http\controllers\eleveController;
use App\Http\controllers\listClassController;
use App\Http\controllers\abscenceController;
use App\Http\controllers\ecoleController;
use App\Http\controllers\ensgController;
use App\Http\controllers\ClasseController;
use App\Http\controllers\EmploiController;
use App\Http\controllers\SeanceController;
use App\Http\controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;

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
    return view('backend.partie_Ens.abscenceView');
});

/* Auth::routes(); */

Route::get('/login',[LoginController::class, 'showLoginForm'])->name('login');

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/admin/logout', [AdminController::class, 'Logout'])->name('admin.logout');

Route::prefix('profil')->group(function(){

    Route::get('/',[ProfilController::class, 'AdminData'])->name('profil');
    Route::post('/miseajour/{id}', [ProfilController::class, 'ProfileUpdate'])->name('profil.miseajour');
    Route::post('/password/{id}', [ProfilController::class, 'ProfileUpdatePassword'])->name('profil.password');
});

Route::prefix('ecole')->group(function(){

    Route::get('/',[ecoleController::class, 'EcoleData'])->name('ecole');
    Route::put('/miseajour', [ecoleController::class, 'EcoleUpdate'])->name('ecole.miseajour');

});


Route::prefix('Enseignant')->group(function(){

    Route::get('/view', [ensgController::class, 'EnsView'])->name('Ens.view');
    Route::post('/store', [ensgController::class, 'EnsStore'])->name('Ens.store');
    Route::post('/miseajour/{id}', [ensgController::class, 'EnsUpdate'])->name('Ens.miseajour');

    Route::get('/effacer/{id}', [ensgController::class, 'EnsDelete'])->name('Ens.delete');

});


Route::prefix('Classe')->group(function(){

    Route::get('/view', [ClasseController::class, 'ClasseView'])->name('classe.view');

    Route::post('/store', [ClasseController::class, 'ClasseStore'])->name('classe.store');
    Route::post('/miseajour/{id}', [ClasseController::class, 'ClasseUpdate'])->name('classe.miseajour');

    Route::get('/effacer/{id}', [ClasseController::class, 'ClasseDelete'])->name('classe.delete');

});

Route::prefix('Matiere')->group(function(){

    Route::get('/view', [MatiereController::class, 'MatiereView'])->name('matiere.view');

    Route::post('/store', [MatiereController::class, 'MatiereStore'])->name('matiere.store');
    Route::post('/miseajour/{id}', [MatiereController::class, 'MatiereUpdate'])->name('matiere.miseajour');

    Route::get('/effacer/{id}', [MatiereController::class, 'MatiereDelete'])->name('matiere.delete');

});

Route::prefix('Salle')->group(function(){

    Route::get('/view', [SalleController::class, 'SalleView'])->name('salle.view');

    Route::post('/store', [SalleController::class, 'SalleStore'])->name('salle.store');
    Route::post('/miseajour/{id}', [SalleController::class, 'SalleUpdate'])->name('salle.miseajour');

    Route::get('/effacer/{id}', [SalleController::class, 'SalleDelete'])->name('salle.delete');

});


Route::prefix('Seance')->group(function(){

    Route::get('/view', [SeanceController::class, 'SeanceView'])->name('seance.view');

    Route::post('/store', [SeanceController::class, 'SeanceStore'])->name('seance.store');
    Route::post('/miseajour/{id}', [SeanceController::class, 'SeanceUpdate'])->name('seance.miseajour');

    Route::get('/effacer/{id}', [SeanceController::class, 'SeanceDelete'])->name('seance.delete');

});

Route::prefix('affectationEnseignant')->group(function(){

    Route::get('/view', [AffEnsController::class, 'AffEnsView'])->name('affEns.view');
    Route::get('/add', [AffEnsController::class, 'AffEnsAdd'])->name('AffEns.add');
    Route::post('/store', [AffEnsController::class, 'AffEnsStore'])->name('AffEns.store');
    Route::get('/edit/{id}', [AffEnsController::class, 'AffEnsEdit'])->name('AffEns.edit');
    Route::post('/miseajour/{id}', [AffEnsController::class, 'AffEnsUpdate'])->name('AffEns.miseajour');
    Route::get('/effacer/{id}', [AffEnsController::class, 'AffEnsDelete'])->name('AffEns.delete');

});



Route::prefix('Emplois')->group(function(){

    Route::get('/view/classes', [EmploiController::class, 'EmploiClassesView'])->name('emploi.view.classes');

    Route::get('/view/enseignants', [EmploiController::class, 'EmploiEnseignantsView'])->name('emploi.view.enseignants');

    Route::post('/select', [EmploiController::class, 'EmploiSelect'])->name('emploi.select');

    Route::get('/add/classes', [EmploiController::class, 'EmploiClassesAdd'])->name('emploi.add.classes');

    Route::get('/add/enseignants', [EmploiController::class, 'EmploiEnseignantsAdd'])->name('emploi.add.enseignants');

    Route::post('/store/enseignant', [EmploiController::class, 'EmploiEnseignantStore'])->name('emploi.store.enseignant');

    Route::post('/store/classe', [EmploiController::class, 'EmploiClasseStore'])->name('emploi.store.classe');

    Route::get('/effacer/{id}', [EmploiController::class, 'EmploiDelete'])->name('emploi.delete');

    Route::get('/view/one/{id}', [EmploiController::class, 'EmploiViewOne'])->name('emploi.view.one');


});

Route::get('/monEmploi', [EmploiController::class, 'monEmploi'])->name('mon.emploi');



Route::prefix('eleve')->group(function(){

    Route::get('/view', [eleveController::class, 'eleveView'])->name('eleve.view');

    Route::post('/store', [eleveController::class, 'eleveStore'])->name('eleve.store');

    Route::post('/miseajour/{id}', [eleveController::class, 'eleveUpdate'])->name('eleve.miseajour');

    Route::get('/effacer/{id}', [eleveController::class, 'eleveDelete'])->name('eleve.delete');

});

Route::prefix('list')->group(function(){
    Route::get('/listClasses', [listClassController::class, 'listClasses'])->name('classes.view');

    Route::get('/creeClasse/{id}', [listClassController::class, 'listView'])->name('list.view');
    Route::get('/checkList/{id}', [listClassController::class, 'listCheck'])->name('list.check');

    Route::post('/store/{id}', [listClassController::class, 'listStore'])->name('list.store');

    Route::get('/edit/{id}', [listClassController::class, 'editList'])->name('list.edit');

    Route::post('/modifier/{id}', [listClassController::class, 'updateList'])->name('list.miseajour');

});


Route::prefix('abscence')->group(function(){
    Route::get('/abscence/{id}', [abscenceController::class, 'abscenceView'])->name('abscence.view');

    Route::get('/creeClasse/{id}', [listClassController::class, 'listView'])->name('list.view');
    Route::get('/checkList/{id}', [listClassController::class, 'listCheck'])->name('list.check');

    Route::post('/store/{id}', [abscenceController::class, 'abscenceStore'])->name('abscence.store');

    Route::get('/edit/{id}', [listClassController::class, 'editList'])->name('list.edit');

    Route::post('/modifier/{id}', [listClassController::class, 'updateList'])->name('list.miseajour');

});
