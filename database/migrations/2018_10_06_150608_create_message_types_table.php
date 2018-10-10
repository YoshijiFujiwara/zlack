<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessageTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('message_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique()->comment('メッセージタイプの名称(MessageContentsのカラム名に対応すべき)');
            $table->string('column_name')->nullable()->comment('message_contentsテーブルに対応するカラム名');
            $table->string('description')->nullable()->comment('メッセージタイプの説明');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('message_types');
    }
}
