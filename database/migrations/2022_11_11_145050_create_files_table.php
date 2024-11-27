<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {
            $table->id();
            $table->Integer('conference_id');
            $table->foreign('conference_id')->references('id')->on('conferences');
            $table->string('title');
            $table->string('abstract');
            $table->string('keyword');
            $table->string('scopes');
            $table->foreign('scopes')->references('scopes')->on('scopes');
            $table->string('file');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('files');
    }
};
