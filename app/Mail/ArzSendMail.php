<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Cache;
use App\Traits\ArzProcessTraits;

class ArzSendMail extends Mailable
{
    use Queueable, SerializesModels;
    use ArzProcessTraits;
    public $arz = '';
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($string)
    {
        $this->arz=$string;
    //    $this->arz= $this->getArz();
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.test');
        // return $this->arz;
    }
}
