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
{
    Schema::create('phones', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('user_id');
        //unsignedBigInteger adalah tipe data bilangan bulat besar (big integer) tanpa tanda negatif dalam Laravel migration
        $table->string('phone');
        $table->timestamps();

        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
    });
}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('phones');
        //Schema::dropIfExists('phones'); akan menghapus tabel phones jika ada.
        //Digunakan dalam metode down() untuk mengembalikan perubahan migration.
        //Mencegah error jika tabel tidak ada.
    }
};
