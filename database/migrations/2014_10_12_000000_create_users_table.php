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
            //$table->string('email')->unique(); membuat kolom email yang tidak boleh duplikat.
            //Digunakan untuk mencegah pendaftaran user dengan email yang sama
            $table->timestamp('email_verified_at')->nullable();
            //$table->timestamp('email_verified_at')->nullable(); digunakan untuk menyimpan waktu verifikasi email pengguna.
            //Digunakan dalam fitur Laravel Email Verification.
            //Jika pengguna belum memverifikasi email, kolom ini tetap NULL.
            //Bisa ditambahkan ke tabel yang sudah ada dengan migration baru
            $table->string('password');
            //
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
    //public function down() berfungsi untuk membatalkan perubahan migration.
    //Digunakan dalam php artisan migrate:rollback untuk menghapus tabel atau kolom yang sebelumnya dibuat.
    //Harus selalu ada dalam setiap migration untuk mendukung rollback.
    {
        Schema::dropIfExists('users');
        //Digunakan dalam file migration untuk menghapus tabel users jika tabel tersebut ada di database.
    }
};
