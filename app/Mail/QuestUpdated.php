<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class QuestUpdated extends Mailable
{
    use Queueable, SerializesModels;


    protected $quest;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($quest)
    {
        $this->quest = $quest;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.quest_update', ['quest' => $this->quest]);
    }
}
