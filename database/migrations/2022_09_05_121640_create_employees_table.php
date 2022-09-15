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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->text('lastname');
            $table->text('firstname');
            $table->text('middlename');
            $table->text('extension')->nullable();
            $table->date('birthdate');
            $table->text('civilstatus');
            $table->text('sex');
            $table->text('religion');
            $table->text('chapanumber')->nullable();
            $table->text('department');
            $table->text('position');
            $table->date('employmentdate');
            $table->text('phonenumber');
            $table->text('educationalattainment');
            $table->decimal('estimatedannualgross',10,2);
            $table->text('tin')->nullable();
            $table->boolean('ispersonwithdisability');
            $table->text('prahouseno')->nullable();
            $table->text('prabuildingstreet')->nullable();
            $table->text('prasubdivision')->nullable();
            $table->text('prabarangay');
            $table->text('pramun');
            $table->text('praprov');
            $table->text('prazipcode');
            $table->text('peahouseno')->nullable();
            $table->text('peabuildingstreet')->nullable();
            $table->text('peasubdivision')->nullable();
            $table->text('peabarangay');
            $table->text('peamun');
            $table->text('peaprov');
            $table->text('peazipcode');
            $table->text('pmailadd')->nullable();
            $table->text('email')->nullable();
            $table->text('fbaccount')->nullable();
            $table->boolean('ispinecoopmem');
            $table->date('dateofmembership')->nullable();
            $table->text('pwdid')->nullable();
            $table->boolean('deleted')->default(false);
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
        Schema::dropIfExists('employees');
    }
};
