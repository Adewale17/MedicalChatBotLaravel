<?php

namespace App\Livewire\Doctor\Dashboard;

use App\Models\Doctor;
use Livewire\Component;

class ManageDoctors extends Component
{
    public $confirmingDoctorId = null;

    public function confirmDelete($id)
    {
        $this->confirmingDoctorId = $id;
    }

    public function deleteDoctor()
    {
        Doctor::findOrFail($this->confirmingDoctorId)->delete();
        session()->flash('message', 'Doctor deleted successfully.');
        $this->confirmingDoctorId = null;
    }

    public function render()
    {
        return view('livewire.doctor.dashboard.manage-doctors', [
            'doctors' => Doctor::latest()->get(),
        ]);
    }
}
