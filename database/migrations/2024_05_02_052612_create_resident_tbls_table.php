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
        Schema::create('resident_tbls', function (Blueprint $table) {
            $table->id('res_id');
            $table->text('res_picture');
            $table->text('res_household');
            $table->date('res_dateReg');           
            $table->text('res_fname');
            $table->text('res_mname');
            $table->text('res_lname');
            $table->text('res_bplace');
            $table->date('res_bdate');
            $table->text('res_civil');
            $table->text('res_sex');
            $table->text('res_purok');
            $table->text('res_voters');
            $table->text('res_email');
            $table->text('res_contact');
            $table->text('res_citizen');
            $table->text('res_address');
            $table->text('res_occupation');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resident_tbls');
    }
};
