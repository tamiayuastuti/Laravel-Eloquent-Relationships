<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests; 
//Mengelola otorisasi pengguna, seperti menentukan apakah seorang pengguna boleh mengakses fitur tertentu
use Illuminate\Foundation\Bus\DispatchesJobs;
//Mengirimkan pekerjaan ke queue atau langsung menjalankan tugas di background, misalnya mengirim email.
use Illuminate\Foundation\Validation\ValidatesRequests;
//Memvalidasi input dari request sebelum digunakan, seperti memastikan form yang dikirim berisi data yang sesuai aturan.
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
