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
        Schema::table('maternal_tbls', function (Blueprint $table) {
            $table->string('em_id', 50)->after('mat_riskFactor')->nullable(); 
            $table->foreign('em_id')->references('em_id')->on('employee_tbls')->onDelete('cascade'); 
            $table->string('mat_status')->after('em_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('maternal_tbls', function (Blueprint $table) {
            //
        });
    }
};
