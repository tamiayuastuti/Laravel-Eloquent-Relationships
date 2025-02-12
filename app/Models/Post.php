<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
//class Post extends Model membuat model Post yang mewakili tabel posts di database.
//Memungkinkan kita menggunakan fitur Eloquent Laravel seperti query, relasi, dan CRUD.
{
    use HasFactory;
    //use HasFactory; memungkinkan model menggunakan Laravel Factory.
    //Mempermudah pembuatan data dummy untuk pengujian.
    //Biasa digunakan saat seeding database atau testing aplikasi
    
    /**
     * comments
     *
     * @return void //adalah dokumentasi (docblock) yang digunakan dalam PHPDoc.
     * // ini menunjukkan bahwa fungsi tidak mengembalikan nilai langsung.//Namun, dalam contoh ini, fungsi users()sebenarnya mengembalikan relasi, sehingga penggunaan return void kurang tepat.
     */
    public function comments()
    //Membuat relasi "One-to-Many" antara model ini dan model Comment.
    //Menunjukkan bahwa satu Post bisa memiliki banyak Comment.
    //Laravel akan otomatis mencari kolom post_id sebagai foreign key di tabel comments
    {
        return $this->hasMany(Comment::class);
        //hasMany(Comment::class) berarti satu Post bisa punya banyak Comment.
        //Digunakan untuk mengambil, menambah, dan mengatur komentar yang terhubung ke sebuah artikel.
       //Laravel otomatis mencari post_id sebagai penghubung antara posts dan comments
    }
}