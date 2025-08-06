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
            'dva_unaided_right' => '6/18',
            'dva_unaided_left' => '6/24',
            'dva_aided_right' => '6/6',
            'dva_aided_left' => '6/9',
            'dva_with_pinhole_right' => '6/12',
            'dva_with_pinhole_left' => '6/18',

            'nva_unaided_right' => 'N8',
            'nva_unaided_left' => 'N10',
            'nva_aided_right' => 'N6',
            'nva_aided_left' => 'N6',

            'tonometry_right' => '15 mmHg',
            'tonometry_left' => '16 mmHg',

            'ginoscopy_right' => 'Open angle',
            'ginoscopy_left' => 'Narrow angle',

            'vfa_right' => 'Full field',
            'vfa_left' => 'Mild superior defect',

            'cvf_right' => 'Normal',
            'cvf_left' => 'Reduced inferior quadrant',
        ];

        return view('hospital.doctors.lab', [
            'patients' => $patients,
            'selectedPatientId' => $selectedPatientId,
            'report' => $labReport ?? (object) $defaultReport,
        ]);
    }
}
