<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Http\Resources\CategoryResource;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = [
            ['id' => 1, 'name' => 'Work'],
            ['id' => 2, 'name' => 'Personal'],
            ['id' => 3, 'name' => 'Shopping'],
        ];
        return response()->json(['data' => $categories]);
    }
} 