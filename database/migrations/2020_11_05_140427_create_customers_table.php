<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('identity_file_type')->nullable();
            $table->string('identity_file')->nullable();
            $table->tinyInteger('identity_status')->default(0);
            $table->string('location_file_type')->nullable();
            $table->string('location_file')->nullable();
            $table->tinyInteger('location_status')->default(0);
            $table->string('verify_code')->nullable();
            $table->string('customer_image')->nullable();
            $table->tinyInteger('account_status')->default(0);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('customers');
    }
}
