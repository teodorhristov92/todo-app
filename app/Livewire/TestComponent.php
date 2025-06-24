<?php

namespace App\Livewire;

use Livewire\Component;

class TestComponent extends Component
{
    public $message = 'Hello from Livewire!';

    public function render()
    {
        return view('livewire.test-component');
    }
}