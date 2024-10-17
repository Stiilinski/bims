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
        Schema::create('fp_side_b_tbls', function (Blueprint $table) {
            $table->id('sideB_id');
            
            $table->unsignedBigInteger('fp_id'); 
            $table->foreign('fp_id')->references('fp_id')->on('fp_tbls')->onDelete('cascade'); 

            $table->string('em_id', 50)->nullable();
            $table->foreign('em_id')->references('em_id')->on('employee_tbls')->onDelete('cascade');

            $table->date('sideB_dateVisit')->nullable();
            $table->string('sideB_MedFinds')->nullable();
            $table->string('sideB_metAcc')->nullable();
            $table->date('sideB_followUpVisit')->nullable();


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fp_side_b_tbls');
    }
};
