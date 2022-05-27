<?php

use Carbon\Carbon;
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
        Schema::create('booking_trainers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('trainer_id')->unsigned();
            $table->foreign('trainer_id')
                ->references('id')->on('trainers')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->integer('status');
            $table->timestamp('start')->default(Carbon::now());
            $table->timestamp('end')->default(Carbon::now());
            $table->string('title',100);
            $table->text('description');
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
        Schema::dropIfExists('booking_trainers');
    }
};
