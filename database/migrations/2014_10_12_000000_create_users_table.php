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
    //Digunakan dalam Migration untuk membuat atau mengubah tabel di database.
    {
        Schema::create('users', function (Blueprint $table) {
            //Schema::create() digunakan untuk membuat tabel baru dalam database.
            //Blueprint $table digunakan untuk menentukan kolom-kolom tabel.
            //Dijalankan saat php artisan migrate untuk membuat struktur database Laravel.
            $table->id();
            //$table->id(); membuat kolom id sebagai Primary Key otomatis (BIGINT AUTO_INCREMENT).
            //Memudahkan pengelolaan database tanpa harus mendefinisikan id secara manual.
            $table->string('name');
            //Digunakan untuk membuat kolom name dalam tabel database dengan tipe data VARCHAR.
            //Secara default, panjang VARCHAR adalah 255 karakter.
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
