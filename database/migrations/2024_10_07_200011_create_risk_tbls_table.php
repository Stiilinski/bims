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
        Schema::create('risk_tbls', function (Blueprint $table) {
            $table->id('risk_id');
            $table->unsignedBigInteger('res_id'); 
            $table->foreign('res_id')->references('res_id')->on('resident_tbls')->onDelete('cascade'); 
            $table->enum('risk_fhHypertension', ['Yes', 'No'])->nullable();
            $table->enum('risk_fhStroke', ['Yes', 'No'])->nullable();
            $table->enum('risk_fhHeartAttack', ['Yes', 'No'])->nullable();
            $table->enum('risk_fhDiabetes', ['Yes', 'No'])->nullable();
            $table->enum('risk_fhAsthma', ['Yes', 'No'])->nullable();
            $table->enum('risk_fhCancer', ['Yes', 'No'])->nullable();
            $table->enum('risk_fhKidney', ['Yes', 'No'])->nullable();
            $table->enum('risk_obObesity', ['Yes', 'No'])->nullable();
            $table->double('risk_obHt')->nullable();
            $table->double('risk_obWt')->nullable();
            $table->double('risk_obBmi')->nullable();
            $table->enum('risk_obAdiposity', ['Yes', 'No'])->nullable();
            $table->double('risk_obWc')->nullable();
            $table->enum('risk_obBp', ['Yes', 'No'])->nullable();
            $table->string('risk_obSysFirst',30)->nullable();
            $table->string('risk_obSysSec',30)->nullable();
            $table->string('risk_obSysAve',30)->nullable();
            $table->string('risk_obDiaFirst',30)->nullable();
            $table->string('risk_obDiaSec',30)->nullable();
            $table->string('risk_obDiaAve',30)->nullable();
            $table->json('risk_smoker')->nullable();
            $table->enum('risk_alIntake', ['Never Consumed', 'Yes'])->nullable();
            $table->enum('risk_alExcessive', ['Yes', 'No'])->nullable();
            $table->enum('risk_highFat', ['Yes', 'No'])->nullable();
            $table->enum('risk_dfVege', ['Yes', 'No'])->nullable();
            $table->enum('risk_dfFruit', ['Yes', 'No'])->nullable();
            $table->enum('risk_Pa', ['Yes', 'No'])->nullable();
            $table->string('em_id', 50)->nullable();
            $table->foreign('em_id')->references('em_id')->on('employee_tbls')->onDelete('cascade');
            $table->string('risk_signatureFirst')->nullable();
            $table->string('risk_signatureSecond')->nullable();
            $table->enum('risk_q1', ['Yes', 'No'])->nullable();
            $table->enum('risk_q2', ['Yes', 'No'])->nullable();
            $table->enum('risk_q3', ['Yes', 'No'])->nullable();
            $table->enum('risk_q4', ['Yes', 'No'])->nullable();
            $table->enum('risk_q5', ['Yes', 'No'])->nullable();
            $table->enum('risk_q6', ['Yes', 'No'])->nullable();
            $table->enum('risk_q7', ['Yes', 'No'])->nullable();
            $table->enum('risk_qResult', ['Yes', 'No'])->nullable();
            $table->enum('risk_q8Stroke', ['Yes', 'No'])->nullable();
            $table->enum('risk_qStrokeResult', ['Yes', 'No'])->nullable();
            $table->json('risk_Diabetes')->nullable();
            $table->enum('risk_diaMed', ['With Medication', 'Without Medication'])->nullable();
            $table->enum('risk_diaSymp1', ['Yes', 'No'])->nullable();
            $table->enum('risk_diaSymp2', ['Yes', 'No'])->nullable();
            $table->enum('risk_diaSymp3', ['Yes', 'No'])->nullable();
            $table->enum('risk_glocuse', ['Yes', 'No'])->nullable();
            $table->string('risk_gloFbs',30)->nullable();
            $table->date('risk_gloDate')->nullable();
            $table->enum('risk_lipids', ['Yes', 'No'])->nullable();
            $table->string('risk_lipChol',30)->nullable();
            $table->date('risk_lipDate')->nullable();
            $table->enum('risk_urKetones', ['Yes', 'No'])->nullable();
            $table->string('risk_ketone',30)->nullable();
            $table->date('risk_urDate')->nullable();
            $table->enum('risk_urProtein', ['Yes', 'No'])->nullable();
            $table->string('risk_protein',30)->nullable();
            $table->date('risk_proDate')->nullable();
            $table->enum('risk_management', ['Lifestyle Modification', 'Medication'])->nullable();
            $table->string('risk_followUp',30)->nullable();
            $table->enum('risk_level', ['<10', '10% To < 20%', '20% To < 30%', '≤ 30%'])->nullable();
            $table->string('risk_findings')->nullable();
            $table->string('risk_status',15)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('risk_tbls');
    }
};
