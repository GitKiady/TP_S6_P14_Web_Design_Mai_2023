<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArticleController;

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
    return view('content/login');
});

Route::get('/delete/article-{id}', [ArticleController::class, "submitDeleteArticle"]);

Route::get('/update/article-{id}', [ArticleController::class, "showUpdateArticle"]);

Route::post('/update/article/submit', [ArticleController::class, "submitUpdateArticle"]);

Route::post('/login/submit', [AdminController::class, "login"]);

Route::get('/list/article', [ArticleController::class, "list"]);

Route::get('/insert/article', [ArticleController::class,"showInsertArticle"]);

Route::post('/insert/article/submit', [ArticleController::class, "insert"]);

Route::get('/mety', function () {
    return view('content/mety');
});

URL::forceScheme('https');
