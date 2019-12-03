<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('question', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('status_id');
            $table->unsignedBigInteger('lesson_id');
            $table->unsignedBigInteger('answer_type_id');
            $table->string('name', 255);
            $table->float('points');

            $table->foreign('status_id')->references('id')->on('status')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('lesson_id')->references('id')->on('lesson')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('answer_type_id')->references('id')->on('answer_type')
                ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('question');
    }
}
