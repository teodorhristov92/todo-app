<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Priority;
use App\Models\Todo;
use Illuminate\Support\Facades\Hash;

class TestUserSeeder extends Seeder
{
    public function run()
    {
        $user = User::create([
            'name' => 'testuser',
            'email' => 'testuser@example.com',
            'password' => Hash::make('password123'),
        ]);

        $category = Category::where('name', 'Work')->first();
        $priority = Priority::where('name', 'High')->first();

        Todo::factory()->count(3)->create([
            'user_id' => $user->id,
            'category_id' => $category->id,
            'priority_id' => $priority->id,
        ]);
    }
} 