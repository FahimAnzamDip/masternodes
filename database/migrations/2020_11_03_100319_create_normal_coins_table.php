<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNormalCoinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('normal_coins', function (Blueprint $table) {
            $table->id();
            $table->string('coin_name');
            $table->string('coin_short_name');
            $table->string('coin_image')->nullable();
            $table->string('coin_link');
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
        Schema::dropIfExists('normal_coins');
    }
}
