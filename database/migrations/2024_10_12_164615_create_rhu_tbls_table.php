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
        Schema::create('rhu_tbls', function (Blueprint $table) {
            $table->id('rhu_id');
            $table->unsignedBigInteger('res_id'); 
            $table->foreign('res_id')->references('res_id')->on('resident_tbls')->onDelete('cascade'); 
            $table->string('rhu_familyNum',50)->nullable();
            $table->string('em_id', 50)->nullable();
            $table->foreign('em_id')->references('em_id')->on('employee_tbls')->onDelete('cascade');
            $table->string('rhu_referredTo',50)->nullable();
            $table->string('rhu_subjectFinding',50)->nullable();
            $table->enum('rhu_phMember', ['Yes', 'No'])->nullable();
            $table->enum('rhu_dependent', ['Yes', 'No'])->nullable();
            $table->enum('rhu_private', ['Yes', 'No'])->nullable();
            $table->string('rhu_phicNum',30)->nullable();
            $table->string('rhu_temp',10)->nullable();
            $table->string('rhu_pr',10)->nullable();
            $table->string('rhu_rr',10)->nullable();
            $table->string('rhu_bp',10)->nullable();
            $table->string('rhu_wt',10)->nullable();
            $table->string('rhu_reason',50)->nullable();
            $table->string('rhu_diagnosis',50)->nullable();
            $table->string('rhu_treatment',30)->nullable();
            $table->string('rhu_referringLvl',20)->nullable();
            $table->string('rhu_referredLvl',20)->nullable();
            $table->string('rhu_status',15)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rhu_tbls');
    }
};
