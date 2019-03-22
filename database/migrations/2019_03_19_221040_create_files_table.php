<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {
            $table->increments('id');
            $table->string('label');
            $table->string('type');
        });

        Schema::create('file_user', function (Blueprint $table) {
            $table->increments('id');
            $table->string('file_dir');
            $table->integer('user_id')->unsigned()->index();
            $table->integer('file_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users');
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
        
        Schema::table('file_user', function (Blueprint $table) {
            $table->dropForeign(['file_id']);
            $table->dropForeign(['user_id']);
        });
        Schema::dropIfExists('files');
        Schema::dropIfExists('file_user');
    }
}
