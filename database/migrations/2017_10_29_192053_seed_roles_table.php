<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SeedRolesTable extends Migration
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
                'title'     => 'Tank',
                'css_class' => 'fa-shield',
                'color_hex' => '#13838A'
            ],
            [
                'id'        => 2,
                'title'     => 'Healer',
                'css_class' => 'fa-plus',
                'color_hex' => '#089A1C'
            ],
            [
                'id'        => 3,
                'title'     => 'Damage',
                'css_class' => 'fa-sword',
                'color_hex' => '#9A0808'
            ]
        ];

        \DB::table('roles')->insert($data);
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
