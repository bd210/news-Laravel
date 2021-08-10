<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_files', function (Blueprint $table) {

            $table->unsignedBigInteger('post_id');
            $table->unsignedBigInteger('file_id');

            $table->foreign('post_id')
                ->on('posts')
                ->references('id')
                ->onDelete('cascade');

            $table->foreign('file_id')
                ->on('files')
                ->references('id')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post_files');
    }
}
