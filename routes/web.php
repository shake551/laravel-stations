<?php

use Illuminate\Support\Facades\Route;
/*
|-------------------------------------------------------------------------
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

use App\Http\Controllers\PracticeController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\SheetController;

Route::get('/practice', [PracticeController::class, 'sample']);
Route::get('/practice2', [PracticeController::class, 'sample2']);
Route::get('/practice3', [PracticeController::class, 'sample3']);

Route::get('/getPractice', [PracticeController::class, 'getPractice']);
Route::get('/movies', [MovieController::class, 'getMovie']);
Route::get('/movies/{id}', [MovieController::class, 'getItem']);
Route::get('/admin/movies', [MovieController::class, 'getAdminMovie']);
Route::post('/admin/movies/store', [MovieController::class, 'create']);
Route::get('/admin/movies/create', [MovieController::class, 'createPage']);
Route::get('/admin/movies/{id}/edit', [MovieController::class, 'getAdminItem']);
Route::patch('/admin/movies/{id}/update', [MovieController::class, 'update']);
Route::delete('/admin/movies/{id}/destroy', [MovieController::class, 'delete']);

Route::get('/sheets', [SheetController::class, 'getSheets']);
