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
            $table->foreignId('payment_method_id')->references('id')->on('payment_methods')->constrained();
            $table->string('discount')->nullable();
            $table->string('coupon')->nullable();
            $table->string('status')->index();
            $table->bigInteger('total_product')->index();
            $table->double('total_price')->index();
            $table->foreignId('ship_method_id')->references('id')->on('ship_methods')->constrained();
            $table->foreignId('staff_id')->references('id')->on('users')->constrained();
            $table->foreignId('customer_id')->references('id')->on('users')->constrained();
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
