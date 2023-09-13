<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\QuoteController;
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


Route::get('/', [CategoryController::class, 'catView'])->name('index.categorias');
Route::get('/categorias', [CategoryController::class, 'catView'])->name('index.categorias');
Route::post('/categorias', [CategoryController::class, 'createCat'])->name('create.categorias');
Route::delete('/categorias', [CategoryController::class, 'deleteCat'])->name('delete.categorias');
Route::get('/categorias/create', [QuoteController::class, 'createCatView'])->name('create.index.categorias')->middleware('auth');



Route::get('/frases', [QuoteController::class, 'quoteView'])->name('index.frases');
Route::post('/frases', [QuoteController::class, 'createQuote'])->name('create.frases');
Route::delete('/frases', [QuoteController::class, 'deleteQuote'])->name('delete.frases');
Route::get('/frases/create', [QuoteController::class, 'createQuoteView'])->name('create.index.frases')->middleware('auth');



Route::get('/login', [LoginController::class, 'createUserView'])->name('index.user');
Route::post('/create', [LoginController::class, 'createUser'])->name('create.user');
Route::post('/login', [LoginController::class, 'userLogin'])->name('login.user');
Route::delete('/logout', [LoginController::class, 'logout'])->name('logout.user');
