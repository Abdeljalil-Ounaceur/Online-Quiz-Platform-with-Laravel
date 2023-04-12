<?php

use Illuminate\Support\Facades\Route;

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

use App\Http\Controllers\PageController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\ResetPassword;
use App\Http\Controllers\ChangePassword;
use App\Http\Controllers\ResultatController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CandidatController;
use App\Http\Controllers\TeacherController;



Route::get('/', function () {
  return redirect('/dashboard');
})->middleware('auth');

Route::middleware('guest')->group(function () {
  Route::get('/register', [RegisterController::class, 'create'])->name('register');
  Route::post('/register', [RegisterController::class, 'store'])->name('register.perform');
  Route::get('/login', [LoginController::class, 'show'])->name('login');
  Route::post('/login', [LoginController::class, 'login'])->name('login.perform');
  Route::get('/reset-password', [ResetPassword::class, 'show'])->name('reset-password');
  Route::post('/reset-password', [ResetPassword::class, 'send'])->name('reset.perform');
  Route::get('/change-password', [ChangePassword::class, 'show'])->name('change-password');
  Route::post('/change-password', [ChangePassword::class, 'update'])->name('change.perform');
});

Route::get('/useri', function () {
  return auth()->user();
});

Route::group(['middleware' => 'auth'], function () {
  Route::get('/dashboard', [UserController::class, 'index'])->name('home');
  Route::get('/profile', [UserProfileController::class, 'show'])->name('profile');
  Route::post('/profile', [UserProfileController::class, 'update'])->name('profile.update');

  Route::middleware('admin')->group(function () {
    Route::get('/user-management', [AdminController::class, 'userManagement']);
    Route::get('/user-edit-{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::get('/user-delete-{id}', [UserController::class, 'destroy'])->name('user.destroy');
  });

  Route::middleware('candidat')->group(function () {
    Route::get('/tests', [CandidatController::class, 'listTests'])->name('tests');
    Route::get('/passer-test-{id}', [CandidatController::class, 'passTest'])->name('passer-test');
    Route::post('/calculer-resultat', [ResultatController::class, 'store'])->name('calculer-resultat');
    Route::get('/mes-resultats', [ResultatController::class, 'index'])->name('mes-resultats');
    Route::get('/view-result-{id}', [ResultatController::class, 'show'])->name('view-result');
    Route::get('/delete-result-{id}', [ResultatController::class, 'destroy'])->name('delete-result');
  });

  Route::middleware('teacher')->group(function () {
    Route::get('/mytests', [TeacherController::class, 'listTests'])->name('mytests');
    Route::get('/create-test', [TeacherController::class, 'createTest'])->name('create-test');
    Route::get('/edit-test-{id}', [TeacherController::class, 'editTest'])->name('edit-test');
    Route::post('/update-test', [TestController::class, 'update'])->name('update-test');
    Route::get('/delete-test-{id}', [TestController::class, 'destroy'])->name('delete-test');
    Route::post('/store-test', [TestController::class, 'store'])->name('save-test');
  });


  Route::get('/{page}', [PageController::class, 'index'])->name('page');
  Route::post('logout', [LoginController::class, 'logout'])->name('logout');
});
