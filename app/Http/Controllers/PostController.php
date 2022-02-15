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

}
