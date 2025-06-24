<?php

namespace App\Http\Livewire\Todo;

use App\Models\Category;
use Livewire\Component;

class CategoryFilter extends Component
{
    public $selectedCategory = '';

    public function selectCategory($id)
    {
        $this->selectedCategory = $id;
        $this->dispatch('categorySelected', $id);
    }

    public function render()
    {
        return view('livewire.todo.category-filter', [
            'categories' => Category::all()
        ]);
    }
} 