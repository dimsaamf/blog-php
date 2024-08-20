<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Account;

class AccountSeeder extends Seeder
{
    public function run()
    {
        Account::create([
            'username' => 'admin',
            'password' => bcrypt('admin123'), // Pastikan menggunakan bcrypt
            'name' => 'Admin User',
            'role' => 'admin',
        ]);

        Account::create([
            'username' => 'author1',
            'password' => bcrypt('author123'), // Pastikan menggunakan bcrypt
            'name' => 'Author One',
            'role' => 'author',
        ]);

        Account::create([
            'username' => 'author2',
            'password' => bcrypt('author456'), // Pastikan menggunakan bcrypt
            'name' => 'Author Two',
            'role' => 'author',
        ]);
    }
}
