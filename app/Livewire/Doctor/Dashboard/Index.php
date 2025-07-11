<?php

namespace App\Livewire\Doctor\Dashboard;

use App\Models\Appointment;
use App\Models\User;
use Livewire\Component;
use Carbon\Carbon;


class Index extends Component
{
    public $totalUser;
    public $upcomingAppointments;
    public $todaysAppointments;


    public function mount()
    {

        $this->totalUser = User::count();
        $this->todaysAppointments = Appointment::where('appointment_date', '=', Carbon::today())->count();

        $this->upcomingAppointments = Appointment::where('appointment_date', '>=', Carbon::today())->count();

    }
    public function render()
    {
        return view('livewire.doctor.dashboard.index');
    }
}
