<?php

namespace App\Http\Livewire\Traits;

use App\Rules\MaxWords;
use App\Rules\AgeLimits;
use App\Rules\MinWords;
use Illuminate\Validation\Rule;

trait EntryHelper
{

    protected $messages = [
        'editing.firstname.required' => "We'd like to know you, What's your first name?",
        'editing.lastname.required' => "We'd like to know your last name!",
        'editing.email.required' => 'We need to know your email address!',
        'editing.phone.required' => 'We need to know your Parent/Guardians phone number.',
        'editing.entry_fee.required' => 'We need the refrence number from your payment slip.',
        'editing.entry_type.required' => 'Kindly choose your entry type.',
        'editing.age.required' => 'We need to know your age.',
        'editing.award_entry.required' => 'Hi, you need to actually enter your write-up in other to compete.',
        'editing.title.required' => "How about a Title?",
    ];

    protected $validationAttributes = [
        'editing.firstname' => 'first name',
        'editing.lastname' => 'last name',
        'editing.email' => 'email address',
        'editing.entry_fee' => 'refrence number',
        'editing.entry_type' => 'entry type',
        'editing.entry_type' => 'entry title',
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
                Rule::in(array_keys(entryCategories()))
            ],
            'editing.age' => [
                'required',
                new AgeLimits(
                    $this->getAgeRange($this->editing->entry_type),
                    $this->editing->entry_type
                )
            ],
            'editing.title' => 'required|min:3|max:255|string',
            'editing.award_entry' => [
                'required',
                'string',
                new MinWords(64),
                new MaxWords($this->getMaxWord($this->editing->entry_type))
            ]
        ];
    }

    public function getAgeRange($entryType)
    {
        return $entryType ? array_slice(entryCategories()[$entryType], 1, 3) : [];
    }

    public function getMaxWord($entryType)
    {
        return $entryType ? entryCategories()[$entryType][3] : 300;
    }
}
