<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Student\MainController;
use App\Http\Controllers\Student\QuestionController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// student login
Route::get('/student', [App\Http\Controllers\Student\LoginController::class, 'showLoginForm'])->name('login.student');
Route::post('/student', [App\Http\Controllers\Student\LoginController::class, 'login']);


Route::prefix('student')->middleware("student")->group(function () {
	Route::get('dashboard', [MainController::class, 'dashboard'])->name('dashboard');
	Route::resource('question', QuestionController::class);
});

Route::prefix('teacher')->middleware("web")->group(function () {
	Route::get('dashboard', [HomeController::class, 'index'])->name('teacher.dashboard');
	Route::get('create-feedback/{id}', [HomeController::class, 'createFeedback'])->name('create');
	Route::post('store-feedback', [HomeController::class, 'store'])->name('feedback.store');
});


