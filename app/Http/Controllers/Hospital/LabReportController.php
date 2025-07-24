<?php

namespace App\Http\Controllers\Hospital;

use App\Http\Controllers\Controller;
use App\Models\LabReport;
use App\Models\Patient;
use Illuminate\Http\Request;

class LabReportController extends Controller
{
    //
    public function index(Request $request)
    {
        // Fetch all patients for dropdown
        $patients = Patient::all();

        // Get selected patient from request or default to first
        $selectedPatientId = $request->input('patient_id', $patients->first()->id ?? null);

        // Get selected patient's lab report
        $labReport = LabReport::where('patient_id', $selectedPatientId)->first();

        // Sample fallback structure if no report exists
        $defaultReport = [
            'sodium' => 140,
            'potassium' => 140,
            'glucose' => 84,
            'calcium' => 9.5,
            'phosphatase' => 66,
            'bicarbonate' => 31,
            'cholesterol' => 240,
            'triglycerides' => 140,
            'white_blood_cell' => 5.3,
            'hemoglobin' => 140,
            'cretinism' => 1.8,
            'thyroid' => 6.3,
            'full_body_before' => [82, 23, 67, 59],
            'full_body_after' => [0, 0, 0, 0],
        ];

        return view('hospital.doctors.lab', [
            'patients' => $patients,
            'selectedPatientId' => $selectedPatientId,
            'report' => $labReport ?? (object) $defaultReport,
        ]);
    }
}
