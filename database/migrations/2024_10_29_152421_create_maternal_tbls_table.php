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
        Schema::create('maternal_tbls', function (Blueprint $table) {
            $table->id("mat_id");
            $table->string('mat_clinic', 80)->nullable();
            $table->enum('mat_bType', ['A+', 'A-', 'B+', 'B-', 'O+', 'O-', 'AB+', 'AB-'])->nullable();
            $table->string('mat_fNum', 20)->nullable();

            $table->unsignedBigInteger('maiden_id')->nullable(); 
            $table->foreign('maiden_id')->references('res_id')->on('resident_tbls')->onDelete('cascade');
            
            $table->string('mat_urMaiden', 80)->nullable();
            $table->date('mat_urBdate')->nullable();
            $table->string('mat_urOcc', 30)->nullable();

            $table->unsignedBigInteger('husband_id')->nullable(); 
            $table->foreign('husband_id')->references('res_id')->on('resident_tbls')->onDelete('cascade');
            $table->string('mat_urHusband', 80)->nullable();
            $table->string('mat_urAddress', 80)->nullable();
            $table->enum('mat_risk', ['Yes', 'No'])->nullable();

            $table->string('mat_lmp', 15)->nullable();
            $table->string('mat_edc', 15)->nullable();
            $table->string('mat_g', 15)->nullable();
            $table->string('mat_t', 15)->nullable();
            $table->string('mat_p', 15)->nullable();
            $table->string('mat_a', 15)->nullable();
            $table->string('mat_l', 15)->nullable();

            $table->integer('mat_childAlive')->nullable();
            $table->integer('mat_livingChildAlive')->nullable();
            $table->integer('mat_abortion')->nullable();
            $table->integer('mat_fDeaths')->nullable();
            $table->date('mat_cSection')->nullable();
            $table->string('mat_ppHemorr', 35)->nullable();
            $table->string('mat_abruptio', 35)->nullable();
            $table->string('mat_others', 50)->nullable();

            $table->enum('mat_tb', ['Yes', 'No'])->nullable();
            $table->enum('mat_hd', ['Yes', 'No'])->nullable();
            $table->enum('mat_diabetes', ['Yes', 'No'])->nullable();
            $table->enum('mat_ba', ['Yes', 'No'])->nullable();
            $table->enum('mat_goiter', ['Yes', 'No'])->nullable();
            $table->enum('mat_tetanus', ['Yes', 'No'])->nullable();
            
            $table->json('des_signSymp')->nullable();
            $table->date('vt_date')->nullable();
            $table->double('vt_wt')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('maternal_tbls');
    }
};
