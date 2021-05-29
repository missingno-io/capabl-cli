<?php

namespace App\Commands;

use Illuminate\Console\Scheduling\Schedule;
use LaravelZero\Framework\Commands\Command;

class Install extends Command
{
    /**
     * The signature of the command.
     *
     * @var string
     */
    protected $signature = 'install';

    /**
     * The description of the command.
     *
     * @var string
     */
    protected $description = 'Installs dependencies for capabl projects';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
	    $this->info('Capabl will attempt to install the WP CLI...');
//	    $this->execute('curl -O https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar', 'Installing');
    }

    /**
     * Define the command's schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule $schedule
     * @return void
     */
    public function schedule(Schedule $schedule): void
    {
        // $schedule->command(static::class)->everyMinute();
    }
}
