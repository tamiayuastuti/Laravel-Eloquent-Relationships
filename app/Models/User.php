<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable //User adalah model yang mewarisi Authenticatable, sehingga bisa digunakan untuk sistem autentikasi di Laravel (login, logout, middleware auth, dll).
{
    use HasApiTokens, HasFactory, Notifiable; // Laravel menggunakan trait ini untuk menambahkan fitur tambahan ke model User

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        //$fillable melindungi aplikasi dari input data yang tidak diizinkan.
        //Digunakan untuk menentukan kolom mana yang bisa diisi dengan mass assignment.
        //Harus digunakan saat memakai create(), update(), atau fill()
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        //$hidden mencegah data sensitif muncul dalam JSON atau array.
        //Digunakan untuk melindungi password, remember_token, atau informasi pribadi.
        //Bisa dikombinasikan dengan makeVisible() jika ingin menampilkan kembali kolom tersembunyi.
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [ 
        //Digunakan untuk mengonversi tipe data kolom saat diambil dari database.
        //Membantu memastikan bahwa data memiliki tipe yang benar dalam model Laravel.
        //Dalam contoh ini, email_verified_at akan otomatis dikonversi menjadi objek Carbon (datetime).
        //$casts membantu mengonversi data ke tipe yang benar.
        //Berguna untuk mengelola tanggal, angka, boolean, dan JSON dengan mudah.
        //Mempermudah manipulasi data dalam model Laravel
        'email_verified_at' => 'datetime',
    ];
    
    /**
     * phone
     *
     * @return void
     */
    public function phone()
    //Fungsi ini mendefinisikan relasi One-to-One antara User dan Phone.
    //Menunjukkan bahwa satu pengguna (User) hanya memiliki satu telepon (Phone).
    //Kolom user_id di tabel phones bertindak sebagai kunci asing (foreign key).
    {
    	return $this->hasOne(Phone::class);
        //Menunjukkan bahwa satu User memiliki satu Phone (One-to-One Relationship).
        //Tabel phones harus memiliki kolom user_id sebagai foreign key yang merujuk ke users.id.
        // Digunakan untuk mengambil data telepon milik user dengan metode Eloquent.
    }
    
    /**
     * roles
     *
     * @return void
     */
    public function roles() 
    //roles() menghubungkan User dengan Role dalam relasi Many-to-Many, memudahkan pengambilan data peran pengguna.
    {
        return $this->belongsToMany(Role::class, 'user_role');
        //Kode ini memungkinkan User untuk terhubung dengan banyak Role menggunakan tabel perantara (user_role), sehingga memudahkan pengelolaan peran pengguna
    }
}