<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('order_id');
            $table->bigInteger('product_id');
            $table->string('product_name');
            $table->enum('type', ["100ml", "200ml", "300ml"]);
            $table->float('per_item_price')->default(0);
            $table->integer('quantity')->default(0);
            $table->float('total_price')->default(0);
            $table->string('created_by')->default(1);
            $table->string('updated_by')->default(1);
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
        Schema::dropIfExists('order_items');
    }
}
