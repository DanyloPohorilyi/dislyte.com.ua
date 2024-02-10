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
        Schema::create('equipment_advice', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('set_four_id')->constrained('equipment');
            $table->foreignId('set_two_id')->constrained('equipment');
            $table->string('description');
            $table->json('stats_to_upgrade');
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
        Schema::dropIfExists('equipment_advice');
    }
};
