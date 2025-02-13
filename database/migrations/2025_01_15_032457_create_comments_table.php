<?php

use Illuminate\Database\Migrations\Migration; //Menggunakan kelas Migration agar bisa membuat atau mengubah tabel di database.
use Illuminate\Database\Schema\Blueprint;     //Menggunakan kelas Blueprint untuk mendefinisikan struktur tabel (kolom, tipe data,
use Illuminate\Support\Facades\Schema;        //Menggunakan facade Schema untuk menjalankan perintah database seperti create, drop, dan alter.


return new class extends Migration 
//Membuat kelas anonim yang mewarisi Migration, yang akan digunakan untuk menulis kode pembuatan atau penghapusan tabel dalam metode up() dan down().
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
        $table->unsignedBigInteger('post_id');
        $table->text('comment');
        $table->timestamps();

        $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
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
};
