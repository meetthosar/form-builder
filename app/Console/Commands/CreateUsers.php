<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class CreateUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:users';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'It will create 2 users with Role - Admin and Customer';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // User Admin
        $user = User::create([

        ]);
    }
}
