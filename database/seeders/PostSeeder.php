<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;

class PostSeeder extends Seeder
{
    public function run()
    {
        Post::create([
            'title' => 'Post Pertama',
            'content' => 'Ini adalah konten untuk post pertama.',
            'date' => now(), // Tambahkan field date jika diperlukan
            'username' => 'author1', // Asumsikan menggunakan username
        ]);

        Post::create([
            'title' => 'Post Kedua',
            'content' => 'Ini adalah konten untuk post kedua.',
            'date' => now(), // Tambahkan field date jika diperlukan
            'username' => 'author2', // Asumsikan menggunakan username
        ]);
    }
}
