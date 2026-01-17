<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        Admin::create([
            'name'     => 'Admin',
            'email'    => 'admin@admin.com',
            'password' => Hash::make('password'),
            'phone'    => '01012301214',
            'image'    => 'default.png'
        ]);
    }
}
