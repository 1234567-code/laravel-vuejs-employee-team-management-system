<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use app\Http\Controllers\EmployeeController;

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
            $table->string('employee_code', 20)->nullable(false);
            $table->string('employee_name',64);
            $table->bigInteger('user_accounts_id')->unsigned();
            //$table->foreignId('user_accounts_id')
                //->constrained()
                //->onUpdate('cascade')
               // ->onDelete('cascade');
            //$table->foreign('user_accounts_id')->references('id')->on('user_accounts')->onDelete('cascade');
            //$table->foreignId('user_account_id')->constrained('user_account');
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
