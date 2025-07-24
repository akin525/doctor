<?php

namespace App\Http\Controllers\Hospital;

use App\Http\Controllers\Controller;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PatientController extends Controller
{
    //
    function index()
    {
        $patients = Patient::where('doctor_id', Auth::user()->id)->get();
        return view('hospital.doctors.show', compact('patients'));
    }

    function create()
    {
        return view('hospital.doctors.create');
    }
    function store(Request $request)
    {
        $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'gender' => 'required|in:Male,Female,Other',
            'age' => 'required',
            'address' => 'required|string',
            'phone' => 'required|string|max:20',
            'admit_date' => 'required|date',
        ]);

        $patient = new Patient();
        $patient->first_name = $request->firstname;
        $patient->last_name = $request->lastname;
        $patient->gender = $request->gender;
        $patient->dob = $request->age;
        $patient->address = $request->address;
        $patient->phone = $request->phone;
        $patient->admited = $request->admit_date;
        $patient->division = $request->division;
        $patient->medical_history = $request->medical_history ?? null;
        $patient->doctor_id = Auth::id();

        $patient->save();

        return redirect()->back()->with('success', 'Patient added successfully.');
    }}
