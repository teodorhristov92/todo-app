<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run()
    {
        Category::insert([
            ['name' => 'Work'],
            ['name' => 'Personal'],
            ['name' => 'Shopping'],
        ]);
    }
} 