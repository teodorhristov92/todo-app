<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Priority;
use Database\Seeders\CategorySeeder;
use Database\Seeders\PrioritySeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // Seed categories and priorities separately first
        $this->call([
            CategorySeeder::class,
            PrioritySeeder::class,
            TestUserSeeder::class,
        ]);
    }
}
