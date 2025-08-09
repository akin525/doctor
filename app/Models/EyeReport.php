<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EyeReport extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'dva_unaided_right',
        'dva_unaided_left',
        'dva_aided_left',
        'dva_aided_right',
        'dva_pinhole_right',
        'dva_pinhole_left',
        'nva_unaided_right',
        'nva_unaided_left',
        'nva_aided_right',
        'nva_aided_left',
        'tonometry_right',
        'tonometry_left',
        'ginoscopy_right',
        'ginoscopy_left',
        'vfa_right',
        'vfa_left',
        'cvf_right',
        'cvf_left',
        'anterior_chamber_right',
        'anterior_chamber_left',
        'pupil_right',
        'pupil_left',
        'lens_right',
        'lens_left',
        'fundus_right',
        'fundus_left',
        'refraction',
        'old_lens_prescription',
        'final_prescription',
        'diagnosis',
        'doctor_comment',
        'entry_date',
        'presenting_complaint',
        'history_presenting_complaint',
        'past_ocular_history',
        'known_specular_user',
        'previous_trauma_right',
        'previous_trauma_left',
        'present_lens_prescription',
        'past_medical_history',
        'hypertension',
        'diabetic',
        'peptic_ulcer',
        'sickle_cell',
        'asthma',
        'xyz',
        'present_medication',
        'allergies',
        'past_surgical_history',
        'history_glaucoma',
        'history_refractive_error',
        'smoking',
        'tuberculosis',
        'herbal_concoction',
        'alcohol',
        'doctor_review',
    ];
}
