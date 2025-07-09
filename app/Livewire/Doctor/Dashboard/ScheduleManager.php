<?php

namespace App\Livewire\Doctor\Dashboard;

use App\Models\DoctorSchedule;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ScheduleManager extends Component
{

    public $day, $start_time, $end_time;
    public $schedules = [];
    public function mount()
    {
        $this->loadSchedules();
    }
    protected function loadSchedules()
    {
        $this->schedules = DoctorSchedule::where('doctor_id', Auth::guard('doctor')->id())
            ->orderByRaw("FIELD(day, 'Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday')")
            ->get();
    }
    public function save()
    {
        $this->validate([
            'day' => 'required|in:Monday,Tuesday,Wednesday,Thursday,Friday,Saturday,Sunday',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
        ]);

        DoctorSchedule::create([
            'doctor_id' => Auth::guard('doctor')->id(),
            'day' => $this->day,
            'start_time' => $this->start_time,
            'end_time' => $this->end_time,
        ]);

        $this->reset(['day', 'start_time', 'end_time']);
        $this->loadSchedules();

        session()->flash('message', 'Schedule added.');
    }

    public function delete($id)
    {
        DoctorSchedule::where('doctor_id', Auth::guard('doctor')->id())
            ->where('id', $id)
            ->delete();

        $this->loadSchedules();
    }
    public function render()
    {
        return view('livewire.doctor.dashboard.schedule-manager');
    }
}
