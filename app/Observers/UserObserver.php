<?php

namespace App\Observers;

use App\Mail\UserCreateMail;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class UserObserver
{

    protected $request;
    public $password;

    public function __construct()
    {
        $this->request  = app('request');
    }

    public function creating(User $user)
    {
        $password = Str::random(8);
        $this->request->merge(['password' => $password]);
        $user->password = Hash::make($password);
    }
    /**
     * Handle the user "created" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function created(User $user)
    {
        // Send mail to user
        Mail::to($this->request->email)->send(new UserCreateMail($user, $this->request->password));
    }

    /**
     * Handle the user "updated" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function updated(User $user)
    {
        //
    }

    /**
     * Handle the user "deleted" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function deleted(User $user)
    {
        //
    }

    /**
     * Handle the user "restored" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function restored(User $user)
    {
        //
    }

    /**
     * Handle the user "force deleted" event.
     *
     * @param  \App\User  $user
     * @return void
     */
    public function forceDeleted(User $user)
    {
        //
    }
}
