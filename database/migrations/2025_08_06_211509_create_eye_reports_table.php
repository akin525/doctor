<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('eye_reports', function (Blueprint $table) {
            $table->id();

            // Visual Acuity
            $table->string('dva_unaided_right')->nullable();
            $table->string('dva_unaided_left')->nullable();
            $table->string('dva_aided_right')->nullable();
            $table->string('dva_aided_left')->nullable();
            $table->string('dva_with_pinhole_right')->nullable();
            $table->string('dva_with_pinhole_left')->nullable();

            $table->string('nva_unaided_right')->nullable();
            $table->string('nva_unaided_left')->nullable();
            $table->string('nva_aided_right')->nullable();
            $table->string('nva_aided_left')->nullable();

            // Eye pressure and tests
            $table->string('tonometry_right')->nullable();
            $table->string('tonometry_left')->nullable();
            $table->string('ginoscopy_right')->nullable();
            $table->string('ginoscopy_left')->nullable();
            $table->string('vfa_right')->nullable();
            $table->string('vfa_left')->nullable();
            $table->string('cvf_right')->nullable();
            $table->string('cvf_left')->nullable();

            // Eye structure exam
            $table->string('anterior_chamber_right')->nullable();
            $table->string('anterior_chamber_left')->nullable();
            $table->string('pupil_right')->nullable();
            $table->string('pupil_left')->nullable();
            $table->string('lens_right')->nullable();
            $table->string('lens_left')->nullable();
            $table->string('fundus_right')->nullable();
            $table->string('fundus_left')->nullable();

            // Prescription
            $table->text('refraction')->nullable();
            $table->text('old_lens_prescription')->nullable();
            $table->text('final_prescription')->nullable();
            $table->text('present_lens_prescription')->nullable();

            // Diagnosis & Comments
            $table->text('diagnosis')->nullable();
            $table->text('doctor_comment')->nullable();
            $table->date('entry_date')->nullable();

            // History & Complaints
            $table->text('presenting_complaint')->nullable();
            $table->text('history_of_presenting_complaint')->nullable();
            $table->text('past_ocular_history')->nullable();
            $table->boolean('known_specular_user')->nullable();
            $table->boolean('previous_trauma_right')->nullable();
            $table->boolean('previous_trauma_left')->nullable();

            // General medical history
            $table->text('past_medical_history')->nullable();
            $table->boolean('hypertension')->nullable();
            $table->boolean('diabetic')->nullable();
            $table->boolean('peptic_ulcer')->nullable();
            $table->boolean('sickle_cell')->nullable();
            $table->boolean('asthma')->nullable();
            $table->boolean('xyz')->nullable(); // placeholder for extra condition
            $table->text('present_medication')->nullable();
            $table->text('allergies')->nullable();

            // Surgical & Eye history
            $table->text('past_surgical_history')->nullable();
            $table->boolean('history_of_glaucoma')->nullable();
            $table->boolean('history_of_refractive_error')->nullable();

            // Social history
            $table->boolean('smoking')->nullable();
            $table->boolean('tuberculosis')->nullable();
            $table->boolean('herbal_concortion')->nullable();
            $table->boolean('alcohol')->nullable();

            // Review
            $table->text('doctors_review')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('eye_reports');
    }
};
