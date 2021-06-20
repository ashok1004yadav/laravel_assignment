<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order');
            $table->text('question');
            $table->string('option_a');
            $table->string('option_b');
            $table->string('option_c');
            $table->string('option_d');
            $table->string('option_e');
            $table->string('option_f');
            $table->bigInteger('option_id')->unsigned()->index();
            $table->bigInteger('course_id')->unsigned()->index();
            $table->bigInteger('status_id')->unsigned()->index();
            $table->foreign('option_id')->references('id')->on('user_variables');
            $table->foreign('course_id')->references('id')->on('courses');
            $table->foreign('status_id')->references('id')->on('system_variables');
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
        Schema::dropIfExists('orders');
    }
}
