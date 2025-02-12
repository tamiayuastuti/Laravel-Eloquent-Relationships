<?php

namespace App\Models; //Menunjukkan bahwa model Phone berada di dalam folder app/Models

use Illuminate\Database\Eloquent\Factories\HasFactory; // adalah kode yang memungkinkan kita membuat data palsu (dummy data) dengan Factory di Laravel.


use Illuminate\Database\Eloquent\Model; //Menggunakan fitur Eloquent ORM, sehingga kita bisa mengakses database dengan lebih mudah tanpa perlu menulis query SQL manual.

class Phone extends Model //Membuat model Phone, yang akan otomatis terhubung dengan tabel phones di database.
{
    use HasFactory; //Mengaktifkan fitur factory untuk membuat data uji coba (dummy data) tanpa perlu input manual.
    
    /**
     * user
     *
     * @return void // adalah anotasi (komentar) dalam PHPDoc yang digunakan untuk dokumentasi kode.
     *              // Menunjukkan bahwa fungsi tersebut tidak mengembalikan nilai apa pun.
     */
    public function user() 
    //Membuat relasi "Many-to-One" antara model ini dan model User.
    //Setiap data dalam model ini hanya dimiliki oleh satu User.
    //Laravel akan otomatis mencari kolom user_id sebagai foreign key di database
    {
        return $this->belongsTo(User::class);
        //Menunjukkan bahwa model ini memiliki hubungan "Many-to-One" dengan model User.
        //Laravel akan mencari kolom user_id di tabel model ini sebagai foreign key.
       //Menandakan bahwa banyak data dalam model ini hanya dimiliki oleh satu User.
    }
}