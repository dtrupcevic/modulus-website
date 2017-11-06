<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterSpecializationsTableAddAvatar extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('specializations', function(Blueprint $t)
        {
            $t->string('avatar_path');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('specializations', function(Blueprint $t)
        {
            $t->dropColumn('avatar_path');
        });
    }
}
