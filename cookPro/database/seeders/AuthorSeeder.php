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
            'name' => 'DanieleAdmin',
            'email' => 'danissimo228666@gmail.com',
            'password' => bcrypt('danissimo2286'),
            'role' => 'author',
        ]);
    }
}
