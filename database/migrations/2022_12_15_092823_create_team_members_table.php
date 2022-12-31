<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use app\Http\Controllers\TeamMemberController;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    
    public function up()
    {
        Schema::create('team_members', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('teams_id');
            //$table->foreign('team_id')->references('id')->on('team');
            $table->bigInteger('employees_id');
            //$table->foreign('employee_id')->references('id')->on('employee');
            $table->bigInteger('roles_id');
            //$table->foreign('role_id')->references('id')->on('role');
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
        Schema::dropIfExists('team_members');
    }
};
