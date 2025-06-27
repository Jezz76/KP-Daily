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
        Schema::table('kp_periods', function (Blueprint $table) {
            // Rename position to supervisor_name
            $table->renameColumn('position', 'supervisor_name');
            
            // Add is_active column
            $table->boolean('is_active')->default(true)->after('description');
        });
        
        // Drop unique constraint safely after column operations
        Schema::table('kp_periods', function (Blueprint $table) {
            $table->dropUnique(['user_id']);
            $table->index(['user_id', 'is_active']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('kp_periods', function (Blueprint $table) {
            $table->dropIndex(['user_id', 'is_active']);
            $table->unique('user_id');
        });
        
        Schema::table('kp_periods', function (Blueprint $table) {
            $table->renameColumn('supervisor_name', 'position');
            $table->dropColumn('is_active');
        });
    }
};
