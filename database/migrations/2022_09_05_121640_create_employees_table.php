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
            $table->date('date_registered');
            $table->text('Lastname');
            $table->text('Firstname')->nullable();
            $table->text('Middlename')->nullable();
            $table->text('Extension')->nullable();
            $table->date('Birthdate')->nullable();
            $table->text('Civil_Status')->nullable();
            $table->text('Sex')->nullable();
            $table->text('Religion')->nullable();
            $table->text('Department')->nullable();
            $table->text('Position')->nullable();
            $table->date('Employment_date')->nullable();
            $table->text('Phone_number')->nullable();
            $table->text('Educational_attainment')->nullable();
            $table->decimal('Estimated_annual_gross',10,2)->nullable();
            $table->text('TIN')->nullable();
            $table->boolean('isPersonWitthDisability')->nullable();
            $table->text('PRA_house_no')->nullable();
            $table->text('PRA_building_street')->nullable();
            $table->text('PRA_subdivision')->nullable();
            $table->text('PRA_barangay')->nullable();
            $table->text('PRA_municipality')->nullable();
            $table->text('PRA_province')->nullable();
            $table->text('PRA_zipcode')->nullable();
            $table->text('PEA_house_no')->nullable();
            $table->text('PEA_building_street')->nullable();
            $table->text('PEA_subdivision')->nullable();
            $table->text('PEA_barangay')->nullable();
            $table->text('PEA_municipality')->nullable();
            $table->text('PEA_province')->nullable();
            $table->text('PEA_zipcode')->nullable();
            $table->text('preferred_mailing_address')->nullable();
            $table->text('email_address')->nullable();
            $table->text('facebook_account')->nullable();
            $table->boolean('isPINECOOP_member')->nullable();
            $table->date('date_of_membership')->nullable();
            $table->text('pwdid')->nullable();
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
