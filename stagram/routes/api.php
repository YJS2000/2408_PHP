<?php

use App\Http\Controllers\BoardController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
// 리스트 불러오기
Route::get('/boards',[BoardController::class, 'index']);
// 모달모달
Route::get('/boards/{id}', [BoardController::class, 'show'])->name('boards.show');
// 작성기능
Route::post('/boards/create', [BoardController::class, 'store'])->name('boards.store');
// 삭제기능
Route::delete('/boards/{id}', [BoardController::class, 'deleteBoard']);