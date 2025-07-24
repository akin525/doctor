<?php

namespace App\Http\Controllers\Hospital;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Doctor;
use App\Models\User;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    //
    public function index()
    {
        $doctors = Doctor::with('user', 'department')->get();
        return view('hospital.doctors.index', compact('doctors'));
    }

    public function create()
    {
        $departments = Department::all();
        $users = User::where('role', 'doctor')->get();
        return view('hospital.doctors.create', compact('departments', 'users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'department_id' => 'required|exists:departments,id',
            'specialization' => 'required|string',
        ]);

        Doctor::create($request->all());
        return redirect()->route('doctors.index')->with('success', 'Doctor added successfully!');
    }

    public function show(Doctor $doctor)
    {
        return view('hospital.doctors.show', compact('doctor'));
    }

    public function edit(Doctor $doctor)
    {
        $departments = Department::all();
        $users = User::where('role', 'doctor')->get();
        return view('hospital.doctors.edit', compact('doctor', 'departments', 'users'));
    }

    public function update(Request $request, Doctor $doctor)
    {
        $doctor->update($request->all());
        return redirect()->route('doctors.index')->with('success', 'Doctor updated!');
    }

    public function destroy(Doctor $doctor)
    {
        $doctor->delete();
        return redirect()->route('doctors.index')->with('success', 'Doctor removed!');
    }
}
