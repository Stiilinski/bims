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
        Schema::table('brgy_officials_tbls', function (Blueprint $table) {
            $table->string('facebook_Link',100)->after('of_picture')->nullable();
            $table->string('x_Link',100)->after('facebook_Link')->nullable();
            $table->string('insta_Link',100)->after('x_Link')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('brgy_officials_tbls', function (Blueprint $table) {
            //
        });
    }
};
