<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\RevisorController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [PublicController::class, 'welcome'])->name('welcome');
Route::get('/article/create', [ArticleController::class, 'create'])->middleware('auth')->name('article.create');
Route::get('/article/edit/{article}', [ArticleController::class, 'edit'])->name('article.edit');

Route::get('/categoria/{category}',[PublicController::class, 'categoryShow'])->name('categoryShow');

Route::get('/detail/article/{article}',[PublicController::class,'showArticle'])->name('showArticle');
Route::get('/tutti/annunci',[PublicController::class,'index'])->name('index');
// revisor
Route::post('/becomerevisor/submit',[RevisorController::class,'submit'])->middleware('auth')->name('becomerevisor.submit');


// home revisore 

Route::get('/revisor/home',[RevisorController::class, 'index'])->middleware('isRevisor')->name('revisor.index');

// accetta annuncio 

Route::patch('/accetta/annuncio/{article}',[RevisorController::class,'acceptArticle'])->middleware('isRevisor')->name('revisor.accept_articles');

// rifiuta annuncio 

Route::patch('/rifiuta/annuncio/{article}',[RevisorController::class,'rejectArticle'])->middleware('isRevisor')->name('revisor.reject_articles');


// richiedi di diventare revisore 

Route::get('/richiesta/revisore',[RevisorController::class, 'becomeRevisor'])->middleware('auth')->name('become.revisor');

// rendi utente revisore 

Route::get('/rendi/richiesta/revisore/{email}',[RevisorController::class, 'makeRevisor'])->name('make.revisor');

// cerca annuncio 

Route::get('/ricerca/annuncio',[PublicController::class, 'searchAnnouncements'])->name('announcements.search');

Route::patch('/modifica/annuncio/{article}', [RevisorController::class, 'editArticle'])->middleware('isRevisor')->name('revisor.edit_articles');

Route::post('/lingua/{lang}', [PublicController::class, 'setLanguage'])->name('set_language_locale');

