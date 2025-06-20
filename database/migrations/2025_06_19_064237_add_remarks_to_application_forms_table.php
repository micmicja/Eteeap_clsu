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
        $table->text('remarks')->nullable();
    });
}

public function down(): void
{
    Schema::table('application_forms', function (Blueprint $table) {
        if (Schema::hasColumn('application_forms', 'remarks')) {
            $table->dropColumn('remarks');
        }
    });
}
};
