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
        Schema::create('fp_tbls', function (Blueprint $table) {
            $table->id('fp_id');
            $table->unsignedBigInteger('fp_clientId'); 
            $table->foreign('fp_clientId')->references('res_id')->on('resident_tbls')->onDelete('cascade'); 
            $table->unsignedBigInteger('fp_spouseId'); 
            $table->foreign('fp_spouseId')->references('res_id')->on('resident_tbls')->onDelete('cascade'); 
            $table->integer('fp_NoLivChild')->nullable();
            $table->enum('fp_planMoreChild', ['Yes', 'No'])->nullable();
            $table->double('fp_monthlyIncome')->nullable();
            $table->enum('fp_clientType', ['New Acceptor', 'Current User'])->nullable();
            $table->enum('fp_ifCurrent', ['Changing Method', 'Changing Clinic', 'Dropout/Restart'])->nullable();
            $table->enum('fp_reasonForFp', ['Spacing', 'Limiting'])->nullable();
            $table->string('fp_reasonOthers',50)->nullable();
            $table->enum('fp_reasonFp', ['Medical Condition', 'Side Effects'])->nullable();
            $table->string('fp_sideEffects',50)->nullable();
            $table->json('fp_methodCurUse')->nullable();
            $table->json('fp_methodIud')->nullable();
            $table->enum('fp_mhMigraine', ['Yes', 'No'])->nullable();
            $table->enum('fp_mhStroke', ['Yes', 'No'])->nullable();
            $table->enum('fp_mhHematoma', ['Yes', 'No'])->nullable();
            $table->enum('fp_mhBreast', ['Yes', 'No'])->nullable();
            $table->enum('fp_mhChestPain', ['Yes', 'No'])->nullable();
            $table->enum('fp_mhCough', ['Yes', 'No'])->nullable();
            $table->enum('fp_mhJaundice', ['Yes', 'No'])->nullable();
            $table->enum('fp_mhBleeding', ['Yes', 'No'])->nullable();
            $table->enum('fp_mhDischarge', ['Yes', 'No'])->nullable();
            $table->enum('fp_mhPhenobarbital', ['Yes', 'No'])->nullable();
            $table->enum('fp_mhSmoker', ['Yes', 'No'])->nullable();
            $table->enum('fp_mhDisablity', ['Yes', 'No'])->nullable();
            $table->string('fp_mhSpecific',50)->nullable();
            $table->integer('fp_ohNpG')->nullable();
            $table->integer('fp_ohNpP')->nullable();
            $table->integer('fp_ohNpFt')->nullable();
            $table->integer('fp_ohNpPre')->nullable();
            $table->integer('fp_ohNpAbort')->nullable();
            $table->integer('fp_ohNpLc')->nullable();
            $table->date('fp_ohDateLastDel')->nullable();
            $table->enum('fp_ohTypeDel', ['Vaginal', 'Cesarean Section'])->nullable();
            $table->date('fp_ohLastPeriod')->nullable();
            $table->date('fp_ohPrevPeriod')->nullable();
            $table->json('fp_ohMensFlow')->nullable();
            $table->enum('fp_ohDysmenorrhea', ['Yes', 'No'])->nullable();
            $table->enum('fp_ohMole', ['Yes', 'No'])->nullable();
            $table->enum('fp_ohEctopic', ['Yes', 'No'])->nullable();
            $table->enum('fp_riskDischarge', ['Yes', 'No'])->nullable();
            $table->enum('fp_riskGenital', ['Penis', 'Vagina'])->nullable();
            $table->enum('fp_riskUlcer', ['Yes', 'No'])->nullable();
            $table->enum('fp_riskBurning', ['Yes', 'No'])->nullable();
            $table->enum('fp_riskHistory', ['Yes', 'No'])->nullable();
            $table->enum('fp_riskHiv', ['Yes', 'No'])->nullable();
            $table->enum('fp_vawPartner', ['Yes', 'No'])->nullable();
            $table->enum('fp_vawApprove', ['Yes', 'No'])->nullable();
            $table->enum('fp_vawHistory', ['Yes', 'No'])->nullable();
            $table->json('fp_vawRefferedto')->nullable();
            $table->string('fp_vawRefferedtoSpecific',50)->nullable();
            $table->double('fp_peHt')->nullable();
            $table->double('fp_peWt')->nullable();
            $table->double('fp_peBp')->nullable();
            $table->double('fp_pePr')->nullable();
            $table->json('fp_peSkin')->nullable();
            $table->json('fp_peConjuctiva')->nullable();
            $table->json('fp_peNeck')->nullable();
            $table->json('fp_peBreast')->nullable();
            $table->json('fp_peAbdomen')->nullable();
            $table->json('fp_peExtremities')->nullable();
            $table->json('fp_pelIud')->nullable();
            $table->json('fp_pelCab')->nullable();
            $table->json('fp_pelCc')->nullable();
            $table->json('fp_pelUp')->nullable();
            $table->double('fp_pelUd')->nullable();
            $table->enum('fp_q1', ['Yes', 'No'])->nullable();
            $table->enum('fp_q2', ['Yes', 'No'])->nullable();
            $table->enum('fp_q3', ['Yes', 'No'])->nullable();
            $table->enum('fp_q4', ['Yes', 'No'])->nullable();
            $table->enum('fp_q5', ['Yes', 'No'])->nullable();
            $table->enum('fp_q6', ['Yes', 'No'])->nullable();
            $table->string('fp_status',15)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fp_tbls');
    }
};
