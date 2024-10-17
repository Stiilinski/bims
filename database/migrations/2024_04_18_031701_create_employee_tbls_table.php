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
        Schema::create('employee_tbls', function (Blueprint $table) {
            $table->string('em_id', 255)->primary();
            $table->text('em_fname');
            $table->text('em_lname');
            $table->text('em_email');
            $table->text('em_password');
            $table->text('em_address');
            $table->text('em_contact');
            $table->text('em_position');
            $table->text('em_picture');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_tbls');
    }
};
