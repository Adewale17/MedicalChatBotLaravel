<?php

namespace App\Livewire\User\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class SignIn extends Component
{
    public $email, $password;

    public function login()
    {

        $this->validate([
            'email' => 'required|email|max:255',
            'password' => 'required|string|min:8',
        ]);
        if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
            session()->regenerate();
            return redirect()->intended('/dashboard');
        } else {
            session()->flash('error', 'Invalid credentials. Please try again.');
        }

    }
    public function render(
    ) {
        return view('livewire.user.auth.sign-in');
    }
}
