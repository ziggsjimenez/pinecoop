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
            $table->integer('minpaymentterms');
            $table->integer('maxpaymentterms');
            $table->double('minloanamount', 20,4);
            $table->double('maxloanamount', 20,4);
            $table->integer('minlengthofservice');
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
