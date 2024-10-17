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
        Schema::table('employee_tbls', function (Blueprint $table) {
            $table->string('em_status', 15)->nullable()->after('em_picture');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('employee_tbls', function (Blueprint $table) {
            $table->dropColumn('em_status');
        });
    }
};
