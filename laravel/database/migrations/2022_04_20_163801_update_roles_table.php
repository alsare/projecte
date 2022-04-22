<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perms', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('desc');
        });
        Schema::create('role_perms', function (Blueprint $table) {
            $table->role_id();
            $table->perm_id();
        });
        Schema::table('role_perms', function (Blueprint $table) {
            $table->foregin('role_id')->references('id')->on('roles');
            $table->foregin('perm_id')->references('id')->on('perms');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
