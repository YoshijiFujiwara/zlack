<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessageContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('message_contents', function (Blueprint $table) {
            $table->string('origin_id')->unique()->comment('元のメッセージID');
            $table->text('sentence')->nullable()->comment('文章形式の場合');
            $table->string('file_path')->nullable()->comment('ファイルの添付の場合');
            $table->string('share_message_id')->nullable()->comment('他のメッセージの共有だった場合');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('message_contents');
    }
}
