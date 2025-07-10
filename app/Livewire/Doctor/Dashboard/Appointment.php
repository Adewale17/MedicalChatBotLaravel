<?php

namespace App\Livewire\Doctor\Dashboard;

use App\Models\Appointment as ModelsAppointment;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;


class Appointment extends Component
{
    use WithPagination;

    public function render()
    {
        $appointments = ModelsAppointment::where('doctor_id', Auth::guard('doctor')->id())
            ->latest()
            ->paginate(10);

        return view('livewire.doctor.dashboard.appointment', compact('appointments'));
    }

}
