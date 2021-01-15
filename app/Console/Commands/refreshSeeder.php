<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Database\Seeders\user;

class refreshSeeder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fresh';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Refresh database dan seeder';

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
     * @return int
     */
    public function handle()
    {
        $this->info('On progress...'); // info
        $this->info('Fresh & Migrate database');
        $this->call('migrate:fresh'); // call mihgate:fresh
        $this->info('Migrating done'); //info
        $this->info('Seeding tables'); //info
        $this->call(user::class); // call db seeder --class=user
        $this->info('Seeding User done'); //info
    }
}
