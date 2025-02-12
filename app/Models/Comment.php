<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model //class Comment extends Model → Mendefinisikan model Comment, yang mewakili tabel comments di database.
{
    use HasFactory; //use HasFactory; → Menggunakan fitur Laravel Factory untuk pembuatan data dummy.
    //Data dummy adalah data tiruan yang digunakan untuk pengujian aplikasi.
    
    /**
     * post
     *
     * @return void
     */
    public function post() //Mendefinisikan relasi "many-to-one" antara Comment dan Post.
    {
        return $this->belongsTo(Post::class);
        //return $this->belongsTo(Post::class); → Menunjukkan bahwa setiap komentar (Comment) berasal dari satu postingan (Post).
    }
}