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
        Schema::create('destrict_tbls', function (Blueprint $table) {
            $table->id('des_id');
            $table->unsignedBigInteger('res_id'); 
            $table->foreign('res_id')->references('res_id')->on('resident_tbls')->onDelete('cascade');
            $table->enum('des_modTrans', ['Walk-In', 'Visited', 'Referral'])->nullable();
            $table->date('des_dateConsult')->nullable();
            $table->time('des_consultTime')->nullable();
            $table->double('des_bp')->nullable();
            $table->double('des_temp')->nullable();
            $table->double('des_ht')->nullable();
            $table->double('des_wt')->nullable();
            $table->string('des_attProvider', 50)->nullable();
            $table->string('des_refFrom', 50)->nullable();
            $table->string('des_refTo', 50)->nullable();
            $table->string('des_refReason')->nullable();
            $table->string('des_refBy', 50)->nullable();
            $table->enum('des_natVisit', ['New Consultation/Case', 'New Admission', 'Follow-Up Visit'])->nullable();
            $table->json('des_signSymp')->nullable();
            $table->string('des_complaint')->nullable();
            $table->string('des_diagnosis')->nullable();
            $table->string('des_medTreatment',50)->nullable();
            $table->string('des_labFindings',50)->nullable();
            $table->string('em_id', 50)->nullable();
            $table->foreign('em_id')->references('em_id')->on('employee_tbls')->onDelete('cascade');
            $table->string('des_perfLabTest')->nullable();
            $table->string('des_status',15)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('destrict_tbls');
    }
};
