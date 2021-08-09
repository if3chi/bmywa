<?php

namespace App\Http\Livewire\Front;

use Illuminate\Support\Facades\Mail;
use Livewire\Component;

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

    public function sendMessage()
    {
        $data = $this->validate();

        Mail::raw($data['message'], function ($message) {
            $message->from($this->email, $this->name)
                ->to('care@bmywa.test', 'Care Person')
                ->subject('Contact message from ' . $this->name);
        });

        $this->emitSelf('resetForm');
        $this->flashalert([
            'title' => 'Message Submitted Successfully',
            'body' => 'We will get back to you at the earliest.'
        ]);
    }

    public function render()
    {
        return view('livewire.front.contact-us');
    }
}
