<?php

namespace App\Livewire\User\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;


class SignUp extends Component
{
    use WithFileUploads;
    public $matric_no, $name, $email, $password, $password_confirmation, $avatar;

    public function register()
    {
        $this->validate([
            'matric_no' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'avatar' => 'nullable|image|max:1024',

        ]);
        $avatarPath = null;

        if ($this->avatar) {
            $avatarPath = $this->avatar->store('avatars', 'public');
        }

        $user = User::create([
            'matric_no' => $this->matric_no,
            'name' => $this->name,
            'email' => $this->email,
            'password' => bcrypt($this->password),
            'avatar' => $avatarPath,

        ]);
        Auth::login($user);
        return redirect()->route('user.dashboard');
    }
    public function render()
    {
        return view('livewire.user.auth.sign-up');
    }
}
