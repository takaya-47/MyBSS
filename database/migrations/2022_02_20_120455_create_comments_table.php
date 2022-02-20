<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('post_id'); // 外部キーとなるカラム
            $table->string('body');
            $table->timestamps();
            $table
                ->foreign('post_id') // postsテーブルに存在しないidがcommentsテーブルに入り込まないように外部キー制約をかける
                ->references('id') // postsテーブルのidと紐づける(下のonメソッドとセット)
                ->on('posts')
                ->onDelete('cascade'); // 主キーのレコードが削除されたら外部キーのcommentsテーブルのレコードも削除されるように。
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
