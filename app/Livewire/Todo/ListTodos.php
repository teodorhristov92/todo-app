<?php

namespace App\Livewire\Todo;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use App\Models\Todo;

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
        $this->todos = Todo::where('user_id', Auth::id())
            ->with(['category', 'priority'])
            ->orderBy('created_at', 'desc')
            ->get()
            ->toArray();
    }

    public function filterByCategory($categoryId)
    {
        $this->todos = Todo::where('user_id', Auth::id())
            ->where('category_id', $categoryId)
            ->with(['category', 'priority'])
            ->orderBy('created_at', 'desc')
            ->get()
            ->toArray();
    }

    public function toggleComplete($todoId, $completed)
    {
        $todo = Todo::where('user_id', Auth::id())->find($todoId);
        if ($todo) {
            $todo->update(['completed' => $completed]);
            $this->fetchTodos();
        }
    }

    public function render()
    {
        return view('livewire.todo.list-todos', [
            'todos' => $this->todos,
        ]);
    }
} 