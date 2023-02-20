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
        Schema::create('salaries', function (Blueprint $table) {
            $table->id();
            $table->string('company_id',5);
            $table->string('empCode',20);
            $table->string('days_worked',20);
            $table->string('basic',20);
            $table->string('pf',20);
            $table->string('hra',20);
            $table->string('pt',20);
            $table->string('cca',20);
            $table->string('esic',20);
            $table->string('shift_allowance',20);
            $table->string('advance',20);
            $table->string('skill_allowance',20);
            $table->string('leave_encashment',20);
            $table->string('gross_earning',20);
            $table->string('total_deduction',20);
            $table->string('net_pay',20);
            $table->string('slip_url',100)->nullable();
            $table->string('salary_date')->nullable();
            $table->timestamps();
        });
    }

    /**'
     * 
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('salaries');
    }
};
