<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Specialization;

class SeedSpecializationIcons extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'seed:specialization-icons';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Seeds the specialization icons for all specs';

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
        $specs = Specialization::with('class')->get();

        foreach($specs as $spec)
        {
            $avatar_path  = '/assets/classes/' . strtolower(str_replace(" ", "", $spec->class->title)) . "/" . strtolower($spec->title) . ".png";

            $spec->avatar_path = $avatar_path;

            $spec->save();
        }
    }
}
