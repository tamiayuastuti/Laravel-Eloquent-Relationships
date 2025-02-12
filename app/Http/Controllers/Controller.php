<?php

namespace App\Http\Controllers;
//amespace digunakan untuk mengorganisir kode dalam Laravel.
//App\Http\Controllers adalah lokasi default untuk semua controller dalam Laravel.
//Memastikan Laravel dapat menemukan dan menggunakan controller dengan benar.

use Illuminate\Foundation\Auth\Access\AuthorizesRequests; 
//Mengelola otorisasi pengguna, seperti menentukan apakah seorang pengguna boleh mengakses fitur tertentu
use Illuminate\Foundation\Bus\DispatchesJobs;
//Mengirimkan pekerjaan ke queue atau langsung menjalankan tugas di background, misalnya mengirim email.
use Illuminate\Foundation\Validation\ValidatesRequests;
//Memvalidasi input dari request sebelum digunakan, seperti memastikan form yang dikirim berisi data yang sesuai aturan.
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
//Controller adalah class utama yang digunakan untuk mengatur logika dalam aplikasi Laravel.
//Mewarisi (extends) BaseController, yang merupakan class bawaan Laravel.
//Memberikan fitur seperti middleware, validasi, dan authorization kepada semua controller yang dibuat.
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    //Digunakan dalam Controller.php untuk menyediakan fitur tambahan bagi semua controller di Laravel.
}
