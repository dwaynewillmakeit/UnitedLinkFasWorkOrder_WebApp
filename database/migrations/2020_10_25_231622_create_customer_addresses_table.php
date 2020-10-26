<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_addresses', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('address_type_id')->unsigned()->index();
            $table->bigInteger('customer_id')->unsigned()->index();
            $table->string('address_line_1');
            $table->string('address_line_2')->nullable();
            $table->string('city');
            $table->bigInteger('state')->unsigned()->index();
            $table->string('zipcode',8);
            $table->timestamps();

            $table->foreign('address_type_id')->references('id')->on('customer_address_types');
            $table->foreign('customer_id')->references('id')->on('customer_address_types');
            $table->foreign('state')->references('id')->on('states');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer_addresses');
    }
}
