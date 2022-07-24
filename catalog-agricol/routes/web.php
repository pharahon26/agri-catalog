<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;


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

// routes
/*
    ADMIN
        ** BACK **
        get : connexion
        get : profil
        get : modifier profil

    PRODUiTS
        ** FRONT **
        get : liste des produits
        get : détail produit
        post : recherche produit

        ** BACK **
        get : view créer un produit
        post : créer un produit
        get : modifier produit
        post : modifierproduit
        delete : delete produit

    CATEGORIES
        ** BACK **
        get : liste des categories
        get : détail categorie
        get : view créer une categorie
        post : créer une categorie
        get : modifier une categorie
        post : modifier une categorie
        delete : delete categorie
*/

/*
    ADMIN
        ** BACK **
        get : connexion
        get : profil
        get : modifier profil
*/

/*
    PRODUiTS
        ** FRONT **
        get : liste des produits
        get : détail produit
        post : recherche produit
*/
Route::get('/', [ProduitController::class, 'index'])->name('catalogue');

Route::get('/product/{id}', [ProduitController::class, 'show'])->name('prodiut.show');
Route::post('/product/search', [ProduitController::class, 'search'])->name('produit.search');


/*
    PRODUiTS
        ** BACK **
        get : view créer un produit
        post : créer un produit
        get : modifier produit
        post : modifierproduit
        delete : delete produit
*/

Route::get('produit/create', [ProduitController::class, 'create'])->middleware('auth')->name('produit.create');
Route::post('/product', [ProduitController::class, 'store'])->middleware('auth')->name('prodiut.store');
Route::get('/product/{id}/edit', [ProduitController::class, 'edit'])->middleware('auth')->name('prodiut.edit');
Route::put('/product/{id}', [ProduitController::class, 'update'])->middleware('auth')->name('prodiut.update');
Route::delete('/product/{id}', [ProduitController::class, 'destroy'])->middleware('auth')->name('prodiut.destroy');

/*
    CATEGORIES
        ** BACK **
        get : liste des categories
        get : détail categorie
        get : view créer une categorie
        post : créer une categorie
        get : modifier une categorie
        post : modifier une categorie
        delete : delete categorie
*/

Route::get('/category', [CategoryController::class, 'index'])->middleware('auth')->name('category.index');
Route::post('/category/search', [CategoryController::class, 'search'])->middleware('auth')->name('category.search');
Route::get('/category/create', [CategoryController::class, 'create'])->middleware('auth')->name('category.create');
Route::post('/category', [CategoryController::class, 'store'])->middleware('auth')->name('category.store');
Route::get('/category/{id}/edit', [CategoryController::class, 'edit'])->middleware('auth')->name('category.edit');
Route::put('/category/{id}', [CategoryController::class, 'update'])->middleware('auth')->name('category.update');
Route::delete('/category/{id}', [CategoryController::class, 'destroy'])->middleware('auth')->name('category.destroy');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/user/edit', [HomeController::class, 'edit'])->name('user.edit');
Route::post('/user/update', [HomeController::class, 'update'])->name('user.update');

