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
        Schema::create('wards', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('capacity');
            $table->timestamps();
        });

        Schema::create('beds', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ward_id');
            $table->boolean('occupied')->default(false);
            $table->unsignedBigInteger('patient_id')->nullable();
            $table->timestamps();

            $table->foreign('ward_id')->references('id')->on('wards');
            $table->foreign('patient_id')->references('id')->on('patients')->nullOnDelete();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wards_and_beds');
    }
};
