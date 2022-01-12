<?php

namespace App\Observers;

use App\Fare;
use App\File;
use App\Invoice;
use App\Mail\OrderMail;
use App\Order;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Str;
use Stripe\StripeClient;

class OrderObserver
{
    protected $request;
    protected $user;
    public $afterCommit = true;

    public function __construct(Order $order)
    {
        $this->request  = app('request');
    }

    public function creating(Order $order)
    {

        $this->user = User::where(['email'=> $this->request->email])->first();

        // Check user is already exist or not.
        if( $this->user ){
            $order->user_id = $this->user->id;
        } else {
            $this->user = User::create([
                'name'  => $this->request->name,
                'email' => $this->request->email,
                'phone' => $this->request->phone,
            ]);

            // customer role
            $this->user->roles()->sync(2);
            // Order
            $order->user_id = $this->user->id;
        }

        // dd(($this->user->id));

        // Fetching Fare amount
        $fare = Fare::where([
            'career_level_id'   => $this->request->career_level,
            'order_service_id'  => $this->request->order_service,
            'deadline_id'       => $this->request->deadline_id
        ])->firstOrFail();

        // Generating Invoice before order placing
        $invoice = Invoice::create([
            "ref_no"    => Str::uuid()->toString(),
            "amount"    => $fare->fare_amt,
            "user_id"   => $this->user->id,
        ]);

        $order->invoice_id = $invoice->id;

    }

    /**
     * Handle the order "created" event.
     *
     * @param  \App\Order  $order
     * @return void
     */
    public function created(Order $order)
    {
        $files = [];
        if ($this->request->hasfile('emailAttachments')) {
            foreach($this->request->file('emailAttachments') as $file)
            {
                $fileName = uniqid().'_'.time().'_'.$file->getClientOriginalName();
                $filePath = $file->storeAs( 'uploads' , $fileName, 'public');

                array_push( $files, $filePath);

                File::create([
                    "order_id" => $order->id,
                    "file_path" => $filePath
                ]);
            }
        }

        // Send mail to user
        Mail::to($this->request->email)->send(new OrderMail($order, $files));
        // Send mail to admin
        // Mail::to(env('MAIL_FROM_ADDRESS','info@cheapcvwriting.co.uk') )->send(new OrderAdminMail($order, $files));
    }

    /**
     * Handle the order "updated" event.
     *
     * @param  \App\Order  $order
     * @return void
     */
    public function updated(Order $order)
    {
        //
    }

    /**
     * Handle the order "deleted" event.
     *
     * @param  \App\Order  $order
     * @return void
     */
    public function deleted(Order $order)
    {
        //
    }

    /**
     * Handle the order "restored" event.
     *
     * @param  \App\Order  $order
     * @return void
     */
    public function restored(Order $order)
    {
        //
    }

    /**
     * Handle the order "force deleted" event.
     *
     * @param  \App\Order  $order
     * @return void
     */
    public function forceDeleted(Order $order)
    {
        //
    }
}
