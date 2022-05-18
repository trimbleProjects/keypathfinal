<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SurveyController;
use App\Http\Controllers\ResponseController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminQuestionsController;
use App\Http\Controllers\PastResponsesController;

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
    session(['title' => 'Home']);
    return view('welcome');
});
Route::get('/survey', [SurveyController::class, 'index']);
Route::post('/Answer', [ResponseController::class, 'AddAns']);
Route::get('/Admin', [AdminController::class, 'invoke']);

Route::post('/AddQuestion', [AdminController::class, 'AddQuestion']);
Route::get('/User/{name}/{id}', [AdminController::class, 'UserInfo']);

Route::get('/Responses/{id}', [PastResponsesController::class, 'index']);
Route::get('/Responses/{userID}/{id}', [PastResponsesController::class, 'AdminIndex']);

Route::get('/Questions/{id}', [AdminQuestionsController::class, 'index']);
Route::get('/AdjustQuestion', [AdminQuestionsController::class, 'AdjustQuestion']);
Route::post('/DeleteQuestion', [AdminQuestionsController::class, 'DeleteQuestion']);



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
