<?php

namespace App\Jobs;

use App\Mail\ArzSendMail;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class ArzProcessJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $user;
    public $string;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(User $user, $string)
    {
        $this->user = $user;
        $this->string = $string;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
       
        Mail::to($this->user)->send(new ArzSendMail($this->string));
    }
}
