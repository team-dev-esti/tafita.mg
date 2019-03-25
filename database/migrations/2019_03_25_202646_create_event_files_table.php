<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_file', function (Blueprint $table) {
           $table->increments('id');
            $table->integer('event_id')->unsigned()->index();
            $table->integer('file_id')->unsigned()->index();
            $table->foreign('event_id')->references('id')->on('events');
            $table->foreign('file_id')->references('id')->on('files');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('event_file', function (Blueprint $table) {
            $table->dropForeign(['file_id']);
            $table->dropForeign(['event_id']);
        });
        Schema::dropIfExists('event_file');
    }
}
