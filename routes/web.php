<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

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

// 投稿一覧
Route::get('/', [PostController::class, 'index'])
    ->name('posts.index');

// 投稿詳細
Route::get('/posts/{post}', [PostController::class, 'show'])
    ->name('posts.show')
    ->where('post', '[0-9]+');

// 投稿作成
Route::get('/posts/create', [PostController::class, 'create'])
    ->name('posts.create');

// 投稿フォーム送信先
Route::post('/posts/store', [PostController::class, 'store'])
    ->name('posts.store');

