<?php

namespace App\Console\Commands;

use App\Helpers\ButtonCVA;
use Illuminate\Console\Command;

class MyCustomCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mycustom:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        print_r(ButtonCVA::new('success'));
    }
}
