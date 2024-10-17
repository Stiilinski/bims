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
        Schema::table('dengue_tbls', function (Blueprint $table) {
            $table->date('dengue_inclusiveDate')->after('dengue_hospitalized')->nullable();
            $table->date('dengue_hospWhen')->after('dengue_inclusiveDate')->nullable();
            $table->string('dengue_hospLong', 50)->after('dengue_hospWhen')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('dengue_tbls', function (Blueprint $table) {
            $table->dropColumn('dengue_hospLong');
            $table->dropColumn('dengue_hospWhen');
            $table->dropColumn('dengue_inclusiveDate');
        });
    }
};
