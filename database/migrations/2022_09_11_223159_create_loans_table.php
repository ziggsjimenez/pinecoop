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
            $table->double('loan_amount',20,4);
            $table->double('interest',20,4);
            $table->integer('no_of_terms');
            $table->date('date_applied');
            $table->date('date_approved');
            $table->integer('loan_officer')->unsigned()->references('id')->on('employees')->onDelete('restrict');
            $table->text('status');
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
