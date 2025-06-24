<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Priority;

class PrioritySeeder extends Seeder
{
    public function run()
    {
        Priority::insert([
            ['name' => 'Low', 'level' => 1],
            ['name' => 'Medium', 'level' => 2],
            ['name' => 'High', 'level' => 3],
        ]);
    }
} 