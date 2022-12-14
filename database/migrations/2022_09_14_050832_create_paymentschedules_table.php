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
        Schema::create('paymentschedules', function (Blueprint $table) {
            $table->id();
            $table->foreignId('loan_id');
            $table->date('paymentdate');
            $table->decimal('principal',10,2);
            $table->decimal('interest',10,2);
            $table->decimal('monthlyamort',10,2);
            $table->decimal('balance',10,2);
            $table->boolean('ispaid')->default(false);
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
        Schema::dropIfExists('paymentschedules');
    }
};
