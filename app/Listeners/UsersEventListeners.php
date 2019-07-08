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
        $view='emails.'.app()->getLocale().'.users.confirm';

        \Mail::send($view, compact('user'), function($message)use($user){
            $message->to($user->email);
            $message->subject(trans('email.UsersEventListeners.UserCreated'));
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
        $view='emails.'.app()->getLocale().'.passwords.remind';

        \Mail::send($view, compact('token'), function($message)use($email){
            $message->to($email);
            $message->subject(trans('email.UsersEventListeners.PasswordResetCreated'));
        });
    }
}
