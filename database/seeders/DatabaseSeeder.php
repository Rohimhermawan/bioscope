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
        controller::create([
            'nama' => 'Tombol Sertifikat',
            'nilai' => 'Tidak Aktif',
            'type' => 'Bool' 
        ]);
        controller::create([
            'nama' => 'Nomor Sertifikat Peserta',
            'nilai' => '232',
            'type' => 'Var' 
        ]);
        controller::create([
            'nama' => 'Kode Sertifikat',
            'nilai' => '/4/243M/231/A',
            'type' => 'Var' 
        ]);
        controller::create([
            'nama' => 'Nomor Sertifikat Semifinal',
            'type' => 'Var' 
        ]);
        controller::create([
            'nama' => 'Total Nomor Sertifikat',
            'type' => 'Var' 
        ]);
        controller::create([
            'nama' => 'Tombol Cadangan',
            'nilai' => 'Aktif', 
            'type' => 'Bool' 
        ]);
        controller::create([
            'nama' => 'Link Webinar 1',
            'type' => 'Var' 
        ]);controller::create([
            'nama' => 'Link Webinar 2',
            'type' => 'Var' 
        ]);controller::create([
            'nama' => 'Link Webinar 3',
            'type' => 'Var' 
        ]);
        controller::create([
            'nama' => 'Judul Webinar 1',
            'nilai' => 'Aktif', 
            'type' => 'Var' 
        ]);
        controller::create([
            'nama' => 'Tanggal Webinar 1',
            'nilai' => 'Aktif', 
            'type' => 'Var' 
        ]);
        controller::create([
            'nama' => 'Caption Webinar 1',
            'nilai' => 'Aktif', 
            'type' => 'Text' 
        ]);
        controller::create([
            'nama' => 'Judul Webinar 2',
            'nilai' => 'Aktif', 
            'type' => 'Var' 
        ]);
        controller::create([
            'nama' => 'Tanggal Webinar 2',
            'nilai' => 'Aktif', 
            'type' => 'Var' 
        ]);
        controller::create([
            'nama' => 'Caption Webinar 2',
            'nilai' => 'Aktif', 
            'type' => 'Text' 
        ]);
        controller::create([
            'nama' => 'Judul Webinar 3',
            'nilai' => 'Aktif', 
            'type' => 'Var' 
        ]);
        controller::create([
            'nama' => 'Tanggal Webinar 3',
            'nilai' => 'Aktif', 
            'type' => 'Var' 
        ]);
        controller::create([
            'nama' => 'Caption Webinar 3',
            'nilai' => 'Aktif', 
            'type' => 'Text' 
        ]);
        user::create([
            'name' => 'Bioscope',
            'email' => 'bioscope2021@gmail.com',
            'is_admin' => 1,
            'remember_token' => Str::random(10),
            'password' => Hash::make('bayobayobayoea')
        ]);
        user::create([
            'name' => 'Rohim Poster 1',
            'email' => 'rohimdede17@gmail.com',
            'is_admin' => 2,
            'remember_token' => Str::random(10),
            'password' => Hash::make('muhamad123')
        ]);
        user::create([
            'name' => 'Rohim Poster 2',
            'email' => 'rohimhermawan01@gmail.com',
            'is_admin' => 2,
            'remember_token' => Str::random(10),
            'password' => Hash::make('muhamad123')
        ]);
        user::create([
            'name' => 'Rohim Hermawan',
            'email' => 'rohim20001@mail.unpad.ac.id',
            'is_admin' => 2,
            'remember_token' => Str::random(10),
            'password' => Hash::make('muhamad123')
        ]);
    }
}
