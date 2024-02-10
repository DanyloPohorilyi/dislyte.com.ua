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
        Schema::create('espers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('god')->unique();
            $table->string('rarity');
            $table->foreignId('element_id')->constrained('elements');
            $table->string('role', 15);
            $table->string('short_description', 200)->nullable();
            $table->string('quote',);
            $table->integer('age')->unsigned();
            $table->string('birthday', 50)->nullable();
            $table->integer('height')->unsigned()->nullable()->comment('cm');
            $table->json('favorites')->nullable();
            $table->string('identity', 100)->nullable();
            $table->string('affilation', 100)->nullable();
            $table->text('game_advice')->nullable();
            $table->foreignId('equipment_advice1_id')->constrained('equipment_advice');
            $table->foreignId('equipment_advice2_id')->constrained('equipment_advice');
            $table->foreignId('equipment_advice3_id')->constrained('equipment_advice');
            $table->json('to_upgrade_stats')->nullable();
            $table->foreignId('sprite1_id')->constrained('images');
            $table->foreignId('sprite2_id')->constrained('images');
            $table->foreignId('icon_id')->constrained('images');
            $table->foreignId('resonance_img_id')->constrained('images');
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
        Schema::dropIfExists('espers');
    }
};
