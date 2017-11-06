<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SeedRanksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $data = [
            [
                'id'            => 1,
                'title'         => 'Guild Master',
                'importance'    => 1
            ],
            [
                'id'            => 2,
                'title'         => 'Officer',
                'importance'    => 2,
            ],
            [
                'id'            => 3,
                'title'         => 'Core Raider',
                'importance'    => 3,
            ],
            [
                'id'            => 4,
                'title'         => 'Raider',
                'importance'    => 4
            ],
            [
                'id'            => 5,
                'title'         => 'Trial',
                'importance'    => 5
            ],
            [
                'id'            => 6,
                'title'         => 'Social',
                'importance'    => 6
            ]
        ];

        \DB::table('ranks')->insert($data);
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
