<?php

namespace App\Http\Controllers; //Namespace membantu menghindari konflik nama dengan kelas lain

use App\Models\User;
//Mengimpor model User dari direktori App\Models\User.
//Model ini digunakan untuk berinteraksi dengan tabel users di database

class UserController extends Controller
{    
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        //get users form Model
        $users = User::latest()->get();

        //passing user to view
        return view('users', compact('users'));
    }
}