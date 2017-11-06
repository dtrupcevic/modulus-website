<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SeedRecruitmentPriorityTable extends Migration
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
                'id' => 1,
                'title' => 'Low'
            ],
            [
                'id' => 2,
                'title' => 'Medium'
            ],
            [
                'id' => 3,
                'title' => 'High'
            ]
        ];

        \DB::table('recruitment_priority')->insert($data);
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
