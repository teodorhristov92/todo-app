<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Todo;
use App\Http\Resources\TodoResource;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class TodoController extends Controller
{
    use AuthorizesRequests;
    public int $totalTodos = 0;

    public function index(Request $request)
    {
        //$userId = 1; // Hardcoded for testing
        $userId = $request->user()->id;
        $query = Todo::with(['category', 'priority'])
            ->where('user_id', $userId)
            ->orderBy('created_at', 'desc'); // Latest todos first
        if ($request->has('category_id') && $request->category_id) {
            $query->where('category_id', $request->category_id);
        }
        $todos = $query->get();
        // Custom SQL query for total todos
        $totalTodos = \DB::select('SELECT COUNT(*) as total FROM todos WHERE user_id = ?', [$userId])[0]->total ?? 0;
        return response()->json([
            'data' => TodoResource::collection($todos),
            'total_todos' => $totalTodos,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
            'priority_id' => 'required|exists:priorities,id',
            'completed' => 'boolean',
        ]);
        $validated['user_id'] = $request->user()->id;
        $todo = Todo::create($validated);
        return new TodoResource($todo->load(['category', 'priority']));
    }

    public function show(Todo $todo)
    { 
        return new TodoResource($todo->load(['category', 'priority']));
    }

    public function update(Request $request, Todo $todo)
    {
        \Log::info('TodoController@update called', ['todo_id' => $todo->id, 'request' => $request->all()]);
        // Ensure the todo belongs to the authenticated user
        if ($todo->user_id !== $request->user()->id) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $validated = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
            'completed' => 'boolean',
            'category_id' => 'sometimes|required|exists:categories,id',
            'priority_id' => 'sometimes|required|exists:priorities,id',
        ]);
        
        $todo->update($validated);
        
        // Return the updated todo with relationships loaded
        return new TodoResource($todo->load(['category', 'priority']));
    }

    public function destroy(Todo $todo)
    {
        $todo->delete();
        return response()->json(['message' => 'Deleted']);
    }
} 