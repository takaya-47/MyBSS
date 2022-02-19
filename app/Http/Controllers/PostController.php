<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    // 投稿一覧
    public function index()
    {
        $posts = Post::latest()->get();

        return view('index')
            ->with(['posts' => $posts]);
    }

    // 投稿詳細
    public function show(Post $post)
    {
        return view('posts.show')
            ->with(['post' => $post]);
    }

    // 投稿作成
    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        // バリデーションの設定
        $request->validate([
            'title' => 'required|min:3', // 必須。最低3文字以上。
            'body'  => 'required', // 必須
        ], [
            // エラーメッセージをデフォルトからオリジナルに変更
            'title.required' => 'タイトルは必須です',
            'title.min'      => ':min 文字以上で入力してください',
            'body.required' => '本文は必須です',
        ]);

        $post = new Post();
        $post->title = $request->title;
        $post->body = $request->body;
        $post->save();

        return redirect()
            ->route('posts.index');
    }

    public function edit(Post $post)
    {
        return view('posts.edit')
            ->with(['post' => $post]);
    }
}
