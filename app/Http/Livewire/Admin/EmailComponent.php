<?php

namespace App\Http\Livewire\Admin;

use App\Mail\SendMail;
use Livewire\Component;
use App\Utilities\Constant;
use Illuminate\Support\Facades\Mail;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class EmailComponent extends Component
{
    use AuthorizesRequests;

    public array $recipient = [];

    public $rules = [
        'recipient.firstname' => 'required|string|max:30',
        'recipient.lastname' => 'nullable|string|max:30',
        'recipient.email' => 'required|email',
    ];

    public function sendMsg()
    {
        $this->authorize(Constant::MANAGE_SITE);

        $validData = $this->validate()['recipient'];
        Mail::to($validData['email'])
            ->queue(new SendMail("{$validData['firstname']} {$validData['lastname']}"));

        $this->reset('recipient');
        $this->notify(['title' => 'Message is been processed!']);
    }
    public function render()
    {
        $this->authorize(Constant::MANAGE_SITE);

        return view('livewire.admin.email-component')->layout('layouts.admin');
    }
}
