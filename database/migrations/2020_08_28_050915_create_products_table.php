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
            $table->bigInteger('category_id')->default(0);
            $table->string('name')->nullable();
            $table->text('description')->nullable();
            $table->string('img')->nullable();
            $table->float('price')->default(0);
            $table->enum('type', ["100ml", "200ml", "300ml"]);
            $table->tinyInteger('is_active')->default(0);
            $table->tinyInteger('is_morning')->default(0);
            $table->tinyInteger('is_afternoon')->default(0);
            $table->tinyInteger('is_cookie')->default(0);
            $table->tinyInteger('is_flavour')->default(0);
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
        Schema::dropIfExists('products');
    }
}
