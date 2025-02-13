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
            //Kode berikut digunakan dalam migration Laravel untuk menambahkan kolom uuid yang bersifat unik pada tabel database
            //UUID (Universally Unique Identifier) adalah kode unik yang digunakan untuk mengidentifikasi data, mirip dengan id, tetapi dalam format string panjang.
            $table->text('connection');
            //Kolom connection menyimpan jenis koneksi queue yang digunakan dalam Laravel.
            //Berguna dalam tabel failed_jobs untuk melihat dari mana job berasal.
            //Menggunakan text karena bisa menyimpan data panjang tanpa batasan 255 karakter.
            $table->text('queue');
            $table->longText('payload');
            //Payload adalah data yang disimpan dalam bentuk teks panjang.
            $table->longText('exception');
            //Membuat kolom exception untuk menyimpan pesan error atau stack trace saat job gagal.
            //Tipe longText digunakan karena pesan error bisa sangat panjang.
            //Berguna untuk debugging dan menemukan penyebab kegagalan.
            $table->timestamp('failed_at')->useCurrent();
            //Membuat kolom failed_at untuk menyimpan waktu kapan job gagal.
            //Tipe timestamp menyimpan tanggal & waktu.
            //useCurrent() otomatis menyimpan waktu saat job gagal tanpa perlu diisi manual.
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
        //Menghapus tabel failed_jobs jika tabel tersebut sudah ada
    }
};
