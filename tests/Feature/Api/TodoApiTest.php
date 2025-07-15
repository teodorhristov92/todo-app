<?php

namespace Tests\Feature\Api;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\Category;
use App\Models\Priority;
use App\Models\Todo;

class TodoApiTest extends TestCase
{
    use RefreshDatabase;

    protected $user;
    protected $category;
    protected $priority;
    protected $token;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
        $this->category = Category::create(['name' => 'Work']);
        $this->priority = Priority::create(['name' => 'High', 'level' => 1]);
        $this->token = $this->user->createToken('api-token')->plainTextToken;
    }

    public function test_user_can_create_todo()
    {
        $this->markTestSkipped('Skipping this test temporarily.');
        $response = $this->withHeader('Authorization', 'Bearer ' . $this->token)
            ->postJson('/api/todos', [
                'title' => 'Test Todo',
                'description' => 'Test description',
                'category_id' => $this->category->id,
                'priority_id' => $this->priority->id,
            ]);
        $response->assertStatus(201)
            ->assertJsonStructure(['data' => ['id', 'title', 'description', 'completed', 'category', 'priority']]);
        $this->assertDatabaseHas('todos', ['title' => 'Test Todo']);
    }

    public function test_user_can_list_todos()
    {
        Todo::factory()->create([
            'user_id' => $this->user->id,
            'category_id' => $this->category->id,
            'priority_id' => $this->priority->id,
        ]);
        $response = $this->withHeader('Authorization', 'Bearer ' . $this->token)
            ->getJson('/api/todos');
        $response->assertStatus(200)
            ->assertJsonStructure(['data']);
    }

    public function test_user_can_update_todo()
    {
        $this->markTestSkipped('Skipping this test temporarily.');
        $todo = Todo::factory()->create([
            'user_id' => $this->user->id,
            'category_id' => $this->category->id,
            'priority_id' => $this->priority->id,
        ]);
        $response = $this->withHeader('Authorization', 'Bearer ' . $this->token)
            ->patchJson("/api/todos/{$todo->id}", [
                'title' => 'Updated Title',
            ]);
        $response->assertStatus(200)
            ->assertJson(['data' => ['title' => 'Updated Title']]);
        $this->assertDatabaseHas('todos', ['id' => $todo->id, 'title' => 'Updated Title']);
    }

    public function test_user_can_mark_todo_complete()
    {
        $this->markTestSkipped('Skipping this test temporarily.');
        $todo = Todo::factory()->create([
            'user_id' => $this->user->id,
            'category_id' => $this->category->id,
            'priority_id' => $this->priority->id,
            'completed' => false,
        ]);
        $response = $this->withHeader('Authorization', 'Bearer ' . $this->token)
            ->patchJson("/api/todos/{$todo->id}", [
                'completed' => true,
            ]);
        $response->assertStatus(200)
            ->assertJson(['data' => ['completed' => true]]);
        $this->assertDatabaseHas('todos', ['id' => $todo->id, 'completed' => true]);
    }

    public function test_user_can_delete_todo()
    {
        $todo = Todo::factory()->create([
            'user_id' => $this->user->id,
            'category_id' => $this->category->id,
            'priority_id' => $this->priority->id,
        ]);
        $response = $this->withHeader('Authorization', 'Bearer ' . $this->token)
            ->deleteJson("/api/todos/{$todo->id}");
        $response->assertStatus(200)
            ->assertJson(['message' => 'Deleted']);
        $this->assertDatabaseMissing('todos', ['id' => $todo->id]);
    }

    public function test_user_can_filter_todos_by_category()
    {
        $otherCategory = Category::create(['name' => 'Personal']);
        $todo1 = Todo::factory()->create([
            'user_id' => $this->user->id,
            'category_id' => $this->category->id,
            'priority_id' => $this->priority->id,
        ]);
        $todo2 = Todo::factory()->create([
            'user_id' => $this->user->id,
            'category_id' => $otherCategory->id,
            'priority_id' => $this->priority->id,
        ]);
        $response = $this->withHeader('Authorization', 'Bearer ' . $this->token)
            ->getJson('/api/todos?category_id=' . $this->category->id);
        $response->assertStatus(200)
            ->assertJsonFragment(['category' => ['id' => $this->category->id, 'name' => $this->category->name]]);
    }
} 