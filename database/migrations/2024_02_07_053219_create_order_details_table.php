<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->id();
			$table->integer('order_id');
			$table->integer('category');
			$table->integer('subcategory');
			$table->integer('cabinet_type');
			$table->string('width');
			$table->string('length ');
			$table->string('deep');
            $table->integer('quantity');
            $table->integer('material');
            $table->integer('cabinetcolour');
            $table->integer('exposide');
            $table->string('expo_colour');
            $table->integer('shutter_material');
            $table->string('shutter_colour');
            $table->integer('leg_type');
            $table->string('skthigh');
            $table->integer('handel_type');
            $table->string('shutter_finish');
            $table->text('remarks');
            $table->double('price',10,2);
            $table->double('LXD',10,2);
            $table->double('WXL',10,2);
            $table->string('WXD',10,2);
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
        Schema::dropIfExists('order_details');
    }
}
