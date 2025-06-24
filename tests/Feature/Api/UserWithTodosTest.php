<?php

namespace Tests\Feature\Api;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\Category;
use App\Models\Priority;
use App\Models\Todo;

class UserWithTodosTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_with_todos_can_fetch_them()
    {
        $user = User::factory()->create();
        $category = Category::create(['name' => 'Work']);
        $priority = Priority::create(['name' => 'High', 'level' => 1]);

        $todos = Todo::factory()->count(3)->create([
            'user_id' => $user->id,
            'category_id' => $category->id,
            'priority_id' => $priority->id,
        ]);

        $this->assertCount(3, $user->todos);

        $token = $user->createToken('api-token')->plainTextToken;
        $response = $this->withHeader('Authorization', 'Bearer ' . $token)
            ->getJson('/api/todos');
        $response->assertStatus(200)
            ->assertJsonCount(3, 'data');
    }
} 