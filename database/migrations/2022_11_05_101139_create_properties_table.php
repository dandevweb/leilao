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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->decimal('price', 12, 2);
            $table->decimal('increment');
            $table->string('category');
            $table->string('type');
            $table->text('description');
            $table->integer('area_total');
            $table->integer('area_util');
            $table->text('address');
            $table->string('city');
            $table->string('state');
            $table->foreignId('auction_id')->constrained();
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
        Schema::dropIfExists('properties');
    }
};