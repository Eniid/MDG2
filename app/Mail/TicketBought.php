<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TicketBought extends Mailable
{
    use Queueable, SerializesModels;


    public $card_name; 
    public $number; 
    public $lastEdition; 


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($card_name, $number, $lastEdition)
    {
        $this->card_name= $card_name;
        $this->number= $number;
        $this->lastEdition= $lastEdition;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.ticketBought');
    }
}
