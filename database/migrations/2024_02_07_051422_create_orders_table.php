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
			$table->string('username');
			$table->integer('excel_sl_no');
			$table->string('invoice_no');
			$table->string('customer_name');
			$table->text('address');
			$table->string('city');
			$table->string('state');
            $table->string('zipcode');
            $table->date('invoice_date');
            $table->double('total_amount',10,2);
            $table->double('discount_coupon',10,2);
            $table->double('gstAmt',10,2);
            $table->double('grand_total',10,2); 
			$table->integer('order_type');
            $table->tinyInteger('status')->default('1');
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
