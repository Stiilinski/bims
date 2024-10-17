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
        Schema::create('medicine_tbls', function (Blueprint $table) {
            $table->id('med_id');
            $table->string('em_id', 20);
            $table->foreign('em_id')->references('em_id')->on('employee_tbls')->onDelete('cascade'); // Adjusted foreign key definition
            $table->string('med_ndc', 30)->nullable();
            $table->string('med_prod', 30)->nullable();
            $table->string('med_desc', 30)->nullable();
            $table->integer('med_qtBox')->nullable();
            $table->integer('med_count')->nullable();
            $table->date('med_datePurchases')->nullable();
            $table->date('med_dateExpiration')->nullable();
            $table->string('med_remarks', 30)->nullable();
            $table->string('med_status', 15)->default('Available');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medicine_tbls');
    }
};
