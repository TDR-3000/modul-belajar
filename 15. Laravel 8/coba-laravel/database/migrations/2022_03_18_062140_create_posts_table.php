<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            // foreignId : untuk membuat foregidnkey
            $table->foreignId('category_id');
            $table->foreignId('user_id');
            $table->string('title');
            // unique() : artinya slugnya tidak boleh sama
            $table->string('slug')->unique();
            // excerpt : untuk menyimpan sebagian kecil tulisan dari boy blog kita(seperti sebagian kecil tulisan yang terdapat "readmore")
            $table->text('body');
            $table->text('excerpt');
            $table->timestamp('publish_at')->nullable();
            // timestamps : untuk membuat created at dan updated at (kapana postingan dibuat)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
};
