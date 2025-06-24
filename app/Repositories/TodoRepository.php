<?php

namespace App\Repositories;

use App\Models\Todo;
use Illuminate\Support\Facades\DB;

class TodoRepository
{

    public function getTodosWithNPlusOne($userId)
    {
        $todos = Todo::where('user_id', $userId)->get();
        foreach ($todos as $todo) {
            $todo->category_name = $todo->category->name;
        }
        return $todos;
    }


    public function getTodosWithEagerLoading($userId)
    {
        return Todo::with('category')->where('user_id', $userId)->get();
    }


    public function getTodosCountPerCategory($userId)
    {
        return DB::select('
            SELECT categories.name, COUNT(todos.id) as todo_count
            FROM categories
            LEFT JOIN todos ON todos.category_id = categories.id AND todos.user_id = ?
            GROUP BY categories.name
        ', [$userId]);
    }
} 