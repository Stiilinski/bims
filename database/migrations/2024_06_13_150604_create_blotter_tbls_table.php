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
        Schema::create('blotter_tbls', function (Blueprint $table) {
            $table->id('blotter_id');
            $table->unsignedBigInteger('res_id')->nullable(); // Match the data type of res_id
            $table->foreign('res_id')->references('res_id')->on('resident_tbls')->onDelete('cascade')->nullable(); // Adjusted foreign key definition
            $table->text('blotter_transactionCode')->nullable();
            // $table->text('blotter_complainants')->nullable();
            $table->text('blotter_respondents')->nullable();
            $table->text('blotter_brgyCaseNum')->nullable();
            $table->text('blotter_for')->nullable();
            $table->text('blotter_complaint')->nullable();
            $table->text('blotter_resolution')->nullable();
            $table->date('blotter_complaintMade')->nullable();
            $table->date('blotter_filedDate')->nullable();
            $table->timestamps();
        });

        // Drop the blotter_complainants column after table creation
        Schema::table('blotter_tbls', function (Blueprint $table) {
            $table->dropColumn('blotter_complainants');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blotter_tbls');
    }
};
