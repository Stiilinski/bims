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
        Schema::create('opt_tbls', function (Blueprint $table) {
            $table->id('opt_id');
            $table->unsignedBigInteger('res_id'); 
            $table->foreign('res_id')->references('res_id')->on('resident_tbls')->onDelete('cascade'); 
            $table->string('opt_childName', 50)->nullable();
            $table->integer('opt_ageFirst')->nullable();
            $table->integer('opt_ageSec')->nullable();
            $table->double('opt_wtFirst')->nullable();
            $table->double('opt_wtSec')->nullable();
            $table->double('opt_htFirst')->nullable();
            $table->double('opt_htSec')->nullable();
            $table->date('opt_muacFirst')->nullable();
            $table->date('opt_muacSec')->nullable();
            $table->date('opt_nsFirst')->nullable();
            $table->date('opt_nsSec')->nullable();
            $table->date('opt_vitFirst')->nullable();
            $table->date('opt_vitSec')->nullable();
            $table->date('opt_dewormtFirst')->nullable();
            $table->date('opt_dewormSec')->nullable();
            $table->string('opt_remarks', 50)->nullable();
            $table->string('opt_status', 20)->default('Completed');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('opt_tbls');
    }
};
