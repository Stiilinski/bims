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
        Schema::create('dstb_tables', function (Blueprint $table) {
            $table->id('dstb_id');
            
            // Case Finding / Notification Section
            $table->string('dstb_inputDiagnosingFac')->nullable();
            $table->string('dstb_inputNtpCode')->nullable(); 
            $table->string('dstb_inputProvinceHuc')->nullable();
            $table->string('dstb_inputRegion')->nullable();

            // Patient Demographic Section
            $table->unsignedBigInteger('res_id'); 
            $table->foreign('res_id')->references('res_id')->on('resident_tbls')->onDelete('cascade'); 
            $table->string('dstb_inputOtherNum')->nullable();
            $table->string('dstb_inputPhilHealth')->nullable();

            $table->string('em_id', 20);
            $table->foreign('em_id')->references('em_id')->on('employee_tbls')->onDelete('cascade');
            $table->string('dstb_inputRefLoc');
            $table->string('dstb_refferedBy');
            $table->string('dstb_screeningMode');
            $table->date('dstb_dateScreening');


            $table->json('dstb_testName');
            $table->string('dstb_othersDetails')->nullable();
            $table->date('dstb_dateTestXpert')->nullable();
            $table->date('dstb_dateTestSmear')->nullable();
            $table->date('dstb_dateTestChest')->nullable();
            $table->date('dstb_dateTestTuborculin')->nullable();
            $table->date('dstb_dateTestOther')->nullable();
            $table->string('dstb_resultTestXpert')->nullable();
            $table->string('dstb_resultTestSmear')->nullable();
            $table->string('dstb_resultTestChest')->nullable();
            $table->string('dstb_resultTestTuborculin')->nullable();
            $table->string('dstb_resultTestOther')->nullable();
            
            $table->enum('dstb_tuberculosis', ['TB Disease', 'TB Infection'])->nullable();
            $table->date('dstb_dateDiagnosis')->nullable();
            $table->string('dstb_tbCaseNumber')->nullable();
            $table->date('dstb_dateNotification')->nullable();
            $table->string('dstb_attendingPhysician')->nullable();
            
            // Referred fields
            $table->string('dstb_referredToName')->nullable();
            $table->string('dstb_referredToAddress')->nullable();
            $table->string('dstb_referredToFcode')->nullable();
            $table->string('dstb_referredToProvHuc')->nullable();
            $table->string('dstb_referredToRegion')->nullable();
            
            // TB Disease Classification
            $table->enum('dstb_bacteriologicalStatus', ['Bacteriologically-Confirmed TB', 'Clinically-Diagnosed TB'])->nullable();
            $table->enum('dstb_pulmonarySite', ['Pulmonary', 'Extra Pulmonary'])->nullable();
            $table->string('dstb_specificPulmonarySite')->nullable();
            $table->json('dstb_drugResistance')->nullable();
            $table->string('dstb_drugResistanceSpecific')->nullable();
            $table->json('dstb_registrationGroup')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dstb_tables');
    }
};
