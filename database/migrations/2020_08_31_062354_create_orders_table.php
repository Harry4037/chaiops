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
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->default(0);
            $table->float('item_total_amount')->default(0);
            $table->float('tax_amount')->default(0);
            $table->float('total_amount')->default(0);
            $table->enum('order_type', ["COD", "ONLINE", "REWARD POINT"]);
            $table->string('address')->nullable();
            $table->string('name')->nullable();
            $table->string('mobile_number')->nullable();
            $table->string('address_lat')->nullable();
            $table->string('address_long')->nullable();
            $table->tinyInteger('status')->default(1)->comment('0=>Failed,1=>Pending,2=>Confirmed,3=>Assign to staff,4=>Delivered,5=>cancelled');
            $table->tinyInteger('pay_mode')->default(0)->comment('0=>NONE,1=>PAYTM,2=>PAYUMONEY');
            $table->enum('payment_text', ["PENDING", "CONFIRMED", "FAILED", "REFUNDED", "CANCELLED"]);
            $table->enum('cancel_by', ["CANCELLED", "CANCELLED BY USER", "CANCELLED BY STAFF", "CANCELLED BY ADMIN"]);
            $table->string('transaction_id')->nullable();
            $table->string('cancel_description')->nullable();
            $table->time('time_1')->nullable();
            $table->time('time_2')->nullable();
            $table->time('time_3')->nullable();
            $table->time('time_4')->nullable();
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
        Schema::dropIfExists('orders');
    }
}
