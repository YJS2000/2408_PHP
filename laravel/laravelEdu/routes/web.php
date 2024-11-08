<?php

use App\Http\Controllers\QueryController;
use App\Http\Controllers\QueryCueryController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TestController;
use Illuminate\Http\Request;
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

// --------------
// 라우트 정의
// --------------
Route::get('/hi', function() {
    return '안녕하세요';
});

Route::get('/hello', function() {
    return 'hello';
});

Route::get('/myview', function () {
    return view('myview');
});

// -----------
// httpMethod 에 대응하는 라우터
// -----------
Route::get('/home', function () {
    return view('home');
});

Route::post('/home', function () {
    return 'HOME POST';
});

Route::put('/home', function () {
    return 'HOME PUT';
});

Route::delete('/home', function() {
    return 'DELETE HOME';
});

Route::patch('/home', function() {
    return 'HOME PATCH';
});

// ----------------
// 파라미터 제어
// ----------------
Route::get('/param', function(Request $request) {
    return 'ID : '.$request->id.' NAME : '.$request->name;
});
// http://localhost:8000/param?id=3&name=dd

// 세그먼트 파라미터 많이 사용함
// http://localhost:8000/param/1
Route::get('/param/{id}/{name}', function($id, $name) {
    return $id.' : '.$name;
});
// http://localhost:8000/param/500/ggg

Route::get('/param/{id}', function(Request $request) {
    return $request->id;
});

Route::get('/param2/{id}', function(Request $request ,$id) {
    return $request->id."   ".$id;
});

// 세그먼트 파라미터의 디폴트 설정
Route::get('param3', function() {
    return '파람3이다.';
});

Route::get('param3/{id?}', function($id = 0) {
    return $id;
});

// ----------------
// 라우트명 지정
// ----------------
Route::get('/name', function() {
    return view('name');
});

Route::get('/home/na/hon/php', function() {
    return '좀 긴 패스';
})->name('long');

// --------------------
// 뷰에 데이터를 전달
// --------------------
Route::get('/send', function() {
    $result = [
        ['id' => 1, 'name' => '홍길동']
        ,['id' => 2, 'name' => '갑순이']
    ];
    // return view('send')
    //         ->with('gender', '무성')
    //         ->with('data', $result);

    return view('send')
            ->with([
                'gender' => '무성'
                ,'data' => $result
            ]);
});

// ----------
// 대체 라우트 : 우리가 지정한 url뺴고 나머지들을 말함
// ---------
Route::fallback(function() {
    return '이상한 URL 입니다';
});

// ----------
// 라우트 그룹
// ----------
Route::get('/users', function() {
    return 'GET : /users';
});
Route::post('/users', function() {
    return 'POST : /users';
});
Route::put('/users', function() {
    return 'PUT : /users';
});
Route::delete('/users', function() {
    return 'DELETE : /users';
});

Route::prefix('/users')->group(function() {
    Route::get('/', function() {
        return 'GET : /users';
    });
    Route::post('/', function() {
        return 'POST : /users';
    });
    Route::put('/', function() {
        return 'PUT : /users';
    });
    Route::delete('/', function() {
        return 'DELETE : /users';
    });
});

// ---------------------
// 컨트롤러 연결
// ---------------------
// 커맨드로 컨트롤러 생성 : php artisan make:controller 컨트롤러명
// Route::get('/test', [TestController::class, 'index']);

// Route::get('/task', [TestController::class, 'index']);
// Route::get('/task/create', [TestController::class, 'create']);
// Route::post('/task', [TestController::class, 'store']);
// Route::get('/task/{id}', [TestController::class, 'show']);
// Route::get('/task/edit/{id}', [TestController::class, 'edit']);
// Route::put('/task/{id}', [TestController::class, 'update']);
// Route::delete('/task/{id}', [TestController::class, 'destroy']);
Route::resource('/task', TaskController::class)->except(['index', 'create']);
// GET|HEAD        task ................... task.index › TaskController@index  
// POST            task ................... task.store › TaskController@store  
// GET|HEAD        task/create .......... task.create › TaskController@create  
// GET|HEAD        task/{task} .............. task.show › TaskController@show  
// PUT|PATCH       task/{task} .......... task.update › TaskController@update  
// DELETE          task/{task} ........ task.destroy › TaskController@destroy  
// GET|HEAD        task/{task}/edit ......... task.edit › TaskController@edit

// ------------------
// 블레이드 템플릿 용
// ------------------
Route::get('/edu', function() {
    return view('edu')
                ->with('data', ['name' => '홍길동', 'content' =>"<script>alert('tt')</script>"]);
});

Route::get('/boards', function() {
    return view('board');
});

Route::get('/extends', function () {
    $result = [
        ['id' => 1, 'name' => '홍길동', 'gender' => 'C']
        ,['id' => 2, 'name' => '갑순이', 'gender' => 'F']
        ,['id' => 3, 'name' => '갑돌이', 'gender' => 'M']
    ];

    return view('extends')
            ->with('data', $result);
 });

Route::get('/query', [QueryController::class, "index"]);