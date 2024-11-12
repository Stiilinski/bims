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

            $table->date('mat_lmp')->nullable();
            $table->date('mat_edc')->nullable();
            $table->integer('mat_g')->nullable();
            $table->string('mat_t', 15)->nullable();
            $table->integer('mat_p')->nullable();
            $table->integer('mat_a')->nullable();
            $table->integer('mat_l')->nullable();

            $table->integer('mat_childAlive')->nullable();
            $table->integer('mat_livingChildAlive')->nullable();
            $table->integer('mat_abortion')->nullable();
            $table->integer('mat_fDeaths')->nullable();
            $table->enum('mat_cSection', ['Yes', 'No'])->nullable();
            $table->enum('mat_ppHemorr', ['Yes', 'No'])->nullable();
            $table->enum('mat_abruptio', ['Yes', 'No'])->nullable();
            $table->string('mat_others', 50)->nullable();

            $table->enum('mat_tb', ['Yes', 'No'])->nullable();
            $table->enum('mat_hd', ['Yes', 'No'])->nullable();
            $table->enum('mat_diabetes', ['Yes', 'No'])->nullable();
            $table->enum('mat_ba', ['Yes', 'No'])->nullable();
            $table->enum('mat_goiter', ['Yes', 'No'])->nullable();
            $table->enum('mat_tetanus', ['Yes', 'No'])->nullable();

            $table->date('mat_date1')->nullable();
            $table->date('mat_date2')->nullable();
            $table->date('mat_date3')->nullable();
            $table->date('mat_date4')->nullable();
            $table->date('mat_date5')->nullable();            
            $table->integer('mat_total')->nullable();

            $table->enum('mat_fp', ['Yes', 'No'])->nullable();
            $table->string('mat_fpMethod', 50)->nullable();
            $table->enum('mat_fpWilling', ['Yes', 'No'])->nullable();

            $table->json('mat_riskFactor')->nullable();

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
