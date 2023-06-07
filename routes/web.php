<?php

use Illuminate\Support\Facades\Route;
use App\Models\Blogs;
use App\Http\Controllers\PostController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// ホーム画面
Route::get('/', 'App\Http\Controllers\BlogController@showHome')->name('home');
// データを登録
Route::post('/store', 'App\Http\Controllers\BlogController@exeStore')->name('store');
// 追加画面
Route::get('/add', 'App\Http\Controllers\BlogController@ShowAddBlog')->name('showAdd');
// コメント閲覧画面
Route::get('/comment/{id}', 'App\Http\Controllers\BlogController@ShowCommentBlog')->name('showComment');
// 編集画面
Route::get('/edit/{id}', 'App\Http\Controllers\BlogController@ShowEditBlog')->name('showEdit');
// データ更新
Route::post('/update', 'App\Http\Controllers\BlogController@exeUpdate')->name('update');
// データ削除
Route::post('/delete/{id}', 'App\Http\Controllers\BlogController@exeDelete')->name('delete');