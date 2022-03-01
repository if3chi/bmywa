<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewUserOnboarded extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        $roles = '';
        foreach ($user->roles as $role) {
            $roles = strval($role->name);
        }

        // TODO: format roles such as 'admin, judge and curator'.
        $this->user = ['name' =>  $user->name, 'roles' => $roles];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('no-reply@bmywa.com', 'BMYWA Admins')
            ->markdown('mail.new-user-onboarded')
            ->with([
                'user' => $this->user
            ]);
    }
}
