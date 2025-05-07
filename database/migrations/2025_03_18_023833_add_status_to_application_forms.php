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
        Schema::table('application_forms', function (Blueprint $table) {
            $table->enum('status', [
                'Pending',
                'Accepted by Arlene',
                'Rejected by Arlene',
                'Accepted by Assessor',
                'Rejected by Assessor',
                'Accepted by Department Coordinator',
                'Rejected by Department Coordinator',
                'Accepted by College Coordinator',
                'Rejected by College Coordinator',
                'Final Admission List'
            ])->default('Pending')->after('issued_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('application_forms', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
};
