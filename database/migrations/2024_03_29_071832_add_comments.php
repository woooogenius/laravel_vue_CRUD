<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->string('comment',255); //댓글내용
            $table->timestamps();
            $table->unsignedBigInteger('users_id'); //작성자의 id, users 테이블의 id 참조
            $table->unsignedBigInteger('parent_id'); // 게시물의 id값

            $table->foreign('users_id')->references('id')->on('users');
            $table->foreign('parent_id')->references('id')->on('posts');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
