<?php

namespace App\Listeners;

use App\Events\CommentCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class CommentsEventListeners
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
     * @param  CommentCreated  $event
     * @return void
     */
    public function handle(CommentCreated $event)
    {
        $comment=$event->comment;
        $comment->load('commentable');
        $to=$this->recipients($comment);
        $view='emails.'.app()->getLocale().'.comments.create';

        \Mail::send($view, compact('comment'), function($message)use($to){
            $message->to($to);
            $message->subject(trans('email.CommentsEventListeners.CommentCreated'));
        });
    }

    protected function recipients(\App\Comment $comment){
        static $to=[];

        if($comment->parent){
            $to[]=$comment->parent->user->email;
            $this->recipients($comment->parent);
        }

        if($comment->commentable->notification){
            $to[]=$comment->commentable->user->email;
        }

        return array_unique($to);
    }
}
