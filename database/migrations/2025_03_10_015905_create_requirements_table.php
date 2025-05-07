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
        Schema::create('requirements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('original_school_credentials', 255);
            $table->string('certificate_of_employment', 255);
            $table->string('nbi_barangay_clearance', 255);
            $table->string('recommendation_letter', 255);
            $table->string('proficiency_certificate', 255);
            $table->timestamp('uploaded_at')->default(now());
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requirements');
    }
};
