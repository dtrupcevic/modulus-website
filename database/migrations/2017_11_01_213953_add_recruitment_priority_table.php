<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRecruitmentPriorityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recruitment_priority', function(Blueprint $t)
        {
            $t->increments('id');
            $t->string('title');
            $t->string('icon_path')->nullable();
            $t->string('css_class')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('recruitment_priority');
    }
}
