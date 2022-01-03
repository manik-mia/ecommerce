<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $mailInfo;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct( $mailInfo )
    {
        $this->mailInfo = $mailInfo;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $mailInfo = $this->mailInfo;
        return $this->from( 'mail@eassyshop.com' )->view( 'mail.order', compact( 'mailInfo' ) )->subject( 'Mail From Eassy Shop Authority' );
    }
}
