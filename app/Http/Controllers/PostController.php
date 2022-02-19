<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Requests\PostRequest;

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

    // 投稿フォーム送信先
    public function store(PostRequest $request)
    {
        $post = new Post();
        $post->title = $request->title;
        $post->body = $request->body;
        $post->save();

        return redirect()
            ->route('posts.index');
    }

    // 投稿編集
    public function edit(Post $post)
    {
        return view('posts.edit')
            ->with(['post' => $post]);
    }

    // 投稿編集フォーム送信先
    public function update(PostRequest $request, Post $post)
    {
        $post->title = $request->title;
        $post->body = $request->body;
        $post->save();

        return redirect()
            ->route('posts.show', $post);
    }

    // 投稿削除
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()
            ->route('posts.index');
    }
}
