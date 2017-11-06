<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications', function(Blueprint $t)
        {
            $t->increments('id');
            $t->timestamps();
            $t->softDeletes();
            $t->string('nickname');
            $t->string('email')->nullable();
            $t->string('discord')->nullable();
            $t->integer('class_id');
            $t->integer('specialization_id');
            $t->longText('application_content');
            $t->integer('is_approved')->nullable();
            $t->integer('handled_by_user')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('applications');
    }
}
