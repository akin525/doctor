<?php

namespace App\Http\Controllers\Hospital;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    public function index()
    {
        $data = Appointment::with('doctor.user', 'patient')
            ->where('doctor_id', Auth::user()->id)
            ->get();

        return view('hospital.appointment.index', compact('data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'doctor_id' => 'required|exists:doctors,id',
            'patient_id' => 'required|exists:patients,id',
            'appointment_date' => 'required|date',
            'status' => 'in:pending,approved,completed,cancelled',
        ]);

        Appointment::create([
            'doctor_id' => $request->doctor_id,
            'patient_id' => $request->patient_id,
            'appointment_date' => $request->appointment_date,
            'status' => $request->status ?? 'pending', // Default to 'pending' if not set
        ]);

        return redirect()->back()->with('success', 'Appointment created successfully.');
    }
}
