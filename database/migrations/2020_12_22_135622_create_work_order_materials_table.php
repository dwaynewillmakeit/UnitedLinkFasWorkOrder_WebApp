<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkOrderMaterialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_order_materials', function (Blueprint $table) {
            $table->id();
            $table->char('guid',36)->unique();
            $table->bigInteger('work_order_id')->unsigned()->index();
            $table->char('work_order_guid',36)->index();
            $table->string('quantity',35);
            $table->string('part_number',50);
            $table->string('material_description');
            $table->timestamps();

            $table->foreign('work_order_id')->references('id')->on('work_orders');
            $table->foreign('work_order_guid')->references('guid')->on('work_orders');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('work_order_materials');
    }
}
