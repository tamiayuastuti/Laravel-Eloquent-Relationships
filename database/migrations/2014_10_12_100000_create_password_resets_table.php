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
            $table->string('email')->index();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
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
