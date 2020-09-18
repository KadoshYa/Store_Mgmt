<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('asset_id');
            $table->integer('employee_id');
            $table->string('order_description');
            $table->integer('order_quantity');
            $table->string('order_type')->default('normal');
            $table->string('order_status')->default('ongoing');
            $table->integer('managed_by')->nullable();
            $table->datetime('request_date')->nullable();
            $table->datetime('response_date')->nullable();

            $table->softDeletes();
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
        Schema::dropIfExists('orders');
    }
}
