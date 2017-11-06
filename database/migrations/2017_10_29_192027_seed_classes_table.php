<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SeedClassesTable extends Migration
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
                'id'        => 1,
                'title'     => 'Death Knight',
                'color_hex' => '#C41F3B'
            ],
            [
                'id'        => 2,
                'title'     => 'Demon Hunter',
                'color_hex' => '#A330C9'
            ],
            [
                'id'        => 3,
                'title'     => 'Druid',
                'color_hex' => '#FF7D0A'
            ],
            [
                'id'        => 4,
                'title'     => 'Hunter',
                'color_hex' => '#ABD473'
            ],
            [
                'id'        => 5,
                'title'     => 'Mage',
                'color_hex' => '#69CCF0'
            ],
            [
                'id'        => 6,
                'title'     => 'Monk',
                'color_hex' => '#00FF96'
            ],
            [
                'id'        => 7,
                'title'     => 'Paladin',
                'color_hex' => '#F58CBA'
            ],
            [
                'id'        => 8,
                'title'     => 'Priest',
                'color_hex' => '#FFFFFF'
            ],
            [
                'id'        => 9,
                'title'     => 'Rogue',
                'color_hex' => '#FFF569'
            ],
            [
                'id'        => 10,
                'title'     => 'Shaman',
                'color_hex' => '#0070DE'
            ],
            [
                'id'        => 11,
                'title'     => 'Warlock',
                'color_hex' => '#9482C9'
            ],
            [
                'id'        => 12,
                'title'     => 'Warrior',
                'color_hex' => '#C79C6E'
            ]
        ];

        \DB::table('classes')->insert($data);
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
