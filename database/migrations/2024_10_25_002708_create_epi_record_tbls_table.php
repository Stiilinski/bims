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
        Schema::create('epi_record_tbls', function (Blueprint $table) {
            $table->id('epi_id');
            // INFANT INFO
            $table->string('epi_lname', 50)->nullable();
            $table->string('epi_fname', 50)->nullable();
            $table->string('epi_mname', 50)->nullable();
            $table->string('epi_suffix', 10)->nullable();
            $table->enum('epi_sex', ['Male', 'Female'])->nullable();
            $table->enum('epi_nhts', ['Yes', 'No'])->nullable();
            $table->date('epi_bdate')->nullable();
            $table->time('epi_time')->nullable();
            $table->string('epi_address', 50)->nullable();

            // PARENT INFO
            $table->unsignedBigInteger('mother_id')->nullable(); 
            $table->foreign('mother_id')->references('res_id')->on('resident_tbls')->onDelete('cascade');
            $table->string('epi_motherName', 80)->nullable();
            $table->string('epi_motherAge', 10)->nullable();
            $table->string('epi_fp', 10)->nullable();
            $table->unsignedBigInteger('father_id')->nullable(); 
            $table->foreign('father_id')->references('res_id')->on('resident_tbls')->onDelete('cascade');
            $table->string('epi_fatherName', 80)->nullable();
            
            // FF INFO
            $table->string('epi_delPlace', 50)->nullable();
            $table->string('epi_ttReceived', 50)->nullable();
            $table->enum('epi_breastFeed', ['Yes', 'Time', 'Mix', 'No'])->nullable();
            $table->enum('epi_newBornSc', ['Yes', 'No'])->nullable();
            $table->date('epi_dateNbs')->nullable();
            $table->string('epi_birthOrder', 20)->nullable();
            $table->string('epi_status', 20)->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('epi_record_tbls');
    }
};
