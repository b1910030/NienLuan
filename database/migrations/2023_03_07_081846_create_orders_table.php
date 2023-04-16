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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_number');
            $table->bigInteger('user_id');
            $table->double('sub_total');
            $table->bigInteger('tour_id');
            $table->double('coupon');
            $table->double('total_amount');
            $table->integer('quantity');
            $table->enum('payment_method', ['cod','paypal']);
            $table->enum('payment_status', ['paid','unpaid']);
            $table->enum('status', ['book','cancel']);
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('phone');
            $table->string('address');
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
};
