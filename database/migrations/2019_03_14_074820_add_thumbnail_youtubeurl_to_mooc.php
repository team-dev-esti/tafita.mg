<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddThumbnailYoutubeurlToMooc extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('moocs', function (Blueprint $table) {
            $table->string('thumbnail');
            $table->string('youtube_video')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('moocs', function (Blueprint $table) {
            $table->dropColumn('thumbnail');
            $table->dropColumn('youtube_video');
        });
    }
}
