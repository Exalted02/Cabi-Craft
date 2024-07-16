<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpanseTrackersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expanse_trackers', function (Blueprint $table) {
            $table->id();
			$table->string('miscellaneous');
            // $table->string('price');
			$table->foreignId('expensetypes_id');
			$table->decimal('amount', 8, 2);
			$table->date('date');
			$table->foreignId('paymentmode_id');
			$table->longText('remark');
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
        Schema::dropIfExists('expanse_trackers');
    }
}
