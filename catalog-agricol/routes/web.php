<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\CategoryController;


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
Route::get('/connexion', function () {
    return view('connexion');
});

Route::get('/profil', function () {
    return view('profil');
});

/*
    PRODUiTS
        ** FRONT **
        get : liste des produits
        get : détail produit
        post : recherche produit
*/
Route::get('/', [ProduitController::class, 'index']);

Route::get('/product/{id}', [ProduitController::class, 'show']);

/*
    PRODUiTS
        ** BACK **
        get : view créer un produit
        post : créer un produit
        get : modifier produit
        post : modifierproduit
        delete : delete produit
*/

Route::get('produit/create', [ProduitController::class, 'create']);
Route::post('/product', [ProduitController::class, 'store']);
Route::get('/product/{id}/edit', [ProduitController::class, 'edit']);
Route::put('/product/{id}', [ProduitController::class, 'update']);
Route::delete('/product/{id}', [ProduitController::class, 'destroy']);

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

Route::get('/category', [CategoryController::class, 'index']);
Route::get('/category/create', [CategoryController::class, 'create']);
Route::post('/category', [CategoryController::class, 'store']);
Route::get('/category/{id}/edit', [CategoryController::class, 'edit']);
Route::put('/category/{id}', [CategoryController::class, 'update']);
Route::delete('/category/{id}', [CategoryController::class, 'destroy']);
