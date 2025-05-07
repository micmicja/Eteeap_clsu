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
        // Adding submission_count to users table before proceeding with other actions
        Schema::table('users', function (Blueprint $table) {
            $table->integer('submission_count')->default(0)->after('name'); // Added after email for proper order
        });
    }
    
    public function down()
    {
        // Dropping submission_count from users table before rolling back other actions
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('submission_count');
        });
    }
};
