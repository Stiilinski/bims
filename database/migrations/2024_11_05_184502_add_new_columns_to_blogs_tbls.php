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
        Schema::table('blogs_tbls', function (Blueprint $table) {
            $table->string('blog_subtitle',100)->after('blog_title')->nullable();
            $table->string('blog_qoute')->after('blog_subtitle')->nullable();
            $table->string('blog_pic')->after('blog_author')->nullable();
            $table->string('blog_picLocation',100)->after('blog_pic')->nullable();
            $table->string('blog_picOwner',80)->after('blog_picLocation')->nullable();
            $table->string('blog_fbLink',150)->after('blog_picOwner')->nullable();
            $table->string('blog_xLink',150)->after('blog_fbLink')->nullable();
            $table->string('blog_inLink',150)->after('blog_xLink')->nullable();
            $table->string('blog_insLink',150)->after('blog_inLink')->nullable();   
            $table->json('blog_recommend')->after('blog_insLink')->nullable();
            $table->json('blog_recommendPic')->after('blog_recommend')->nullable();  
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('blogs_tbls', function (Blueprint $table) {
            $table->dropColumn([
                'blog_subtitle',
                'blog_qoute',
                'blog_pic',
                'blog_picLocation',
                'blog_picOwner',
                'blog_fbLink',
                'blog_xLink',
                'blog_inLink',
                'blog_insLink',
                'blog_recommend',
                'blog_recommendPic',
            ]);
        });
    }
};
