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
        Schema::create('postpartum_tbls', function (Blueprint $table) 
        {
            $table->id('pp_id');
            $table->unsignedBigInteger('mat_id')->nullable(); 
            $table->foreign('mat_id')->references('mat_id')->on('maternal_tbls')->onDelete('cascade');
            $table->date('pp_dateVisit')->nullable();
            $table->string('pp_feso', 30)->nullable();
            $table->string('pp_vitA', 30)->nullable();
            $table->text('ap_Intervention')->nullable();
            $table->date('pp_dateNextVisit')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('postpartum_tbls');
    }
};
