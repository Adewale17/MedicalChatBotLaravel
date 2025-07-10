<?php

namespace App\Livewire\User\Dashboard;

use App\Models\Doctor;
use App\Models\Appointment;
use App\Models\DoctorSchedule;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Carbon\Carbon;

class BookAppointment extends Component
{
    public $doctor_id;
    public $appointment_date;
    public $appointment_time;
    public $notes;

    public $availableTimes = [];

    public function updatedDoctorId()
    {
        $this->availableTimes = [];
        $this->appointment_time = null;
    }

    public function updatedAppointmentDate()
    {
        $this->loadAvailableTimes();
    }

    public function loadAvailableTimes()
    {
        $this->availableTimes = [];

        if (!$this->doctor_id || !$this->appointment_date) {
            return;
        }

        $dayName = Carbon::parse($this->appointment_date)->format('l');

        $schedule = DoctorSchedule::where('doctor_id', $this->doctor_id)
            ->where('day', $dayName)
            ->first();

        if (!$schedule) {
            return;
        }

        $start = Carbon::createFromFormat('H:i:s', $schedule->start_time);
        $end = Carbon::createFromFormat('H:i:s', $schedule->end_time);

        $bookedTimes = Appointment::where('doctor_id', $this->doctor_id)
            ->where('appointment_date', $this->appointment_date)
            ->pluck('appointment_time')
            ->toArray();

        while ($start < $end) {
            $slot = $start->format('H:i:s');
            if (!in_array($slot, $bookedTimes)) {
                $this->availableTimes[] = $slot;
            }
            $start->addMinutes(30); // You can change this to 15 or 20 as needed
        }
    }

    public function book()
    {
        $this->validate([
            'doctor_id' => 'required|exists:doctors,id',
            'appointment_date' => 'required|date|after_or_equal:today',
            'appointment_time' => 'required',
        ]);

        Appointment::create([
            'user_id' => Auth::id(),
            'doctor_id' => $this->doctor_id,
            'appointment_date' => $this->appointment_date,
            'appointment_time' => $this->appointment_time,
            'notes' => $this->notes,
        ]);

        session()->flash('message', 'Appointment successfully booked.');
        $this->reset(['doctor_id', 'appointment_date', 'appointment_time', 'notes', 'availableTimes']);
    }

    public function render()
    {
        return view('livewire.user.dashboard.book-appointment', [
            'doctors' => Doctor::all()
        ]);
    }
}
