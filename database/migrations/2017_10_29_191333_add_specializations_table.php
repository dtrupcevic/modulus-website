<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSpecializationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('specializations', function(Blueprint $t)
        {
            $t->increments('id');
            $t->timestamps();
            $t->softDeletes();
            $t->integer('class_id');
            $t->integer('role_id');
            $t->string('title');
            $t->string('icon_css')->nullable();
            $t->string('icon_image')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('specializations');
    }
}
