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
            $table->string('lastName',40);
            $table->string('email',100);
            $table->string('mobile',12);
            $table->string('empCode',20);
            $table->string('department',20);
            $table->string('designation',20);
            $table->string('address');
            $table->date('joiningDate');
            $table->string('ctc',20);
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
