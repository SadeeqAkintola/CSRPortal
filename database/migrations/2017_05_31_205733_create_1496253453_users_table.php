<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create1496253453UsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('users')) {
            Schema::create('users', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name');
                $table->string('email')->unique();
                $table->string('password');
                $table->string('lastname')->nullable();
                $table->string('firstname')->nullable();
                $table->integer('role_id')->unsigned()->nullable();
                $table->foreign('role_id', '41521_592f040dd61ce')->references('id')->on('roles')->onDelete('cascade');
                $table->string('phone')->nullable();
                $table->string('remember_token')->nullable();
                $table->softDeletes();
                
                $table->timestamps();
                
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
