<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Order;

class OrderAdminMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $order;
    protected $attachmentsPath;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct( $order, $files)
    {
        $this->order = $order;
        $this->attachmentsPath = $files;
    }


    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $email = $this->markdown('email.order-admin')->subject( config('app.name').' Order')->with(["order" => $this->order]);

        foreach ($this->attachmentsPath as $filePath) {
            $email->attachFromStorage('/public/'. $filePath);
        }

        return $email;

        // return $this->markdown('email.order')
        //     ->subject('Order Confirmation')
        //     ->attachFromStorage('/public/uploads/61b73e62a4ecc_1639399010_10.1525_9780520312104-fm.pdf', 'name.pdf', [
        //         'mime' => 'application/pdf'
        //     ])
        //     ->with(["data" => $this->data]);
    }
}
