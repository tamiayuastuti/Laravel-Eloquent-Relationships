<?php

namespace App\Http\Controllers; //Namespace membantu menghindari konflik nama dengan kelas lain

use App\Models\User;
//Mengimpor model User dari direktori App\Models\User.
//Model ini digunakan untuk berinteraksi dengan tabel users di database

class UserController extends Controller
//Menangani request dan response terkait pengguna (User).
//Menggunakan fitur bawaan Laravel, seperti middleware, validasi, dan dependency injection.
//Mengelola data pengguna melalui model User dan mengirimkannya ke view.

{    
    /**
     * index
     *
     * @return void //digunakan dalam dokumentasi untuk menunjukkan bahwa fungsi tidak
     */
    public function index()
    //adalah metode yang digunakan untuk menampilkan daftar data dalam Laravel.
    // Biasanya digunakan untuk mengambil data dari database dan mengirimnya ke tampilan (view).
    //Bisa dikombinasikan dengan filtering, sorting, atau pagination sesuai kebutuhan aplikasi
    {
        //get users form Model
        $users = User::latest()->get();
        //Mengambil semua data pengguna (User) dari database.
        //Mengurutkan data berdasarkan kolom created_at dari yang terbaru ke yang lama.
        //get untuk mengeksekusi query dan mengembalikan data dalam bentuk koleksi Eloquent

        //passing user to view
        return view('users', compact('users'));
        // Kode ini mengembalikan tampilan users.blade.php dengan data pengguna ($users) untuk ditampilkan di halaman web.
    }
}