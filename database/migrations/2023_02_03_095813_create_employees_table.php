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
            $table->string('user_id',5);
            $table->string('firstName',40);
            $table->string('middleName',40);
            $table->string('lastName',40);
            $table->string('email',100);
            $table->string('mobile',12);
            $table->string('mobile2',12);
            $table->string('photo')->nullable();;
            $table->string('department',20);
            $table->string('designation',20);
            $table->string('p_address');
            $table->integer('reporting')->nullable()->comment("reporting manage emp id");
            $table->string('address');
            $table->string('city');
            $table->string('grade');
            $table->string('esic_no');
            $table->string('dob');
            $table->integer('marital_status')->comment("unmarried=0,married=1");
            $table->integer('gender')->comment("male=0,female=1");
            $table->date('joiningDate');
            $table->string('ctc',20);
            $table->string('aadhar',20);
            $table->string('pancard',20);
            $table->string('passport',20);
            $table->string('bank');
            $table->string('account_no',20);
            $table->string('name_bank');
            $table->string('branch_name');
            $table->string('ifsc');
            $table->date('last_working_date')->nullable();
            $table->string('on_notice')->nullable()->comment("1=yes,0=no")->default(0);
            $table->string('is_senior')->nullable()->comment("1=yes,0=no")->default(0);
            $table->string('status')->nullable()->comment("1=active,0=inactive")->default(1);
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
