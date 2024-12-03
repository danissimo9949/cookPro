<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        Category::insert([
            ['name' => 'Рецепти', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Новини', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Технології приготування', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Поради', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Майстер клас', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
