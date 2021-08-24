<?php

namespace App\Http\Livewire\Traits;

use App\Rules\MaxWords;
use App\Rules\AgeLimits;
use App\Rules\MinWords;
use Illuminate\Validation\Rule;

trait EntryHelper
{

    private $entryType = ['creative-writing', 'short-story'];

    protected $messages = [
        'editing.firstname.required' => "We'd like to know you, What's first name?",
        'editing.lastname.required' => "We'd like to know your last name!",
        'editing.email.required' => 'We need to know your email address!',
        'editing.phone.required' => 'We need to know your Parent/Guardians phone number.',
        'editing.entry_fee.required' => 'We need the refrence number from your payment slip.',
        'editing.entry_type.required' => 'Kindly choose your entry type.',
        'editing.age.required' => 'We need to know your age.',
        'editing.award_entry.required' => 'Hi, you need to actually enter your essay in other to compete.',
    ];

    protected $validationAttributes = [
        'editing.firstname' => 'first name',
        'editing.lastname' => 'last name',
        'editing.email' => 'email address',
        'editing.entry_fee' => 'refrence number',
        'editing.entry_type' => 'entry type',
    ];

    protected function rules()
    {
        return [
            'editing.firstname' => 'required|min:2|max:52|string',
            'editing.lastname' => 'required|min:2|max:52|string',
            'editing.email' => 'required|email',
            'editing.phone' => 'required|phone:AUTO,GH,NG',
            'editing.entry_fee' => 'required|string|min:5',
            'editing.entry_type' => [
                'required',
                Rule::in($this->entryType)
            ],
            'editing.age' => [
                'required',
                new AgeLimits(
                    $this->editing->entry_type === $this->entryType[0]
                        ? [9, 15]
                        : [6, 9],
                    $this->editing->entry_type
                )
            ],
            'editing.award_entry' => [
                'required',
                'string',
                new MinWords(64),
                new MaxWords(
                    $this->editing->entry_type === $this->entryType[0]
                        ? 500
                        : 300
                )
            ]
        ];
    }
}
