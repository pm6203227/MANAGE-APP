<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequisitionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requisitions', function (Blueprint $table) {
            $table->id();
            $table->string('order')->nullable();
            $table->string('provider')->nullable();
            $table->date('order_date')->nullable();
            $table->date('payment_date')->nullable();
            $table->string('delivery_terms')->nullable();
            $table->string('article')->nullable();
            $table->integer('quantity')->nullable();
            $table->decimal('unit_price',8,2)->nullable();
            $table->decimal('total',8,2)->nullable();
            $table->string('produced_by')->nullable();
            $table->string('approved_by')->nullable();
            $table->string('received_by')->nullable();
            $table->integer('user_id')->nullable();
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
        Schema::dropIfExists('requisitions');
    }
}
