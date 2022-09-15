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
        Schema::create('loantypes', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->double('interest', 20,4);
            $table->integer('paymentterms');
            $table->double('maxloanamount', 20,4);
            $table->text('type');
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
        Schema::dropIfExists('loantypes');
    }
};
