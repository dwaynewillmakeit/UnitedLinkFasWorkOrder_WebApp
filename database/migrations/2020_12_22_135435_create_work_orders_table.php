<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_orders', function (Blueprint $table) {
            $table->id();
            $table->char('guid',36)->unique();
            $table->bigInteger('billing_address_id')->unsigned()->index();
            $table->bigInteger('site_address_id')->unsigned()->index();
            $table->bigInteger('client_id')->unsigned()->index();
            $table->date('issue_date');
            $table->string('po_number')->nullable();
            $table->string('requested_by');
            $table->string('requested_by_tel');
            $table->string('person_to_see');
            $table->string('person_to_see_tel');
            $table->string('service_type');
            $table->string('work_required');
            $table->text('work_details');
            $table->boolean('work_completed');
            $table->integer('number_of_technician');
            $table->integer('number_of_apprentice');
            $table->float('hours',5,1);
            $table->float('travel_hrs',5,1);
            $table->binary('site_rep_signature');
            $table->binary('technician_signature');
            $table->boolean('is_signed');
            $table->boolean('is_synced');
            $table->bigInteger('created_by')->unsigned()->index();
            $table->bigInteger('updated_by')->unsigned()->index();
            $table->dateTime("first_uploaded");
            $table->dateTime("date_uploaded");
            $table->timestamps();

            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('updated_by')->references('id')->on('users');
            $table->foreign('billing_address_id')->references('id')->on('client_addresses');
            $table->foreign('site_address_id')->references('id')->on('client_addresses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('work_orders');
    }
}
