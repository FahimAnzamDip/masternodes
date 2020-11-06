<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('customers', function (Blueprint $table) {
            $table->string('admin_verify_code')->nullable();
            $table->timestamp('address_verified_at')->nullable();
            $table->timestamp('identity_verified_at')->nullable();
            $table->timestamp('phone_verified_at')->nullable();
            $table->timestamp('account_verified_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('customers', function (Blueprint $table) {
            $table->dropColumn('admin_verify_code');
            $table->dropColumn('location_verified_at');
            $table->dropColumn('identity_verified_at');
            $table->dropColumn('phone_verified_at');
            $table->dropColumn('account_verified_at');
        });
    }
}
