<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        controller::create([
            'nama' => 'Tombol Login',
            'nilai' => 'Aktif',
            'type' => 'Bool' 
        ]);
        controller::create([
            'nama' => 'Tombol Registrasi',
            'nilai' => 'Aktif',
            'type' => 'Bool' 
        ]);
        controller::create([
            'nama' => 'Tombol Guidline',
            'nilai' => 'Aktif',
            'type' => 'Bool' 
        ]);
        controller::create([
            'nama' => 'Tombol Webinar',
            'nilai' => 'Tidak Aktif',
            'type' => 'Bool' 
        ]);
        controller::create([
            'nama' => 'Tombol Merchandise',
            'nilai' => 'Tidak Aktif',
            'type' => 'Bool' 
        ]);
        controller::create([
            'nama' => 'Link Guidline',
            'nilai' => '#',
            'type' => 'Var' 
        ]);
        controller::create([
            'nama' => 'Link Merchandise',
            'nilai' => '#',
            'type' => 'Var' 
        ]);
        controller::create([
            'nama' => 'Hak akses Login/Register',
            'nilai' => '2',
            'type' => 'Int' 
        ]);
        controller::create([
            'nama' => 'Late Registration',
            'nilai' => '03/06/2022 17:40',
            'type' => 'Var' 
        ]);
        user::create([
            'name' => 'Bioscope',
            'email' => 'bioscope2021@gmail.com',
            'is_admin' => 1,
            'remember_token' => Str::random(10),
            'password' => Hash::make('bayobayobayoea')
        ]);
    }
}
