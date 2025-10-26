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
        Schema::create('cadet_contact_number', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cadet_id')->constrained();
            $table->foreignId('contact_number_id')->constrained();
            $table->string('title');
            $table->unique(['cadet_id', 'contact_number_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cadet_contact_number');
    }
};
