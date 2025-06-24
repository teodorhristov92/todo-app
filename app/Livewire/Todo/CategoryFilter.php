<?php

namespace App\Livewire\Todo;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use App\Models\Category;

class CategoryFilter extends Component
{
    public $selectedCategory = '';
    public $categories = [];

    public function mount()
    {
        $this->categories = Category::all()->toArray();
    }

    public function selectCategory($id)
    {
        $this->selectedCategory = $id;
        $this->dispatch('categorySelected', $id);
    }

    public function render()
    {
        return view('livewire.todo.category-filter', [
            'categories' => $this->categories,
        ]);
    }
} 