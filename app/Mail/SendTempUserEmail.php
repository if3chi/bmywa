<?php

namespace App\Mail;

use App\Models\Role;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\URL;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendTempUserEmail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public array $msgData;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        $this->msgData['url'] = $this->getUrl($user->id);
        $this->msgData['email'] = $this->isJudge($user->role_id)
            ? 'thelmaofosuasamoah@bmywa.com' : 'jaspar@bmywa.com';
        $this->msgData['sign'] = $this->isJudge($user->role_id)
            ? ['Thelma Ofosu-Asamoah', 'Managing director']
            : ['IT Support', ''];
    }

    public function isJudge(int $role): bool
    {
        return $role == Role::JUDGE;
    }

    public function getUrl($id)
    {
        return URL::signedRoute(
            'create.account',
            ['tempUser' => $id]
        );
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->msgData['email'], $this->msgData['sign'][0])
            ->subject('Complete Your Account')
            ->markdown('mail.send-temp-user-email')
            ->with([
                'msgData' => $this->msgData
            ]);
    }
}
