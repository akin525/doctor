<?php

namespace App\Http\Controllers\Hospital;

use App\Http\Controllers\Controller;
use App\Models\EyeReport;
use Illuminate\Http\Request;

class EyeReportController extends Controller
{
    public function index()
    {
        $reports = EyeReport::all();
        return view('eye_reports.index', compact('reports'));
    }

    public function create()
    {
        return view('hospital.doctors.eye-reports');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            // Visual Acuity
            'dva_unaided_right' => 'nullable|string',
            'dva_unaided_left' => 'nullable|string',
            'dva_aided_right' => 'nullable|string',
            'dva_aided_left' => 'nullable|string',
            'dva_with_pinhole_right' => 'nullable|string',
            'dva_with_pinhole_left' => 'nullable|string',

            'nva_unaided_right' => 'nullable|string',
            'nva_unaided_left' => 'nullable|string',
            'nva_aided_right' => 'nullable|string',
            'nva_aided_left' => 'nullable|string',

            // Eye pressure and tests
            'tonometry_right' => 'nullable|string',
            'tonometry_left' => 'nullable|string',
            'ginoscopy_right' => 'nullable|string',
            'ginoscopy_left' => 'nullable|string',
            'vfa_right' => 'nullable|string',
            'vfa_left' => 'nullable|string',
            'cvf_right' => 'nullable|string',
            'cvf_left' => 'nullable|string',

            // Eye structure
            'anterior_chamber_right' => 'nullable|string',
            'anterior_chamber_left' => 'nullable|string',
            'pupil_right' => 'nullable|string',
            'pupil_left' => 'nullable|string',
            'lens_right' => 'nullable|string',
            'lens_left' => 'nullable|string',
            'fundus_right' => 'nullable|string',
            'fundus_left' => 'nullable|string',

            // Prescription
            'refraction' => 'nullable|string',
            'old_lens_prescription' => 'nullable|string',
            'final_prescription' => 'nullable|string',
            'present_lens_prescription' => 'nullable|string',

            // Diagnosis and comments
            'diagnosis' => 'nullable|string',
            'doctor_comment' => 'nullable|string',
            'entry_date' => 'nullable|date',

            // History & Complaints
            'presenting_complaint' => 'nullable|string',
            'history_of_presenting_complaint' => 'nullable|string',
            'past_ocular_history' => 'nullable|string',
            'known_specular_user' => 'nullable|boolean',
            'previous_trauma_right' => 'nullable|boolean',
            'previous_trauma_left' => 'nullable|boolean',

            // Medical history
            'past_medical_history' => 'nullable|string',
            'hypertension' => 'nullable|boolean',
            'diabetic' => 'nullable|boolean',
            'peptic_ulcer' => 'nullable|boolean',
            'sickle_cell' => 'nullable|boolean',
            'asthma' => 'nullable|boolean',
            'xyz' => 'nullable|boolean',
            'present_medication' => 'nullable|string',
            'allergies' => 'nullable|string',

            // Surgery and eye history
            'past_surgical_history' => 'nullable|string',
            'history_of_glaucoma' => 'nullable|boolean',
            'history_of_refractive_error' => 'nullable|boolean',

            // Social history
            'smoking' => 'nullable|boolean',
            'tuberculosis' => 'nullable|boolean',
            'herbal_concortion' => 'nullable|boolean',
            'alcohol' => 'nullable|boolean',

            // Doctor's Review
            'doctors_review' => 'nullable|string',
        ]);

        $report = EyeReport::create($data);

        return redirect()->route('eye-reports.create')->with('success', 'Eye report created successfully.');

//        return response()->json([
//            'status' => true,
//            'message' => 'Eye report created successfully',
//            'data' => $report
//        ], 201);
    }

    public function show(EyeReport $eyeReport)
    {
        return view('eye_reports.show', compact('eyeReport'));
    }

    public function edit(EyeReport $eyeReport)
    {
        return view('eye_reports.edit', compact('eyeReport'));
    }

    public function update(Request $request, EyeReport $eyeReport)
    {
        $data = $request->validate([
            'dva_unaided_right' => 'nullable|string',
            // ... repeat validations
        ]);

        $eyeReport->update($data);
        return redirect()->route('eye_reports.index')->with('success', 'Eye report updated successfully.');
    }

    public function destroy(EyeReport $eyeReport)
    {
        $eyeReport->delete();
        return redirect()->route('eye_reports.index')->with('success', 'Eye report deleted.');
    }

}
