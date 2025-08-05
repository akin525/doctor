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


    public function store(Request $request)
    {
        $request->validate([
            'firstname' => 'required|string|max:255',
            'middlename' => 'nullable|string|max:255',
            'lastname' => 'required|string|max:255',
            'gender' => 'required|in:Male,Female,Other',
            'dob' => 'required|date',
            'marital_status' => 'nullable|string|max:100',
            'blood_group' => 'nullable|string|max:5',
            'nationality' => 'nullable|string|max:100',
            'address' => 'required|string',
            'phone' => 'required|string|max:20',
            'email' => 'nullable|email',
            'admit_date' => 'required|date',
            'division' => 'nullable|string|max:255',
            'medical_history' => 'nullable|string',

            // Extended medical fields
            'xyz' => 'nullable|boolean',
            'asthma' => 'nullable|boolean',
            'present_medication' => 'nullable|string|max:255',
            'known_allergies' => 'nullable|string|max:255',
            'past_surgical_history' => 'nullable|string|max:255',
            'glaucoma_history' => 'nullable|boolean',
            'refractive_error' => 'nullable|boolean',
            'smoking' => 'nullable|boolean',
            'alcohol' => 'nullable|boolean',
            'herbal_concoction' => 'nullable|boolean',
            'review_of_systems' => 'nullable|string',
        ]);

        $patient = new Patient();
        $patient->first_name = $request->firstname;
        $patient->middle_name = $request->middlename;
        $patient->last_name = $request->lastname;
        $patient->gender = $request->gender;
        $patient->dob = $request->dob;
        $patient->marital_status = $request->marital_status;
        $patient->blood_group = $request->blood_group;
        $patient->nationality = $request->nationality;
        $patient->address = $request->address;
        $patient->phone = $request->phone;
        $patient->email = $request->email;
        $patient->admited = $request->admit_date;
        $patient->division = $request->division;
        $patient->medical_history = $request->medical_history;
        $patient->doctor_id = Auth::id();

        // Extended medical fields
        $patient->xyz = $request->has('xyz');
        $patient->asthma = $request->has('asthma');
        $patient->present_medication = $request->present_medication;
        $patient->known_allergies = $request->known_allergies;
        $patient->past_surgical_history = $request->past_surgical_history;
        $patient->glaucoma_history = $request->has('glaucoma_history');
        $patient->refractive_error = $request->has('refractive_error');
        $patient->smoking = $request->has('smoking');
        $patient->alcohol = $request->has('alcohol');
        $patient->herbal_concoction = $request->has('herbal_concoction');
        $patient->review_of_systems = $request->review_of_systems;

        $patient->save();

        return redirect()->back()->with('success', 'Patient added successfully.');
    }
}
