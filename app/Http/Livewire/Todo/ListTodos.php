<?php

namespace App\Http\Livewire\Todo;

use App\Models\Todo;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;

class ListTodos extends Component
{
    public array $todos = [];

    protected $listeners = [
        'todoUpdated' => 'fetchTodos',
        'categorySelected' => 'filterByCategory',
    ];

    public function mount()
    {
        $this->fetchTodos();
    }

    public function fetchTodos()
    {
        $response = Http::withToken(auth()->user()->api_token ?? null)
            ->get(config('app.url') . '/api/todos');

        if ($response->successful()) {
            $data = $response->json('data');
            \Log::info('Todos API fetchTodos', ['data' => $data]);
            $this->todos = is_array($data) ? $data : [];
        } else {
            $this->todos = [];
        }

    }

    public function filterByCategory($categoryId)
    {
        \Log::info('filterByCategory called', ['categoryId' => $categoryId]);
        $response = Http::withToken(auth()->user()->api_token ?? null)
            ->get(config('app.url') . '/api/todos', [
                'category_id' => $categoryId,
            ]);

        if ($response->successful()) {
            $data = $response->json('data');
            \Log::info('Todos API filterByCategory', ['data' => $data]);
            $this->todos = is_array($data) ? $data : [];
        } else {
            $this->todos = [];
        }
       
    }

    public function toggleComplete($todoId, $completed)
    {
        $response = Http::withToken(auth()->user()->api_token ?? null)
            ->patch(config('app.url') . "/api/todos/{$todoId}", [
                'completed' => $completed,
            ]);

        if ($response->successful()) {
            $this->fetchTodos();
        }
    }

    public function render()
    {
        return view('livewire.todo.list-todos', [
            'todos' => is_array($this->todos) ? $this->todos : [],
            'totalTodos' => $this->totalTodos,
        ]);
    }
}