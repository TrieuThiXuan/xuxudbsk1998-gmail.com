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
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $data = [
            'url' => config('app.url')
                .'/active-user?email='.$this->user->email
                .'&active_code='.$this->user->active_code,
            'user' => $this->user,
        ];
        return $this->from(config('app.mail_admin'), trans('common.admin_httv'))
            ->subject('Chào mừng bạn đến với HTTV')
            ->view('web.emails.active_user', $data);
    }
}
