<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory; //Memungkinkan model Role menggunakan Factory untuk membuat data dummy saat pengujian.

    /**
     * users
     *
     * @return void
     */
    public function users()
    //Mendefinisikan relasi Many-to-Many antara Role dan User.
    //Artinya, satu Role bisa dimiliki oleh banyak User, dan satu User bisa memiliki banyak Role.
    {
        return $this->belongsToMany(User::class, 'user_role');
        //Menghubungkan model Role dengan model User melalui tabel pivot user_role.
        //Laravel akan menggunakan tabel user_role untuk menyimpan hubungan antara users dan roles
    }
}