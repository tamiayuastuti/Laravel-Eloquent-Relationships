<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
//Ini membuat kelas anonim yang langsung mewarisi Migration
//up() Fungsi ini dijalankan saat migrasi dilakukan (php artisan migrate).
//Membuat tabel products dengan kolom id, nama, dan harga.
//down()Fungsi ini dijalankan saat rollback (php artisan migrate:rollback).
//Menghapus tabel products jika ada.

{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    //Di Laravel, public function up() digunakan dalam migration untuk membuat atau mengubah tabel di database.
    {
        Schema::create('failed_jobs', function (Blueprint $table) {
            //Kode ini digunakan dalam migration Laravel untuk membuat tabel failed_jobs di database.
            //Tabel failed_jobs digunakan untuk menyimpan pekerjaan yang gagal saat diproses dalam queue Laravel.
            $table->id();
            //Membuat kolom id otomatis di tabel.
            //Tipe datanya BIGINT (20) UNSIGNED → Angka besar tanpa tanda negatif.
            //Menjadi PRIMARY KEY → Setiap baris memiliki id unik.
            //Auto-increment → Nilainya akan bertambah otomatis setiap ada data baru
            $table->string('uuid')->unique();
            
            $table->text('connection');
            $table->text('queue');
            $table->longText('payload');
            $table->longText('exception');
            $table->timestamp('failed_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('failed_jobs');
    }
};
