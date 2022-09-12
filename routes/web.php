<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Admin\HomeController as AdminController;
use App\Http\Controllers\User\UserController;
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
})->name('/');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware('user')->name('home');

Route::get('/login/admin', [LoginController::class, 'showAdminLoginForm'])->name('admin.login');
Route::post('/login/admin', [LoginController::class, 'adminLogin']);
Route::get('/register/admin', [RegisterController::class, 'showAdminRegisterForm'])->name('admin.register');
Route::post('/register/admin', [RegisterController::class, 'createAdmin']);

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('dashboard', [AdminController::class, 'index'])->name('home');
    Route::get('/users', [AdminController::class, 'manageUsers'])->name('users');

    Route::post('/user-status', [AdminController::class, 'userStatus'])->name('user-status');
    Route::post('/delete-user', [AdminController::class, 'deleteUser'])->name('delete-user');
    Route::get('/user/{id}', [AdminController::class, 'userDetails'])->name('user-details');
    Route::post('/update-user', [AdminController::class, 'updateUser'])->name('update-user');
    Route::get('/quiz', [AdminController::class, 'manageQuiz'])->name('quiz');
    Route::get('/quiz/{id}', [AdminController::class, 'ajaxGetQuiz'])->name('single-quiz');
    Route::post('/new-quiz', [AdminController::class, 'newQuiz'])->name('new-quiz');
    Route::post('/delete-quiz', [AdminController::class, 'deleteQuiz'])->name('delete-quiz');
});

Route::prefix('user/')->name('user.')->middleware('user')->group(function () {
    Route::get('quiz/history', [UserController::class, 'quizHistory'])->name('quiz-history');
    Route::get('quiz/leaderboard', [UserController::class, 'leaderBoard'])->name('quiz-leaderboard');
    Route::get('quiz', [UserController::class, 'giveQuiz'])->name('quiz');
    Route::post('submit-quiz', [UserController::class, 'submitQuiz'])->name('submit-quiz');
});
