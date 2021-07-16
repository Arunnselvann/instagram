<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\RegistrationController;

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
Route::get('/sign-up',[RegistrationController::class,'index'])->name('sign-up');
Route::post('/add-user',[RegistrationController::class,'signUp'])->name('add-user');

Route::get('/sign-in',[RegistrationController::class,'signIn'])->name('sign-in');
Route::post('/home',[RegistrationController::class,'home'])->name('home');

Route::get('/welcome',[RegistrationController::class,'firstPage'])->name('welcome');

Route::get('/log-out',[RegistrationController::class,'logout'])->name('log-out');
