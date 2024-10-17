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
        Schema::create('schedule_tbls', function (Blueprint $table) {
            $table->id('sched_id');
            $table->string('em_id', 20);
            $table->foreign('em_id')->references('em_id')->on('employee_tbls');
            $table->string('sched_title', 30)->nullable();
            $table->text('sched_description')->nullable();
            $table->date('sched_date')->nullable();
            $table->string('sched_type', 15)->nullable();
            $table->string('sched_status', 15)->nullable();
            $table->text('sched_picture');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedule_tbls');
        
    }
};
