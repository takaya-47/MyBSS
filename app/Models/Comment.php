<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'post_id',
        'body',
    ];

    /**
     * Commentsテーブルのレコードに関連するPostテーブルのレコードを取得します
     * （使い方） $comment->post
     */
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
