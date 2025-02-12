<?php
//PostController mengambil data Post dan mengirimkannya ke view posts.blade.php.
namespace App\Http\Controllers;
//namespace App\Http\Controllers digunakan untuk mendefinisikan lokasi file Controller dalam Laravel.
//Berarti file ini berada di dalam folder app/Http/Controllers.
//Namespace ini membantu Laravel mengorganisir kode dan menghindari konflik dengan class lain.

use App\Models\Post;
//use App\Models\Post; mengimpor Model Post agar bisa digunakan dalam Controller.
//Memudahkan penggunaan Post::method() tanpa harus menulis path lengkap.
//Wajib ada jika ingin menggunakan model Post dalam Controller.
class PostController extends Controller
//PostController adalah sebuah Controller yang digunakan untuk mengelola data Post.
//Mewarisi (extends) Controller, yang berarti PostController dapat menggunakan fitur bawaan dari Controller.
//Digunakan untuk menghubungkan model Post dengan tampilan (view) dalam aplikasi Laravel.


{    
    /**
     * index
     *
     * @return void
     */
    public function index()
    //index() adalah metode dalam Controller yang biasanya digunakan untuk menampilkan daftar data dari database.
    //Dalam Laravel, metode ini sering digunakan di dalam controller berbasis resource.
    //Biasa digunakan dalam route GET, misalnya untuk menampilkan semua data Post
    {
        //get all posts from Model
        $posts = Post::latest()->get();

        //passing posts to view
        return view('posts', compact('posts'));
        //Digunakan untuk menampilkan tampilan (view) posts.blade.php.
        //Data posts dikirim ke view menggunakan compact('posts').
    }
}