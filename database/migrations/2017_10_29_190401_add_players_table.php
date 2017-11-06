<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPlayersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('players', function(Blueprint $t)
        {
            $t->increments('id');
            $t->timestamps();
            $t->softDeletes();
            $t->string('nickname');
            $t->integer('class_id');
            $t->integer('specialization_id');
            $t->integer('rank_id');
            $t->string('flavor')->nullable();
            $t->string('armory_url')->nullable();
            $t->string('description')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('players');
    }
}
