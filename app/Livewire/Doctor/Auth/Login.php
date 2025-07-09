<?php

namespace App\Livewire\Doctor\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public $email;
    public $password;

    public function login()
    {
        $this->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);
        if (
            Auth::guard('doctor')->attempt([
                'email' => $this->email,
                'password' => $this->password,
            ])
        ) {
            session()->regenerate();
            return redirect()->route('doctor.dashboard');
        }

        $this->addError('email', 'Invalid credentials.');

    }
    public function render(
    ) {
        return view('livewire.doctor.auth.login');
    }
}
