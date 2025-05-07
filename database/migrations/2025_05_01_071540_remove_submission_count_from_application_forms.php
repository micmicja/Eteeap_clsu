<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('application_forms', function (Blueprint $table) {
            $table->dropColumn('submission_count');
        });
    }
    
    public function down()
    {
        Schema::table('application_forms', function (Blueprint $table) {
            $table->integer('submission_count')->default(0);
        });
    }
};
