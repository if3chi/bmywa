<?php

namespace App\Http\Livewire\Front;

use Livewire\Component;
use App\Mail\ContactSupport;
use Illuminate\Support\Facades\Mail;

class ContactUs extends Component
{
    public $name;
    public $email;
    public $message;

    protected $listeners = ['resetForm'];

    protected $rules = [
        'name' => 'required|string|min:3',
        'email' => 'required|email',
        'message' => 'required|min:32|string'
    ];

    public function resetForm()
    {
        $this->reset(['name', 'email', 'message']);
    }

    public function submitMessage()
    {
        $this->sendMessage($this->validate());

        $this->emitSelf('resetForm');
        $this->flashalert([
            'title' => 'Message Submitted Successfully',
            'body' => 'We will get back to you at the earliest.'
        ]);
    }

    public function sendMessage($data)
    {
        Mail::to('care@bmywa.com', 'Care Person')
            ->send(new ContactSupport($data));
    }

    public function render()
    {
        return view('livewire.front.contact-us');
    }
}
