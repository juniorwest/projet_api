<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Middleware\Authenticate;
use App\Models\Most;
use App\Models\Tost;
use App\Models\Vendeurs;
use Illuminate\Http\Request;

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
    return view('welcome');
});

Route::prefix('/blog')->name('blog.')->controller(BlogController::class)->group( function() {
    Route::get('/connexion', 'loginCall')->name('login');
    Route::post('/connexion', 'login');
    Route::get('/enregistrer', 'createRegister')->name('register');
    Route::post('/enregistrer', 'register');
    Route::get('/', 'index')->name('index');
    Route::get('/new', 'create')->name('create');
    Route::post('/new', 'store');
    Route::get('/{most}/edit', 'edit')->name('edit')->where([
        "most" => '[0-9]+'
    ]);
    Route::post('/{most}/edit', 'update')->where([
        "most" => '[0-9]+'
    ]);
    Route::post('/{most}/edit', 'delete')->name('delete')->where([
        "most" => '[0-9]+'
    ]);
    Route::get('/{slug}-{most}', 'show')->where([
        "most" => '[0-9]+',
        "slug" => '[a-z0-9\-]+'
    ])->name('show');
});
 
