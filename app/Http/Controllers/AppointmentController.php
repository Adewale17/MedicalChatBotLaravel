<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{

    public function appointments()
    {
        $appointments = Appointment::where('doctor_id', Auth::guard('doctor')->id())->latest()->get();
        return view('doctor.dashboard.appointment', compact('appointments'));
    }

    public function approve($id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->update(['status' => 'approved']);
        // Create a notification for the user
        Notification::create([
            'user_id' => $appointment->user_id,
            'message' => 'Your appointment has been approved.',
        ]);
        return redirect()->back()->with('message', 'Appointment approved.');
    }

    public function cancel($id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->update(['status' => 'cancelled']);
        Notification::create([
            'user_id' => $appointment->user_id,
            'message' => 'Your appointment has been cancelled.',
        ]);

        return redirect()->back()->with('message', 'Appointment cancelled.');
    }



}
