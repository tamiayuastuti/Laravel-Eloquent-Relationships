<?php

use Illuminate\Database\Migrations\Migration;
//Mengimpor kelas Migration yang digunakan untuk membuat perubahan pada database (misalnya menambah atau menghapus tabel).
use Illuminate\Database\Schema\Blueprint;
//Mengimpor kelas Blueprint yang digunakan untuk mendefinisikan struktur tabel dalam migration.
use Illuminate\Support\Facades\Schema;
//Mengimpor Facade Schema, yang menyediakan metode untuk membuat, mengubah, dan menghapus tabel dalam database.

return new class extends Migration
//Digunakan untuk membuat migration tanpa nama kelas.
//Lebih ringkas dibandingkan menulis class NamaMigration extends Migration.
//Berfungsi sama seperti migration biasa di Laravel.
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    //Metode up() digunakan dalam migration Laravel untuk menjalankan perubahan pada database, seperti membuat atau mengubah tabel.
    {
        Schema::create('password_resets', function (Blueprint $table) {
            //Kode ini digunakan dalam migration Laravel untuk membuat tabel failed_jobs di database.
            //Tabel failed_jobs digunakan untuk menyimpan pekerjaan yang gagal saat diproses dalam queue Laravel.
            $table->string('email')->index();
            // Kolom email menyimpan email pengguna dan diberi index agar pencarian cepat.
            $table->string('token');
            //Kolom token menyimpan kode unik untuk reset password atau verifikasi akun.
            $table->timestamp('created_at')->nullable();
            //Membuat kolom created_at dengan tipe data timestamp (tanggal & waktu).
            //Menyimpan waktu kapan data dibuat, misalnya kapan pengguna meminta reset password.
            //->nullable() berarti kolom ini boleh kosong (tidak wajib diisi)
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('password_resets');
    }
};
