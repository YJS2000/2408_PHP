<?php

use App\Http\Controllers\BoardController;
use App\Http\Controllers\UserController;
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
    return redirect()->Route('goLogin');
});
// 로그인 관련
Route::middleware('guest')->get('/login', [UserController::class, 'goLogin'])->name('goLogin');
Route::middleware('guest')->post('/login', [UserController:: class, 'login'])->name('login');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

// 게시판 관련
Route::middleware('auth')->resource('/boards', BoardController::class)->except(['update', 'edit']);

// 회원가입 관련
Route::middleware('guest')->get('/regist', [UserController::class, 'regist'])->name('regist');
Route::middleware('guest')->post('/registlogin', [UserController::class, 'registLogin'])->name('registLogin');

Route::get('/insert', [userController::class, 'insert'])->name('insert');