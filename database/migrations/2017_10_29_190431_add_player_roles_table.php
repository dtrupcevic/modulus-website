<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPlayerRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function(Blueprint $t)
        {
            $t->increments('id');
            $t->timestamps();
            $t->softDeletes();
            $t->string('title');
            $t->string('css_class')->nullable();
            $t->string('color_hex')->nullable();
            $t->string('image')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('roles');
    }
}
