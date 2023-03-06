<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\TachesController;
use App\Http\Controllers\API\VendeursController;
//use App\Http\Controllers\API\EtudiantsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

/*
//créons notre api
Route::get("etudiants", [EtudiantsController::class, "ListEtudiant"]);
Route::get("etudiant/{id}", [EtudiantsController::class, "getEtudiant"]);
Route::get("creer-etudiants", [EtudiantsController::class, "create"]);
Route::get("update/{id}", [EtudiantsController::class, "update"]);
Route::get("delete/{id}", [EtudiantsController::class, "delete"]);
*/

//créons notre api

Route::get("vendeurs", [VendeursController::class, "ListeVendeur"]);
Route::get("vendeurs/{id}", [VendeursController::class, "getVendeur"]);
Route::get("creer-vendeurs", [VendeursController::class, "create"]);
Route::get("update/{id}", [VendeursController::class, "update"]);
Route::get("delete/{id}", [VendeursController::class, "delete"]);



/*
Route::get("taches", [TachesController::class, "ListeTache"]);
Route::get("taches/{id}", [TachesController::class, "getTache"]);
Route::get("creer-taches", [TachesController::class, "create"]);
Route::get("update/{id}", [TachesController::class, "update"]);
Route::get("delete/{id}", [TachesController::class, "delete"]);
*/