<?php

namespace App\Http\Livewire\Todo;

use App\Models\Category;
use App\Models\Priority;
use App\Models\Todo;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class TodoForm extends Component
{
    public $todo_id = null;
    public $title = '';
    public $description = '';
    public $category_id = '';
    public $priority_id = '';
    public $completed = false;
    public $categories = [];
    public $priorities = [];
    public $error = '';

    public function mount($todo_id = null)
    {
        if ($todo_id) {
            $this->loadTodo($todo_id);
        }
        $this->fetchCategories();
        $this->fetchPriorities();
    }

    public function loadTodo($todo_id)
    {
        $response = Http::withToken(auth()->user()->api_token ?? null)
            ->get(config('app.url') . "/api/todos/{$todo_id}");
        if ($response->successful()) {
            $todo = $response->json();
            $this->title = $todo['title'] ?? '';
            $this->description = $todo['description'] ?? '';
            $this->category_id = $todo['category_id'] ?? '';
            $this->priority_id = $todo['priority_id'] ?? '';
            $this->completed = $todo['completed'] ?? false;
        }
    }

    public function fetchCategories()
    {
        $response = Http::withToken(auth()->user()->api_token ?? null)
            ->get(config('app.url') . '/api/categories');
        $this->categories = $response->successful() ? $response->json('data') : [];
    }

    public function fetchPriorities()
    {
        $response = Http::withToken(auth()->user()->api_token ?? null)
            ->get(config('app.url') . '/api/priorities');
        $this->priorities = $response->successful() ? $response->json('data') : [];
    }

    public function submit()
    {
        $data = [
            'title' => $this->title,
            'description' => $this->description,
            'category_id' => $this->category_id,
            'priority_id' => $this->priority_id,
            'completed' => $this->completed,
        ];

        if ($this->todo_id) {
            $response = Http::withToken(auth()->user()->api_token ?? null)
                ->patch(config('app.url') . "/api/todos/{$this->todo_id}", $data);
        } else {
            $response = Http::withToken(auth()->user()->api_token ?? null)
                ->post(config('app.url') . '/api/todos', $data);
        }

        if (isset($response) && $response->successful()) {
            $this->resetForm();
            $this->dispatch('todoUpdated');
        } else {
            $this->error = $response->json('message') ?? 'An error occurred.';
        }
    }

    public function resetForm()
    {
        $this->todo_id = null;
        $this->title = '';
        $this->description = '';
        $this->category_id = '';
        $this->priority_id = '';
        $this->completed = false;
    }

    public function render()
    {
        return view('livewire.todo.todo-form');
    }
} 