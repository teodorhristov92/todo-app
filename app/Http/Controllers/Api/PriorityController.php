<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Priority;
use App\Http\Resources\PriorityResource;

class PriorityController extends Controller
{
    public function index()
    {
        $priorities = [
            ['id' => 1, 'name' => 'Low', 'level' => 1],
            ['id' => 2, 'name' => 'Medium', 'level' => 2],
            ['id' => 3, 'name' => 'High', 'level' => 3],
        ];
        return response()->json(['data' => $priorities]);
    }
} 