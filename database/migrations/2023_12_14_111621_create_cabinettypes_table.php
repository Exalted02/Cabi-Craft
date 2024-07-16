<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCabinettypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cabinettypes', function (Blueprint $table) {
            $table->id();
			$table->string('subcategory_id');
			$table->string('name');
			$table->string('LXD');
			$table->string('WXD');
			$table->string('WXL');
			$table->string('hardware_amt');
            $table->string('image');
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
        Schema::dropIfExists('cabinettypes');
    }
}
