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
        Schema::create('antepartum_tbls', function (Blueprint $table) {
            $table->id('ap_id');
            $table->unsignedBigInteger('mat_id')->nullable(); 
            $table->foreign('mat_id')->references('mat_id')->on('maternal_tbls')->onDelete('cascade');
            $table->date('ap_dateVisit')->nullable();
            $table->string('ap_complaints')->nullable();
            $table->string('apf_aog', 30)->nullable();
            $table->double('apf_ht')->nullable();
            $table->double('apf_wt')->nullable();
            $table->string('apf_bp')->nullable();
            $table->double('apf_fundal')->nullable();
            $table->integer('apf_fhb')->nullable();
            $table->string('apf_presentation', 80)->nullable();
            $table->string('ap_labResult', 150)->nullable();
            $table->string('ap_diagnosis', 150)->nullable();
            $table->date('ap_nextVisit')->nullable();
            $table->string('em_id', 50)->nullable();
            $table->foreign('em_id')->references('em_id')->on('employee_tbls')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('antepartum_tbls');
    }
};
