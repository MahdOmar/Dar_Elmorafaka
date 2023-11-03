<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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
    return view('auth/login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/structures', [App\Http\Controllers\StructureController::class, 'index'])->name('structure');
Route::get('/structures/create', [App\Http\Controllers\StructureController::class, 'create'])->name('structure.create');

Route::post('/structures/store', [App\Http\Controllers\StructureController::class, 'store'])->name('structure.store');
Route::post('/structures/{id}/delete', [App\Http\Controllers\StructureController::class, 'destroy'])->name('structure.delete');

Route::get('/structures/{id}/show', [App\Http\Controllers\StructureController::class, 'show'])->name('structure.show');
Route::patch('/structures/{id}/update', [App\Http\Controllers\StructureController::class, 'update'])->name('structure.update');
Route::post('/structures/{id}/reset', [App\Http\Controllers\StructureController::class, 'reset'])->name('structure.reset');
Route::post('/structures/changerpwd', [App\Http\Controllers\StructureController::class, 'changer'])->name('structure.changer');
Route::get('/structures/changelayout', [App\Http\Controllers\StructureController::class, 'changerly'])->name('structure.changelayout');








Route::get('/orientation', [App\Http\Controllers\OrientationController::class, 'index'])->name('orientation');


// Projects Routes
// Route::get('/inscription', [App\Http\Controllers\InscriptionController::class, 'index'])->name('project');
// Route::get('/inscription/create', [App\Http\Controllers\InscriptionController::class, 'create'])->name('project.inscription');
// Route::post('/inscription/store', [App\Http\Controllers\InscriptionController::class, 'store'])->name('project.store');
// Route::get('/inscription/edit', [App\Http\Controllers\InscriptionController::class, 'edit'])->name('project.edit');

Route::resource('projet',App\Http\Controllers\InscriptionController::class);
Route::get('/projet/{id}/show', [App\Http\Controllers\InscriptionController::class, 'show'])->name('projet.show');
Route::get('/projet/{id}/participants', [App\Http\Controllers\InscriptionController::class, 'membre'])->name('projet.membre');
Route::post('/projet/orienter', [App\Http\Controllers\InscriptionController::class, 'orienter'])->name('projet.orienter');
Route::post('/projet/valider', [App\Http\Controllers\InscriptionController::class, 'valider'])->name('projet.valider');

// Route::get('/projet/{id}/delete', [App\Http\Controllers\InscriptionController::class, 'destroy'])->name('projet.delete');




//Membre
 Route::post('/membre/store', [App\Http\Controllers\InscriptionController::class, 'membreStore'])->name('membre.store');
 Route::get('/membre/show', [App\Http\Controllers\InscriptionController::class, 'membreShow'])->name('membre.show');
 Route::post('/membre/{id}/delete', [App\Http\Controllers\InscriptionController::class, 'membreDelete'])->name('membre.delete');



 // Publicity 

 Route::get('/publicity', [App\Http\Controllers\OrientationController::class, 'index'])->name('publicity')->middleware('auth');
 Route::get('/publicity/create', [App\Http\Controllers\OrientationController::class, 'create'])->name('publicity.create')->middleware('auth');
 Route::post('/publicity/store', [App\Http\Controllers\OrientationController::class, 'store'])->name('publicity.store')->middleware('auth');
 Route::get('/publicity/{id}/show', [App\Http\Controllers\OrientationController::class, 'show'])->name('publicity.show')->middleware('auth');
 Route::get('/publicity/{id}/edit', [App\Http\Controllers\OrientationController::class, 'edit'])->name('publicity.edit')->middleware('auth');

 Route::patch('/publicity/{id}/update', [App\Http\Controllers\OrientationController::class, 'update'])->name('publicity.update')->middleware('auth');

 Route::delete('/publicity/{id}/delete', [App\Http\Controllers\OrientationController::class, 'destroy'])->name('publicity.delete')->middleware('auth');


 Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});




Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'dashboard'])->name('dashboard')->middleware('auth');



