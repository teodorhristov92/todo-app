<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class Login extends Component
{
    public $email = '';
    public $password = '';
    public $error = '';
    public $loading = false;

    public function login()
    {
        $this->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (auth()->attempt(['email' => $this->email, 'password' => $this->password], true)) {
            session()->regenerate();
            return redirect()->route('dashboard');
        } else {
            $this->error = 'The provided credentials are incorrect.';
        }
        $this->loading = false;
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
} 