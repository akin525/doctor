@extends('layouts.sidebar')
@section('title', 'Add Eye Report')
@section('content')
    <div class="container-xxl">
        <div class="row align-items-center">
            <div class="border-0 mb-4">
                <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                    <h3 class="fw-bold mb-0">Add Eye Report</h3>
                </div>
            </div>
        </div>

        <form method="POST" action="{{ route('eye-reports.store') }}">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-header"><strong>Visual Acuity</strong></div>
                        <div class="card-body row g-3">
                            @foreach([
                                'dva_unaided_right', 'dva_unaided_left', 'dva_aided_right', 'dva_aided_left',
                                'dva_with_pinhole_right', 'dva_with_pinhole_left', 'nva_unaided_right', 'nva_unaided_left',
                                'nva_aided_right', 'nva_aided_left'
                            ] as $field)
                                <div class="col-md-6">
                                    <label class="form-label text-capitalize">{{ str_replace('_', ' ', $field) }}</label>
                                    <input type="text" name="{{ $field }}" class="form-control">
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="card mb-4">
                        <div class="card-header"><strong>Eye Pressure and Tests</strong></div>
                        <div class="card-body row g-3">
                            @foreach(['tonometry_right', 'tonometry_left', 'ginoscopy_right', 'ginoscopy_left', 'vfa_right', 'vfa_left', 'cvf_right', 'cvf_left'] as $field)
                                <div class="col-md-6">
                                    <label class="form-label text-capitalize">{{ str_replace('_', ' ', $field) }}</label>
                                    <input type="text" name="{{ $field }}" class="form-control">
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="card mb-4">
                        <div class="card-header"><strong>Eye Structure</strong></div>
                        <div class="card-body row g-3">
                            @foreach(['anterior_chamber_right', 'anterior_chamber_left', 'pupil_right', 'pupil_left', 'lens_right', 'lens_left', 'fundus_right', 'fundus_left'] as $field)
                                <div class="col-md-6">
                                    <label class="form-label text-capitalize">{{ str_replace('_', ' ', $field) }}</label>
                                    <input type="text" name="{{ $field }}" class="form-control">
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="card mb-4">
                        <div class="card-header"><strong>Prescription</strong></div>
                        <div class="card-body row g-3">
                            @foreach(['refraction', 'old_lens_prescription', 'final_prescription', 'present_lens_prescription'] as $field)
                                <div class="col-md-12">
                                    <label class="form-label text-capitalize">{{ str_replace('_', ' ', $field) }}</label>
                                    <textarea class="form-control" name="{{ $field }}" rows="2"></textarea>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="card mb-4">
                        <div class="card-header"><strong>Diagnosis & Comments</strong></div>
                        <div class="card-body row g-3">
                            <div class="col-md-12">
                                <label class="form-label">Diagnosis</label>
                                <textarea name="diagnosis" class="form-control" rows="2"></textarea>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label">Doctor Comment</label>
                                <textarea name="doctor_comment" class="form-control" rows="2"></textarea>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Entry Date</label>
                                <input type="date" name="entry_date" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="card mb-4">
                        <div class="card-header"><strong>History & Complaints</strong></div>
                        <div class="card-body row g-3">
                            @foreach([
                                'presenting_complaint', 'history_of_presenting_complaint', 'past_ocular_history',
                                'past_medical_history', 'present_medication', 'allergies', 'past_surgical_history', 'doctors_review'
                            ] as $field)
                                <div class="col-md-12">
                                    <label class="form-label text-capitalize">{{ str_replace('_', ' ', $field) }}</label>
                                    <textarea class="form-control" name="{{ $field }}" rows="2"></textarea>
                                </div>
                            @endforeach

                            @foreach([
                                'known_specular_user', 'previous_trauma_right', 'previous_trauma_left', 'hypertension', 'diabetic',
                                'peptic_ulcer', 'sickle_cell', 'asthma', 'xyz', 'history_of_glaucoma',
                                'history_of_refractive_error', 'smoking', 'tuberculosis', 'herbal_concortion', 'alcohol'
                            ] as $field)
                                <div class="col-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="{{ $field }}" id="{{ $field }}" value="1">
                                        <label class="form-check-label" for="{{ $field }}">{{ ucwords(str_replace('_', ' ', $field)) }}</label>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="d-grid mt-3">
                        <button class="btn btn-primary" type="submit">Submit Eye Report</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
