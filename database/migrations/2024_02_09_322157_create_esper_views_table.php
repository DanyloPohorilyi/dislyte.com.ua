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
        Schema::create('esper_views', function (Blueprint $table) {
            $table->id();
            $table->foreignId('esper_id')->constrained('espers');
            $table->integer('day');
            $table->integer('month');
            $table->integer('year');
            $table->integer('count_views');
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
        Schema::dropIfExists('esper_views');
    }
};
