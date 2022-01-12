<?php

namespace App\Mail;

use App\OrderQuery;
use App\Quotation;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderQueryAdminMail extends Mailable
{
    use Queueable, SerializesModels;

    public $quatation;
    protected $attachment;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Quotation $quatation, $file)
    {
        $this->quatation = $quatation;
        $this->attachment = $file;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $email = $this->markdown('email.query-admin')->subject( config('app.name').' Order Price Quotation Query')->with(['query' => $this->quatation ]);

        if ($this->attachment) {
            foreach ($this->attachment as $filePath) {
                $email->attachFromStorage('/public/uploads'. $filePath);
            }
        }

        return $email;
    }
}
