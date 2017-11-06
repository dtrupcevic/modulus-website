<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use App\User;

class CreateUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:create {name} {email} {password}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates a user in the database';

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
        $user = User::create([
            'name'      => $this->argument('name'),
            'email'     => $this->argument('email'),
            'password'  => Hash::make($this->argument('password'))
        ]);

        try
        {
            $user->save();
        }
        catch(\Exception $e)
        {
            $this->error($e->getMessage());
        }

        $this->info('User ' . $this->argument('name') . ' created!');
    }
}
