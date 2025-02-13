<?php

use Illuminate\Database\Migrations\Migration; //Menggunakan kelas Migration agar bisa membuat atau mengubah tabel di database.
use Illuminate\Database\Schema\Blueprint;     //Menggunakan kelas Blueprint untuk mendefinisikan struktur tabel (kolom, tipe data
use Illuminate\Support\Facades\Schema;        //Menggunakan facade Schema untuk menjalankan perintah database seperti create, drop, dan alter.

return new class extends Migration //Membuat kelas anonim yang mewarisi Migration, yang akan digunakan untuk menulis kode pembuatan atau penghapusan tabel dalam metode up() dan down().
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::create('user_role', function (Blueprint $table) {
     //Membuat tabel user_role sebagai tabel pivot untuk menghubungkan users dan roles.   
        $table->unsignedBigInteger('user_id');  
        //Menambahkan kolom user_id untuk menyimpan ID pengguna(diambil dari tabel users).
        $table->unsignedBigInteger('role_id');  
        //Menambahkan kolom role_id untuk menyimpan ID peran(role)(diambil dari tabel roles).
        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        //Menjadikan user_id sebagai foreign key yang merujuk ke id di tabel users
        // onDelete('cascade'): Jika user dihapus, semua datanya di tabel user_role juga ikut terhapus.
        $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
        //Menjadikan role_id sebagai foreign key yang merujuk ke id di tabel roles.
        //onDelete('cascade'): Jika role dihapus, semua datanya di tabel user_role juga ikut terhapus.
    });
}
    /**
     * Reverse the migrations.
     *
     * @return void //@return void adalah PHPDoc (dokumentasi kode PHP) yang digunakan untuk menunjukkan bahwa suatu fungsi tidak mengembalikan nilai apa pun.
     */
    public function down() 
    //Method down() digunakan untuk membatalkan perubahan yang dilakukan oleh method up().
    {
        Schema::dropIfExists('user_role');
        //Menghapus tabel user_role jika ada di database. Jika tabel tidak ada, perintah ini tidak akan menimbulkan error
    }
};
