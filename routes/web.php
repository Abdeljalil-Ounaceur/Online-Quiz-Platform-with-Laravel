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



Route::get('/', function () {
  return redirect('/dashboard');
})->middleware('auth');
Route::get('/register', [RegisterController::class, 'create'])->middleware('guest')->name('register');
Route::post('/register', [RegisterController::class, 'store'])->middleware('guest')->name('register.perform');
Route::get('/login', [LoginController::class, 'show'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'login'])->middleware('guest')->name('login.perform');
Route::get('/reset-password', [ResetPassword::class, 'show'])->middleware('guest')->name('reset-password');
Route::post('/reset-password', [ResetPassword::class, 'send'])->middleware('guest')->name('reset.perform');
Route::get('/change-password', [ChangePassword::class, 'show'])->middleware('guest')->name('change-password');
Route::post('/change-password', [ChangePassword::class, 'update'])->middleware('guest')->name('change.perform');
Route::get('/dashboard', [UserController::class, 'index'])->name('home')->middleware('auth');
Route::get('/useri', function () {
  return auth()->user();
});

Route::group(['middleware' => 'auth'], function () {
  Route::get('/profile', [UserProfileController::class, 'show'])->name('profile');
  Route::post('/profile', [UserProfileController::class, 'update'])->name('profile.update');

  Route::middleware('admin')->group(function () {
    Route::get('/user-management', [PageController::class, 'userManagement']);
    Route::post('/user-management/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::delete('/user-management/{id}', [UserController::class, 'destroy'])->name('user.destroy');
  });

  Route::middleware('candidat')->group(function () {
    Route::get('/tests', [PageController::class, 'tests'])->name('tests');
    Route::get('/passer-test-{id}', [PageController::class, 'passer'])->name('passer-test');
    Route::post('/calculer-resultat', [ResultatController::class, 'store'])->name('calculer-resultat');
  });

  Route::middleware('teacher')->group(function () {
    Route::get('/mytests', [TestController::class, 'index'])->name('mytests');
    Route::get('/create', [TestController::class, 'create'])->name('create-test');
    Route::get('/edit-test-{id}', [TestController::class, 'edit'])->name('edit-test');
    Route::post('/update-test', [TestController::class, 'update'])->name('update-test');
    Route::get('/delete-{id}', [TestController::class, 'destroy'])->name('delete-test');
    Route::post('/save', [TestController::class, 'store'])->name('save-test');
  });


  Route::get('/{page}', [PageController::class, 'index'])->name('page');
  Route::post('logout', [LoginController::class, 'logout'])->name('logout');
});
