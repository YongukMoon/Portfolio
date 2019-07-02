<?php

namespace App\Listeners;

use App\Events\UserCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class UsersEventListeners
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  UserCreated  $event
     * @return void
     */
    public function handle(UserCreated $event)
    {
        $user=$event->user;

        \Mail::send('emails.users.confirm', compact('user'), function($message)use($user){
            $message->to($user->email);
            $message->subject('user confirm email');
        });
    }

    public function subscribe(\Illuminate\Events\Dispatcher $events){
        $events->listen(
            \App\Events\PasswordResetCreated::class,
            __CLASS__.'@onPasswordResetCreated'
        );
    }

    public function onPasswordResetCreated(\App\Events\PasswordResetCreated $event){
        $token=$event->token;
        $email=$event->email;

        \Mail::send('emails.passwords.remind', compact('token'), function($message)use($email){
            $message->to($email);
            $message->subject('password reset');
        });
    }
}
