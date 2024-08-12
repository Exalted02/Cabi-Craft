<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cartorderforms', function (Blueprint $table) {
            $table->id();
			$table->string('project_name');
			$table->text('address');
			$table->string('city');
			$table->string('zip_code');
			$table->string('state');
			$table->string('country');
			$table->string('mobile');
			$table->string('project_type');
			$table->longtext('room_name');
			$table->tinyInteger('status')->default(1)->comment('0=inactive;1=active;2=deleted');
			$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cartorderforms');
    }
};
