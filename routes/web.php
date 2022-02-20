<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;

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

    // 投稿編集
Route::get('/posts/{post}/edit', [PostController::class, 'edit'])
->name('posts.edit')
->where('post', '[0-9]+');

// 投稿編集フォーム送信先
Route::patch('/posts/{post}/update', [PostController::class, 'update'])
->name('posts.update')
->where('post', '[0-9]+');

// 投稿削除
Route::delete('/posts/{post}/destroy', [PostController::class, 'destroy'])
->name('posts.destroy')
->where('post', '[0-9]+');

// コメント投稿フォーム送信先
Route::post('/posts/{post}/comments', [CommentController::class, 'store'])
->name('comments.store')
->where('post', '[0-9]+');
