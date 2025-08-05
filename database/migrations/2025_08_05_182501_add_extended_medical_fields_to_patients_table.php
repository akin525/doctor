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
        Schema::table('patients', function (Blueprint $table) {
            $table->string('middle_name')->nullable()->after('first_name');
            $table->string('marital_status')->nullable()->after('gender');
            $table->string('nationality')->nullable()->after('address');
            $table->string('blood_group')->nullable()->after('dob');

            // Extended medical fields
            $table->boolean('xyz')->default(false);
            $table->boolean('asthma')->default(false);
            $table->string('present_medication')->nullable();
            $table->string('known_allergies')->nullable();
            $table->string('past_surgical_history')->nullable();
            $table->boolean('glaucoma_history')->default(false);
            $table->boolean('refractive_error')->default(false);
            $table->boolean('smoking')->default(false);
            $table->boolean('alcohol')->default(false);
            $table->boolean('herbal_concoction')->default(false);
            $table->text('review_of_systems')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('patients', function (Blueprint $table) {
            $table->dropColumn([
                'middle_name',
                'marital_status',
                'nationality',
                'blood_group',
                'xyz',
                'asthma',
                'present_medication',
                'known_allergies',
                'past_surgical_history',
                'glaucoma_history',
                'refractive_error',
                'smoking',
                'alcohol',
                'herbal_concoction',
                'review_of_systems',
            ]);
        });
    }
};
