<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $admin = new User();
        $admin->name = 'galuh';
        $admin->email = 'admin@admin.com';
        $admin->password = bcrypt('password');
        $admin->role = 'admin';
        $admin->save();
        $pasien = new User();
        $pasien->name = 'pasien';
        $pasien->email = 'pasien@pasien.com';
        $pasien->password = bcrypt('password');
        $pasien->role = 'pasien';
        $pasien->save();
    }
}
