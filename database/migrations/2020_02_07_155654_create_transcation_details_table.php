<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTranscationDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transcation_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('total');
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('pay');
            $table->bigInteger('kembalian');
            $table->string('metode_pay');
            $table->timestamps();

            $table->foreign("user_id")->references("id")->on("users")->onUpdate("cascade")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transcation_details');
    }
}
