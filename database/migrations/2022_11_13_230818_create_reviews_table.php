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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->string('relevance');
            $table->string('contribution');
            $table->string('structure');
            $table->string('standard');
            $table->string('studymethod');
            $table->string('relevanceclarity');
            $table->string('abstract');
            $table->string('keyphrases');
            $table->string('discussion');
            $table->string('reference');
            $table->string('comments');
            $table->string('status');
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
        Schema::dropIfExists('reviews');
    }
};
