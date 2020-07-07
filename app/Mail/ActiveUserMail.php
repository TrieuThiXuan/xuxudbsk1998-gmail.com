<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ActiveUserMail extends Mailable
{
    use Queueable, SerializesModels;
    protected $user;
    protected $url;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $url)
    {
        $this->user = $user;
        $this->url = $url;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
//        $user = $this->user;
//        $url = $this->url;
        $data = [
            'url' => config('app.url')
                .'/active-user?email='.$this->user->email
                .'&active_code='.$this->user->active_code,
            'user' => $this->user,
        ];
        return $this->subject('Chào mừng bạn đến với Hệ thống')
            ->view('web.emails.active_user', $data);
    }
}
