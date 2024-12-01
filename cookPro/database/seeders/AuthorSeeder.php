<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class AuthorSeeder extends Seeder
{
    
    public function run(): void
    {
        User::create([
            'name' => 'DanieleBomboni',
            'email' => 'danissimo228337@gmail.com',
            'password' => bcrypt('danissimo2286'),
            'role' => 'author',
        ]);
    }
}
