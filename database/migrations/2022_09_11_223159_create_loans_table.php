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
        Schema::create('loans', function (Blueprint $table) {
            $table->id();
            $table->integer('employee_id')->unsigned()->references('id')->on('employees')->onDelete('restrict');
            $table->integer('loantype_id')->unsigned()->references('id')->on('loantypes')->onDelete('restrict');
            $table->double('amount',20,4);
            $table->double('interest',20,4);
            $table->integer('terminmonths');
            $table->double('maxloanamount',20,4);
            $table->text('type');
            $table->date('dateapplied');
            $table->date('dateapproved');
            $table->integer('loanofficer')->unsigned()->references('id')->on('employees')->onDelete('restrict');
            $table->text('status');
            $table->boolean('isapproved');
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
        Schema::dropIfExists('loans');
    }
};
