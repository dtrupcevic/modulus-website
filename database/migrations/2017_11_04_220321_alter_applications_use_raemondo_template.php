<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterApplicationsUseRaemondoTemplate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('applications', function(Blueprint $t)
        {
            $t->dropColumn('email');
            $t->dropColumn('discord');
            $t->string('armory_url');
            $t->string('warcraftlogs_url');
            $t->text('about');
            $t->text('experience');
            $t->text('previous_guild');
            $t->text('expectations_from_guild');
            $t->integer('can_attend');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('applications', function(Blueprint $t)
        {
            $t->string('email')->nullable();
            $t->string('discord')->nullable();
            $t->dropColumn('armory_url');
            $t->dropColumn('warcraftlogs_url');
            $t->dropColumn('about');
            $t->dropColumn('experience');
            $t->dropColumn('previous_guild');
            $t->dropColumn('expectations_from_guild');
            $t->dropColumn('can_attend');
        });
    }
}
