<?php

namespace App\Http\Livewire\Front;

use Livewire\Component;
use App\Mail\ContactSupport;
use Illuminate\Support\Facades\Mail;

class ContactUs extends Component
{
    public $first_name;
    public $last_name;
    public $email;
    public $phone;
    public $subject;
    public $message;

    protected $listeners = ['resetForm'];

    protected $rules = [
        'first_name' => 'required|string|min:3|max:32',
        'last_name' => 'required|string|min:3|max:32',
        'email' => 'required|email',
        'phone' => 'nullable|phone:AUTO,GH,NG',
        'subject' => 'required|string|min:3|max:140',
        'message' => 'required|min:32|max:1000|string'
    ];

    public function resetForm()
    {
        $this->reset(['first_name', 'last_name', 'phone', 'email', 'subject', 'message']);
    }

    public function submitMessage()
    {
        $validatedData = $this->validate();
        $validatedData['message'] = textNl2br($validatedData['message']);

        $this->sendMessage($validatedData);

        $this->emitSelf('resetForm');
        $this->flashalert([
            'title' => 'Message Submitted Successfully',
            'body' => 'We will get back to you at the earliest.'
        ]);
    }

    public function sendMessage($data)
    {
        Mail::to('info@bmywa.com', 'Care Person')
            ->send(new ContactSupport($data));
    }

    public function render()
    {
        return view('livewire.front.contact-us');
    }
}
