<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\PlayerClass;

class SeedRecruitments extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'seed:recruitments';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Truncate and seed all the recruitments (class/spec combo - default to low)';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        \DB::table('recruitment')->truncate();

        $data = [];

        $classes = PlayerClass::with('specializations')->get();

        foreach($classes as $class)
        {
            foreach($class->specializations as $spec)
            {
                $data[] = [
                    'class_id'          => $class->id,
                    'specialization_id' => $spec->id,
                    'priority_id'       => 1
                ];
            }
        }

        \DB::table('recruitment')->insert($data);
    }
}
