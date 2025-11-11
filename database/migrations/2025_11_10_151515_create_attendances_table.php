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
        Schema::create('attendances', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cadet_id')->constrained();
            $table->foreignId('training_session_id')->constrained();
            $table->time('time_in')->nullable();
            $table->time('time_out')->nullable();
            $table->double('hours_credit');
            $table->string('remarks');
            $table->unique(['cadet_id', 'training_session_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendances');
    }
};
