<?php

namespace App\Notifications;

use App\Article;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class CommentArticle extends Notification
{
    use Queueable;

    protected $article;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($article)
    {
        $this->article=Article::findOrFail($article);


    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database','broadcast'];
    }



    public function toDatabase($notifiable)
    {
        return [
            'article'=>$this->article,
            'user'=>auth()->user(),
            'repliedTime'=>Carbon::now()
        ];
    }


    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
