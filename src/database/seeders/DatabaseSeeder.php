<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;
use App\Models\SuratKeluar;
use App\Models\SuratMasuk;
use App\Models\JenisSurat;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        //Role
        Role::create([
            'name' => 'admin'
        ]);

        Role::create([
            'name' => 'user'
        ]);

        //user
        User::create([
            'role_id' => 1,
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'),
        ]);

        User::create([
            'role_id' => 1,
            'name' => 'Fakhri',
            'email' => 'fakhri@gmail.com',
            'password' => bcrypt('fakhri@gmail.com'),
        ]);

        User::create([
            'role_id' => 1,
            'name' => 'Fitrah',
            'email' => 'fitrah@gmail.com',
            'password' => bcrypt('fitrah@gmail.com'),
        ]);

        User::factory(10)->create();

        //Jenis_surat
        JenisSurat::create([
            'name' => 'surat dinas'
        ]);

        JenisSurat::create([
            'name' => 'surat kantor'
        ]);

        //Surat masuk
        SuratKeluar::factory(10)->create();

        //surat keluar
        SuratMasuk::factory(10)->create();
    }
}
