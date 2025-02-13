<?php

use Illuminate\Database\Migrations\Migration; //menggunakan kelas Migration agar bisa membuat atau mengubah tabel di database
use Illuminate\Database\Schema\Blueprint;     //Menggunakan kelas Blueprint untuk mendefinisikan struktur tabel (kolom,tipe data 
use Illuminate\Support\Facades\Schema;        //Menggunakan facade Schema untuk menjalankan perintah database seperti create,   
                                              //  drop, dan alter.
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
        $table->id();            //Membuat kolom ID sebagai primary key secara otomatis.
        $table->string('title'); //Membuat kolom title dengan tipe string (maks 255 karakter) untuk menyimpan judul. 
        $table->text('content'); //Membuat kolom content dengan tipe text untuk menyimpan isi postingan yang panjang.
        $table->timestamps();    //Menambahkan kolom created_at dan updated_at untuk menyimpan waktu pembuatan & pembaruan data.
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
        //Schema::dropIfExists('posts'); akan menghapus tabel posts jika ada.
        //Digunakan dalam method down() untuk rollback migration.
        //Mencegah error jika tabel tidak ada.
    }
};
