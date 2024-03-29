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
        Schema::create('boards',function (Blueprint $table){
            $table->id();
            $table->string('name',255);
        });


        Schema::table('posts', function (Blueprint $table) {
            $table->foreignId('board_id')->references('id')->on('boards');
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
