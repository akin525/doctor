<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    //
    public function index()
    {

        $divisions = ['Cardiologist', 'Physician', 'Neurologist', 'Orthopedic'];

        $monthlyData = [];

        foreach ($divisions as $division) {
            $data = Patient::selectRaw('MONTH(created_at) as month, COUNT(*) as total')
                ->where('division', $division)
                ->whereYear('created_at', date('Y'))
                ->groupBy(DB::raw('MONTH(created_at)'))
                ->pluck('total', 'month');

            // Format into a full 12-month array
            $formatted = [];
            for ($i = 1; $i <= 12; $i++) {
                $formatted[] = $data->get($i, 0);
            }

            $monthlyData[] = [
                'label' => $division,
                'data' => $formatted,
            ];
        }
        // Group patient registrations by date over the last 30 days
        $statistics = Patient::selectRaw('DATE(created_at) as date, COUNT(*) as total')
            ->where('created_at', '>=', now()->subDays(30))
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        $labels = $statistics->pluck('date')->map(function ($date) {
            return Carbon::parse($date)->format('d M');
        });

        $data = $statistics->pluck('total');

        // Group and count patients by doctor
        $patientsByDoctor = Patient::selectRaw('doctor_id, COUNT(*) as total')
            ->groupBy('doctor_id')
            ->with('doctor') // make sure the relation exists in Patient model
            ->get();

        $total_appointment = Appointment::count();
        $total_patient = Patient::count();
        $total_doctor = Doctor::count();
        $chartData=$monthlyData;
        $pap=Patient::where('doctor_id', '=', Auth()->id())->get();

        return view('dashboard', compact(
            'labels',
            'data',
            'total_appointment',
            'total_patient',
            'patientsByDoctor',
            'total_doctor',
            'chartData',
            'pap'

        ));
    }
    public function help()
    {
        return view('hospital.virtual');
    }
}
