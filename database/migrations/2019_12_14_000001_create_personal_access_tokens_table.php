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
    //public function up() adalah bagian dari migration Laravel yang digunakan untuk menambahkan atau mengubah tabel dalam database
    {
        Schema::create('personal_access_tokens', function (Blueprint $table) {
            $table->id();
            $table->morphs('tokenable');
            $table->string('name');
            $table->string('token', 64)->unique();
            $table->text('abilities')->nullable();
            $table->timestamp('last_used_at')->nullable();
            //Tipe timestamp → Menyimpan data waktu (tanggal & jam).
            //Menambahkan kolom expires_at yang digunakan untuk menyimpan tanggal dan waktu kadaluwarsa.
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
        Schema::dropIfExists('personal_access_tokens');
        //Kode berikut digunakan dalam migration Laravel untuk menghapus tabel personal_access_tokens jika tabel tersebut ada
    }
};
