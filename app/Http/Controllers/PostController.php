<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    private $posts = [
        'Title A',
        'Title B',
        'Title C',
    ];

    // 投稿一覧
    public function index()
    {
        return view('index')
            ->with(['posts' => $this->posts]);
    }

    // 投稿詳細
    public function show($id)
    {
        return view('posts.show')
            ->with(['post' => $this->posts[$id]]);
    }

}
