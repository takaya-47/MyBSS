<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'body',
    ];

    /**
     * Postsテーブルのレコードに関連するCommentsテーブルのレコードを取得します
     * （使い方） $post->comments
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
