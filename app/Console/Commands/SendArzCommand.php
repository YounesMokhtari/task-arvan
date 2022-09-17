<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Traits\ArzProcessTraits;

class SendArzCommand extends Command
{
    use ArzProcessTraits;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:arz';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'arz send ';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
       $this->processArz();
    }
}
