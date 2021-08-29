<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ensController;
use App\Http\Controllers\MatiereController;
use App\Http\Controllers\SalleController;
use App\Http\Controllers\AffEnsController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\eleveController;
use App\Http\Controllers\listClassController;
use App\Http\Controllers\abscenceController;
use App\Http\Controllers\ecoleController;
use App\Http\Controllers\ensgController;
use App\Http\Controllers\ClasseController;
use App\Http\Controllers\EmploiController;
use App\Http\Controllers\SeanceController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaperController;
use App\Http\Controllers\noteController;
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


Route::get('/login',[LoginController::class, 'showLoginForm'])->name('login');

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/admin/logout', [AdminController::class, 'Logout'])->name('admin.logout');

Route::prefix('profil')->group(function(){

    Route::get('/',[ProfilController::class, 'AdminData'])->name('profil')->middleware('auth');
    Route::put('/miseajour/{id}', [ProfilController::class, 'ProfileUpdate'])->name('profil.miseajour')->middleware('auth');
    Route::post('/password/{id}', [ProfilController::class, 'ProfileUpdatePassword'])->name('profil.password')->middleware('auth');
});

Route::prefix('ecole')->group(function(){

    Route::get('/',[ecoleController::class, 'EcoleData'])->name('ecole')->middleware('auth');
    Route::put('/miseajour', [ecoleController::class, 'EcoleUpdate'])->name('ecole.miseajour')->middleware('auth');

});


Route::prefix('Enseignant')->group(function(){

    Route::get('/view', [ensgController::class, 'EnsView'])->name('Ens.view')->middleware('auth');
    Route::post('/store', [ensgController::class, 'EnsStore'])->name('Ens.store')->middleware('auth');
    Route::post('/miseajour/{id}', [ensgController::class, 'EnsUpdate'])->name('Ens.miseajour')->middleware('auth');

    Route::get('/effacer/{id}', [ensgController::class, 'EnsDelete'])->name('Ens.delete')->middleware('auth');

});


Route::prefix('Classe')->group(function(){

    Route::get('/view', [ClasseController::class, 'ClasseView'])->name('classe.view')->middleware('auth');

    Route::post('/store', [ClasseController::class, 'ClasseStore'])->name('classe.store')->middleware('auth');
    Route::post('/miseajour/{id}', [ClasseController::class, 'ClasseUpdate'])->name('classe.miseajour')->middleware('auth');

    Route::get('/effacer/{id}', [ClasseController::class, 'ClasseDelete'])->name('classe.delete')->middleware('auth');

});

Route::prefix('Matiere')->group(function(){

    Route::get('/view', [MatiereController::class, 'MatiereView'])->name('matiere.view')->middleware('auth');

    Route::post('/store', [MatiereController::class, 'MatiereStore'])->name('matiere.store')->middleware('auth');
    Route::post('/miseajour/{id}', [MatiereController::class, 'MatiereUpdate'])->name('matiere.miseajour')->middleware('auth');

    Route::get('/effacer/{id}', [MatiereController::class, 'MatiereDelete'])->name('matiere.delete')->middleware('auth');

});

Route::prefix('Salle')->group(function(){

    Route::get('/view', [SalleController::class, 'SalleView'])->name('salle.view')->middleware('auth');

    Route::post('/store', [SalleController::class, 'SalleStore'])->name('salle.store')->middleware('auth');
    Route::post('/miseajour/{id}', [SalleController::class, 'SalleUpdate'])->name('salle.miseajour')->middleware('auth');

    Route::get('/effacer/{id}', [SalleController::class, 'SalleDelete'])->name('salle.delete')->middleware('auth');

});


Route::prefix('Seance')->group(function(){

    Route::get('/view', [SeanceController::class, 'SeanceView'])->name('seance.view')->middleware('auth');

    Route::post('/store', [SeanceController::class, 'SeanceStore'])->name('seance.store')->middleware('auth');
    Route::post('/miseajour/{id}', [SeanceController::class, 'SeanceUpdate'])->name('seance.miseajour')->middleware('auth');

    Route::get('/effacer/{id}', [SeanceController::class, 'SeanceDelete'])->name('seance.delete')->middleware('auth');

});

Route::prefix('affectationEnseignant')->group(function(){

    Route::get('/view', [AffEnsController::class, 'AffEnsView'])->name('affEns.view')->middleware('auth');
    Route::get('/add', [AffEnsController::class, 'AffEnsAdd'])->name('AffEns.add')->middleware('auth');
    Route::post('/store', [AffEnsController::class, 'AffEnsStore'])->name('AffEns.store')->middleware('auth');
    Route::get('/edit/{id}', [AffEnsController::class, 'AffEnsEdit'])->name('AffEns.edit')->middleware('auth');
    Route::post('/miseajour/{id}', [AffEnsController::class, 'AffEnsUpdate'])->name('AffEns.miseajour')->middleware('auth');
    Route::get('/effacer/{id}', [AffEnsController::class, 'AffEnsDelete'])->name('AffEns.delete')->middleware('auth');

});



Route::prefix('Emplois')->group(function(){

    Route::get('/view/classes', [EmploiController::class, 'EmploiClassesView'])->name('emploi.view.classes')->middleware('auth');

    Route::get('/view/enseignants', [EmploiController::class, 'EmploiEnseignantsView'])->name('emploi.view.enseignants')->middleware('auth');

    Route::post('/select', [EmploiController::class, 'EmploiSelect'])->name('emploi.select')->middleware('auth');

    Route::get('/add/classes', [EmploiController::class, 'EmploiClassesAdd'])->name('emploi.add.classes')->middleware('auth');

    Route::get('/add/enseignants', [EmploiController::class, 'EmploiEnseignantsAdd'])->name('emploi.add.enseignants')->middleware('auth');

    Route::post('/store/enseignant', [EmploiController::class, 'EmploiEnseignantStore'])->name('emploi.store.enseignant')->middleware('auth');

    Route::post('/store/classe', [EmploiController::class, 'EmploiClasseStore'])->name('emploi.store.classe')->middleware('auth');

    Route::get('/effacer/{id}', [EmploiController::class, 'EmploiDelete'])->name('emploi.delete')->middleware('auth');

    Route::get('/view/one/{id}', [EmploiController::class, 'EmploiViewOne'])->name('emploi.view.one')->middleware('auth');


});

Route::get('/monEmploi', [EmploiController::class, 'monEmploi'])->name('mon.emploi')->middleware('auth');



Route::prefix('eleve')->group(function(){

    Route::get('/view', [eleveController::class, 'eleveView'])->name('eleve.view')->middleware('auth');

    Route::post('/store', [eleveController::class, 'eleveStore'])->name('eleve.store')->middleware('auth');

    Route::post('/miseajour/{id}', [eleveController::class, 'eleveUpdate'])->name('eleve.miseajour')->middleware('auth');

    Route::get('/effacer/{id}', [eleveController::class, 'eleveDelete'])->name('eleve.delete')->middleware('auth');

    Route::get('/notes/{id}', [eleveController::class, 'eleveNotes'])->name('eleve.notes')->middleware('auth');

});


Route::prefix('list')->group(function(){

    Route::get('/listClasses', [listClassController::class, 'listClasses'])->name('classes.view')->middleware('auth');

    Route::get('/creeClasse/{id}', [listClassController::class, 'listView'])->name('list.view')->middleware('auth');
    Route::get('/checkList/{id}', [listClassController::class, 'listCheck'])->name('list.check')->middleware('auth');

    Route::post('/store/{id}', [listClassController::class, 'listStore'])->name('list.store')->middleware('auth');

    Route::get('/edit/{id}', [listClassController::class, 'editList'])->name('list.edit')->middleware('auth');

    Route::post('/modifier/{id}', [listClassController::class, 'updateList'])->name('list.miseajour')->middleware('auth');

});
Route::prefix('abscence')->group(function(){
    Route::get('/abscence/{id}', [abscenceController::class, 'abscenceView'])->name('abscence.view')->middleware('auth');

    Route::get('/creeClasse/{id}', [listClassController::class, 'listView'])->name('list.view')->middleware('auth');
    Route::get('/checkList/{id}', [listClassController::class, 'listCheck'])->name('list.check')->middleware('auth');

    Route::post('/store/{id}', [abscenceController::class, 'abscenceStore'])->name('abscence.store')->middleware('auth');

    Route::get('/edit/{id}', [listClassController::class, 'editList'])->name('list.edit')->middleware('auth');

    Route::post('/modifier/{id}', [listClassController::class, 'updateList'])->name('list.miseajour')->middleware('auth');

});

Route::prefix('note')->group(function(){

    Route::get('/noteView/{id}', [noteController::class, 'noteView'])->name('note.view')->middleware('auth');

    Route::get('/checkNote/{id}', [noteController::class, 'noteCheck'])->name('note.check')->middleware('auth');

    Route::post('/store/{id}', [noteController::class, 'noteStore'])->name('note.store')->middleware('auth');

    Route::get('/edit/{id}', [noteController::class, 'editNote'])->name('note.edit')->middleware('auth');

    Route::post('/modifier/{id}', [noteController::class, 'noteUpdate'])->name('note.miseajour')->middleware('auth');

});


Route::prefix('paper')->group(function(){

    Route::get('/view', [PaperController::class, 'PaperView'])->name('paper.view')->middleware('auth');

    Route::get('/download/{file}', [PaperController::class, 'PaperDownload'])->name('paper.download')->middleware('auth');
    Route::get('/view/{file}', [PaperController::class, 'PaperViewOne'])->name('paper.viewone')->middleware('auth');

    Route::put('/store', [PaperController::class, 'PaperStore'])->name('paper.store')->middleware('auth');
    Route::get('/effacer/{id}', [PaperController::class, 'PaperDelete'])->name('paper.delete')->middleware('auth');

});
