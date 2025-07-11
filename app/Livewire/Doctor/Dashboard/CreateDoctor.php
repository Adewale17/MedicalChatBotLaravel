<?php
namespace App\Livewire\Doctor\Dashboard;

use App\Models\Doctor;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateDoctor extends Component
{
    use WithFileUploads;

    public $name;
    public $email;
    public $password;
    public $avatar;

    public function save()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:doctors,email',
            'password' => 'required|min:6',
            'avatar' => 'nullable|image|max:2048',
        ]);

        $avatarPath = $this->avatar ? $this->avatar->store('avatars', 'public') : null;

        Doctor::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'avatar' => $avatarPath,
        ]);

        session()->flash('message', 'Doctor created successfully!');
        $this->reset(['name', 'email', 'password', 'avatar']);
    }

    public function render()
    {
        return view('livewire.doctor.dashboard.create-doctor');
    }
}
