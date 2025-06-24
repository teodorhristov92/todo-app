<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class Register extends Component
{
    public $name = '';
    public $email = '';
    public $password = '';
    public $password_confirmation = '';
    public $error = '';
    public $loading = false;

    public function register()
    {
        $this->loading = true;
        $this->error = '';
        try {
            $response = Http::post('/api/register', [
                'name' => $this->name,
                'email' => $this->email,
                'password' => $this->password,
                'password_confirmation' => $this->password_confirmation,
            ]);
            if ($response->successful()) {
                session(['api_token' => $response['token']]);
                return redirect()->route('dashboard');
            } else {
                $this->error = $response->json('message') ?? 'Registration failed.';
            }
        } catch (\Exception $e) {
            $this->error = 'Server error.';
        }
        $this->loading = false;
    }

    public function render()
    {
        return view('livewire.auth.register');
    }
} 