<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
//UserFactory adalah kelas yang digunakan untuk membuat data dummy (seeding) dalam Laravel.
//Mewarisi Factory dari Illuminate\Database\Eloquent\Factories\Factory.
//Digunakan untuk menghasilkan data uji coba dengan Faker.
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    //definition() berfungsi untuk menghasilkan data dummy otomatis dalam Laravel Factory, berguna untuk pengujian dan pengisian data awal aplikasi.
    //public function digunakan untuk mendeklarasikan sebuah metode (fungsi) dalam kelas
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->safeEmail(),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    //Fungsi ini biasanya digunakan dalam Factory atau Model untuk menangani kondisi tertentu.
    //Biasanya digunakan untuk membuat scope atau state tertentu, seperti user yang belum diverifikasi.
    {
        return $this->state(fn (array $attributes) => [
        //Digunakan dalam Factory Laravel untuk mengubah atau menyesuaikan data dummy yang dihasilkan.
        //Fungsi state() memungkinkan kita untuk menimpa nilai default dari atribut tertentu
            'email_verified_at' => null,
        ]);
    }
}
