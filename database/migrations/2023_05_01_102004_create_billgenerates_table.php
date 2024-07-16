<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillgeneratesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('billgenerates', function (Blueprint $table) {
            $table->id();
			$table->integer('customer_name');
			$table->date('bill_date');
			$table->decimal('bill_amount', 8, 2);
			$table->decimal('received_amount', 8, 2);
			$table->decimal('discount', 8, 2);
			$table->string('bill_number');
			$table->integer('payment_mode');
			$table->string('remarks');
			$table->tinyInteger('status')->default(1)->comment('0=inactive,1=active,2=deleted');
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
        Schema::dropIfExists('billgenerates');
    }
}
