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
            $table->string('start_time');
            $table->int('start_time_strtotime')->nullable();
            $table->int('end_time_strtotime')->nullable();
            $table->string('end_time');
            $table->text('start_date');
            $table->text('end_date');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('trailer_id');
            $table->foreign('trailer_id')->references('id')->on('trailers')->onDelete('cascade');
            $table->double('amount');
            $table->integer('charges');
            $table->integer('discount_price')->nullable();
            $table->enum('status', ['New Order','Pick Up','Refund Request', 'Completed'])->default('New Order');
            $table->tinyInteger('payment_status')->default(0);
            $table->string('payment_method')->nullable();
            $table->unsignedBigInteger('coupon_id')->nullable();
            $table->foreign('coupon_id')->references('id')->on('coupons');
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
