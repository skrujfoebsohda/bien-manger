<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EtapeController;
use App\Http\Controllers\RecetteController;
use App\Http\Controllers\UtilisateurController;


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

Route::get("/recette/{id}", [RecetteController::class, 'voirRecette']);
Route::get("/ajouter-recette", [RecetteController::class, 'ajouterRecette']);
Route::post("/ajouter-recette", [RecetteController::class, 'validationRecette']);
// ajout des ingrédients
Route::get("/ajouter-recette-ingredient", [RecetteController::class, 'ajouterRecettebis']);
Route::post("/ajouter-recette-ingredient", [RecetteController::class, 'validationRecettebis']);
// ajout des étapes
Route::get("/ajouter-recette-etape", [EtapeController::class, 'ajouterEtape']);
Route::post("/recette-ok", [EtapeController::class, 'validationEtape']);



Route::get("/connexion", [UtilisateurController::class, 'connexion'])->name('login');
Route::post("/connexion", [UtilisateurController::class, 'authentification']);

Route::get("/administration", [UtilisateurController::class, 'administration']);

Route::group(['middleware' => ['auth']], function () {
    Route::get("/deconnection", [UtilisateurController::class, 'deconnection']);
});
