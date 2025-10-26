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
        Schema::create('cadets', function (Blueprint $table) {
            $table->id();
            $table->string('serial_number')->nullable()->unique();
            $table->string('edp_number')->unique();
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->enum('sex', ['M', 'F']);
            $table->date('date_of_birth')->nullable();
            $table->string('blood_type')->nullable();
            $table->double('height_cm')->nullable();
            $table->double('weight_kg')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cadets');
    }
};
