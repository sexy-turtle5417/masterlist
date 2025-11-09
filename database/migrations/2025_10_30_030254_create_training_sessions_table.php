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
        Schema::create('training_sessions', function (Blueprint $table) {
            $table->id();
            $table->integer('nth_session');
            $table->foreignId('address_id')->constrained();
            $table->date('date_conducted');
            $table->time('start_time');
            $table->time('end_time');
            $table->double('hours_credit');
            $table->boolean("is_remedial")->default(false);
            $table->unique(['date_conducted', 'semester_id', 'nth_session']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('training_sessions');
    }
};
