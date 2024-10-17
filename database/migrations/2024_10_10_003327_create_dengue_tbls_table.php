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
        Schema::create('dengue_tbls', function (Blueprint $table) {
            $table->id('dengue_id');
            $table->unsignedBigInteger('res_id'); 
            $table->foreign('res_id')->references('res_id')->on('resident_tbls')->onDelete('cascade'); 
            $table->date('dengue_date')->nullable();
            $table->string('dengue_place',30)->nullable();
            $table->string('dengue_initialSymp',50)->nullable();
            $table->date('dengue_dateOnSetFever')->nullable();
            $table->double('dengue_high')->nullable();
            $table->double('dengue_moderate')->nullable();
            $table->double('dengue_slight')->nullable();
            $table->date('dengue_dateOfFever')->nullable();
            $table->string('dengue_durationFever',30)->nullable();
            $table->json('dengue_signSymp')->nullable();
            $table->string('dengue_medTake',50)->nullable();
            $table->enum('dengue_hospitalized', ['Yes', 'No'])->nullable();
            $table->enum('dengue_outcome', ['Recovered', 'Not Improved', 'Died'])->nullable();
            $table->enum('dengue_hisTravel', ['Yes', 'No'])->nullable();
            $table->string('dengue_whereTravel',50)->nullable();
            $table->enum('dengue_exposed', ['Yes', 'No'])->nullable();
            $table->json('dengue_tests')->nullable();
            $table->json('dengue_nameContact')->nullable();
            $table->json('dengue_addressContact')->nullable();
            $table->json('dengue_animals')->nullable();
            $table->string('dengue_animalsSpecify',30)->nullable();
            $table->json('dengue_waterConIn')->nullable();
            $table->string('dengue_waterInSpecify',30)->nullable();
            $table->json('dengue_waterConOut')->nullable();
            $table->string('dengue_waterOutSpecify',30)->nullable();
            $table->enum('dengue_doorWindow', ['Yes', 'No'])->nullable();
            $table->string('em_id', 50)->nullable();
            $table->foreign('em_id')->references('em_id')->on('employee_tbls')->onDelete('cascade');
            $table->date('dengue_adminDate')->nullable();
            $table->string('dengue_adminBrgy',80)->nullable();
            $table->string('dengue_adminSitio',80)->nullable();
            $table->string('dengue_adminMunicipality',80)->nullable();
            $table->string('dengue_status',25)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dengue_tbls');
    }
};
