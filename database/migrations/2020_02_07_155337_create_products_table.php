<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('category_id')->unsigned();
            $table->bigInteger('currency_id')->unsigned();
            $table->bigInteger('unit_id')->unsigned();
            $table->string('barcode');
            $table->string('name');
            $table->bigInteger('stock')->unsigned();
            $table->string('selling_price');
            $table->string('purchase_price');
            $table->string('discount')->nullable();
            $table->string('laba')->nullable();
            $table->string('ppn')->nullable();
            $table->text('keterangan');
            $table->timestamps();

            $table->foreign("category_id")->references("id")->on("categories")->onUpdate("cascade")->onDelete("cascade");
            $table->foreign("currency_id")->references("id")->on("currencies")->onUpdate("cascade")->onDelete("cascade");
            $table->foreign("unit_id")->references("id")->on("units")->onUpdate("cascade")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
