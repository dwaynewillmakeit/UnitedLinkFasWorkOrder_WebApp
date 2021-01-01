<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_addresses', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('address_type_id')->unsigned()->index();
            $table->bigInteger('client_id')->unsigned()->index();
            $table->string('street');
            $table->string('city');
            $table->char('state',2)->index();
            $table->string('zipcode',8);
            $table->bigInteger('created_by')->unsigned()->index();
            $table->bigInteger('updated_by')->unsigned()->index();
            $table->timestamps();

            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('updated_by')->references('id')->on('users');

            $table->foreign('address_type_id')->references('id')->on('client_address_types');
            $table->foreign('client_id')->references('id')->on('clients');
            $table->foreign('state')->references('abrev')->on('states');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('client_addresses');
    }
}
