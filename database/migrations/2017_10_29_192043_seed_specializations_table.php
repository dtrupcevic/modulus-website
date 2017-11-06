<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SeedSpecializationsTable extends Migration
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
                'title'     => 'Blood',
                'class_id'  => 1,
                'role_id'   => 1
            ],
            [
                'id'        => 2,
                'title'     => 'Frost',
                'class_id'  => 1,
                'role_id'   => 3,
            ],
            [
                'id'        => 3,
                'title'     => 'Unholy',
                'class_id'  => 1,
                'role_id'   => 3,
            ],
            [
                'id'        => 4,
                'title'     => 'Havoc',
                'class_id'  => 2,
                'role_id'   => 3,
            ],
            [
                'id'        => 5,
                'title'     => 'Vengeance',
                'class_id'  => 2,
                'role_id'   => 1,
            ],
            [
                'id'        => 6,
                'title'     => 'Balance',
                'class_id'  => 3,
                'role_id'   => 3,
            ],
            [
                'id'        => 7,
                'title'     => 'Feral',
                'class_id'  => 3,
                'role_id'   => 3,
            ],
            [
                'id'        => 8,
                'title'     => 'Guardian',
                'class_id'  => 3,
                'role_id'   => 1,
            ],
            [
                'id'        => 9,
                'title'     => 'Restoration',
                'class_id'  => 3,
                'role_id'   => 2,
            ],
            [
                'id'        => 10,
                'title'     => 'Beast Mastery',
                'class_id'  => 4,
                'role_id'   => 3,
            ],
            [
                'id'        => 11,
                'title'     => 'Marksmanship',
                'class_id'  => 4,
                'role_id'   => 3,
            ],
            [
                'id'        => 12,
                'title'     => 'Survival',
                'class_id'  => 4,
                'role_id'   => 3,
            ],
            [
                'id'        => 13,
                'title'     => 'Arcane',
                'class_id'  => 5,
                'role_id'   => 3,
            ],
            [
                'id'        => 14,
                'title'     => 'Fire',
                'class_id'  => 5,
                'role_id'   => 3,
            ],
            [
                'id'        => 15,
                'title'     => 'Frost',
                'class_id'  => 5,
                'role_id'   => 3,
            ],
            [
                'id'        => 16,
                'title'     => 'Brewmaster',
                'class_id'  => 6,
                'role_id'   => 1,
            ],
            [
                'id'        => 17,
                'title'     => 'Mistweaver',
                'class_id'  => 6,
                'role_id'   => 2,
            ],
            [
                'id'        => 18,
                'title'     => 'Windwalker',
                'class_id'  => 6,
                'role_id'   => 3,
            ],
            [
                'id'        => 19,
                'title'     => 'Holy',
                'class_id'  => 7,
                'role_id'   => 2,
            ],
            [
                'id'        => 20,
                'title'     => 'Protection',
                'class_id'  => 7,
                'role_id'   => 1,
            ],
            [
                'id'        => 21,
                'title'     => 'Retribution',
                'class_id'  => 7,
                'role_id'   => 3,
            ],
            [
                'id'        => 22,
                'title'     => 'Discipline',
                'class_id'  => 8,
                'role_id'   => 2,
            ],
            [
                'id'        => 23,
                'title'     => 'Holy',
                'class_id'  => 8,
                'role_id'   => 2,
            ],
            [
                'id'        => 24,
                'title'     => 'Shadow',
                'class_id'  => 8,
                'role_id'   => 3,
            ],
            [
                'id'        => 25,
                'title'     => 'Assassination',
                'class_id'  => 9,
                'role_id'   => 3,
            ],
            [
                'id'        => 26,
                'title'     => 'Outlaw',
                'class_id'  => 9,
                'role_id'   => 3,
            ],
            [
                'id'        => 27,
                'title'     => 'Subtlety',
                'class_id'  => 9,
                'role_id'   => 3,
            ],
            [
                'id'        => 28,
                'title'     => 'Elemental',
                'class_id'  => 10,
                'role_id'   => 3,
            ],
            [
                'id'        => 29,
                'title'     => 'Enhancement',
                'class_id'  => 10,
                'role_id'   => 3,
            ],
            [
                'id'        => 30,
                'title'     => 'Restoration',
                'class_id'  => 10,
                'role_id'   => 2,
            ],
            [
                'id'        => 31,
                'title'     => 'Affliction',
                'class_id'  => 11,
                'role_id'   => 3,
            ],
            [
                'id'        => 32,
                'title'     => 'Demonology',
                'class_id'  => 11,
                'role_id'   => 3,
            ],
            [
                'id'        => 33,
                'title'     => 'Destruction',
                'class_id'  => 11,
                'role_id'   => 3,
            ],
            [
                'id'        => 34,
                'title'     => 'Arms',
                'class_id'  => 12,
                'role_id'   => 3,
            ],
            [
                'id'        => 35,
                'title'     => 'Fury',
                'class_id'  => 12,
                'role_id'   => 3,
            ],
            [
                'id'        => 36,
                'title'     => 'Protection',
                'class_id'  => 12,
                'role_id'   => 1,
            ],
        ];

        \DB::table('specializations')->insert($data);
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
