<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\RegistrationController;

use App\Http\Mail\ForgotPasswordMail;

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

Route::get('/forgot-password',[RegistrationController::class,'forgotPassword'])->name('forgot-password');
Route::post('/password-change',[RegistrationController::class,'passwordChange'])->name('password-change');

Route::get('/send-mail/{id}',[RegistrationController::class,'sendMail'])->name('send-mail');

Route::post('/password-changed',[RegistrationController::class,'passwordChanged'])->name('password-changed');

Route::get('/follow/{id}',[RegistrationController::class,'follow'])->name('follow');
Route::get('/follow-request',[RegistrationController::class,'follower'])->name('follow-request');
Route::get('/follow-back/{id}',[RegistrationController::class,'followBack'])->name('follow-back');

Route::get('/followers',[RegistrationController::class,'followers'])->name('followers');