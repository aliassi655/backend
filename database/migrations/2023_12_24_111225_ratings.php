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
        Schema::create('ratings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('hotel_id');
            $table->rememberToken();
            $table->timestamps();
            $table->foreign('customer_id')->on('customers')->references('id')->onDelete('cascade');
            $table->foreign('hotel_id')->on('hotels')->references('id')->onDelete('cascade');
            $table->string('rate');
            $table->string('comment');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ratings');
    }
};
