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
        Schema::create('rec_news_tbls', function (Blueprint $table) {
            $table->id('rec_id');

            $table->string('em_id', 50)->nullable();
            $table->foreign('em_id')->references('em_id')->on('employee_tbls')->onDelete('cascade');

            // link
                $table->string('rec_link1')->nullable();
                $table->string('rec_link2')->nullable();
                $table->string('rec_link3')->nullable();
                $table->string('rec_link4')->nullable();
            // title
                $table->string('rec_title1')->nullable();
                $table->string('rec_title2')->nullable();
                $table->string('rec_title3')->nullable();
                $table->string('rec_title4')->nullable();
            //images
                $table->string('rec_img1')->nullable();
                $table->string('rec_img2')->nullable();
                $table->string('rec_img3')->nullable();
                $table->string('rec_img4')->nullable();

            $table->string('rec_status', 20)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rec_news_tbls');
    }
};
