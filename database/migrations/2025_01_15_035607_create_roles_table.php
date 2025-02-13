<?php

use Illuminate\Database\Migrations\Migration;  //Menggunakan kelas Migration agar bisa membuat atau mengubah tabel di database
use Illuminate\Database\Schema\Blueprint;      //Menggunakan kelas Blueprint untuk mendefinisikan struktur tabel (kolom, tipe //data, indeks, dll.).
use Illuminate\Support\Facades\Schema;       //Menggunakan facade Schema untuk menjalankan perintah database seperti create, drop, dan alter.

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
    Schema::create('roles', function (Blueprint $table) {
        $table->id();             //Menambahkan kolom ID sebagai primary key secara otomatis (auto-increment).
        $table->string('name');   //Menambahkan kolom name dengan tipe string (maksimal 255 karakter) untuk menyimpan nama role (contoh: admin, user, editor).
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
        Schema::dropIfExists('roles');
    }
};
